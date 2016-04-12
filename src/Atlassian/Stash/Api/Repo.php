<?php

namespace Atlassian\Stash\Api;

class Repo {

	private $name;
	private $cloneUrl;
	private $projectKey;

	public function getName() {
		return $this->name;
	}
	public function getCloneUrl() {
		return $this->cloneUrl;
	}
	public function getProjectKey() {
		return $this->projectKey;
	}

	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function setCloneUrl($cloneUrl) {
		// clean up url
		$parts = parse_url($cloneUrl);

		$this->cloneUrl = $parts['scheme'].'://'.$parts['host'].$parts['path'];

		return $this;
	}
	public function setProjectKey($projectKey) {
		$this->projectKey = $projectKey;
		return $this;
	}

}