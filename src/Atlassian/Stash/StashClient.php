<?php

namespace Atlassian\Stash;

use Atlassian\Stash\Api as api;
use Atlassian\Stash\Api\TagApiMapper;
use Atlassian\Stash\Api\RepoApiMapper;
use Atlassian\Stash\Api\BranchApiMapper;
use Atlassian\Stash\Api\ProjectApiMapper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class StashClient {

	private $httpClient;

	public function __construct($url, $user=null, $pass=null) {
		$params = [];
		$params['base_url'] = $url;

		if ($user && $pass) {
			$params['defaults'] = ['auth' => [$user, $pass]];
		}

		$this->httpClient = new Client($params);
	}

	public function getHttpClient() {
		return $this->httpClient;
	}

	public function getProjects() {
		$url = '/rest/api/1.0/projects?limit=1000';

		$data = $this->httpClient->get($url)->json();

		return $this->decodeAll(new ProjectApiMapper, $data);
	}

	public function getBranches(api\Repo $repo) {
		$url = sprintf(
			'/rest/api/1.0/projects/%s/repos/%s/branches', 
			$repo->getProjectKey(), 
			$repo->getName()
		);

		$data = $this->httpClient->get($url)->json();

		return $this->decodeAll(new BranchApiMapper, $data);
	}

	public function getTags(api\Repo $repo) {
		$url = sprintf(
			'/rest/api/1.0/projects/%s/repos/%s/tags', 
			$repo->getProjectKey(), 
			$repo->getName()
		);

		$data = $this->httpClient->get($url)->json();

		return $this->decodeAll(new TagApiMapper, $data);
	}

	public function getRepos($projectKey) {
		$url = sprintf(
			'/rest/api/1.0/projects/%s/repos?limit=1000', 
			$projectKey
		);

		$data = $this->httpClient->get($url)->json();

		return $this->decodeAll(new RepoApiMapper, $data);
	}

	public function getRepoFileContents(api\Repo $repo, $file, $seperator="") {
		$url = sprintf(
			'/rest/api/1.0/projects/%s/repos/%s/browse/%s', 
			$repo->getProjectKey(), 
			$repo->getName(), 
			ltrim($file, '/')
		);

		$contents = '';

		try {
			$resp = $this->httpClient->get($url)->json();
			foreach ($resp['lines'] as $line) {
				$contents .= $line['text'].$seperator;
			}
		} catch (ClientException $e) {}

		return $contents;
	}

	private function decodeAll($apiMapper, $data) {
		return $apiMapper->getAllFromEncoded(
			isset($data['values']) ? $data['values'] : []
		);
	}

}