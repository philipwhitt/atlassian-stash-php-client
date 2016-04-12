<?php

namespace Atlassian\Stash;

use Atlassian\Stash\Api as api;

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

	public function getProjects() {
		$encRepos = $this->httpClient->get('/rest/api/1.0/projects?limit=1000')->json();

		return (new api\ProjectApiMapper)->getAllFromEncoded(isset($encRepos['values']) ? $encRepos['values'] : []);
	}

	public function getRepos($projectKey) {
		$encRepos = $this->httpClient->get(sprintf('/rest/api/1.0/projects/%s/repos?limit=1000', $projectKey))->json();

		return (new api\RepoApiMapper)->getAllFromEncoded(isset($encRepos['values']) ? $encRepos['values'] : []);
	}

	public function getRepoFileContents(api\Repo $repo, $file) {
		$url = sprintf('/rest/api/1.0/projects/%s/repos/%s/browse/%s', $repo->getProjectKey(), $repo->getName(), ltrim($file, '/'));

		$contents = '';

		try {
			$resp = $this->httpClient->get($url)->json();
			foreach ($resp['lines'] as $line) {
				$contents .= $line['text'];
			}
		} catch (ClientException $e) {}

		return $contents;
	}

}