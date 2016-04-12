<?php

namespace Atlassian\Stash\Api;

class Project {

	private $key;
	private $name;
	private $description;

	public function getKey() {
		return $this->key;
	}
	public function getName() {
		return $this->name;
	}
	public function getDescription() {
		return $this->description;
	}

	public function setKey($key) {
		$this->key = $key;
		return $this;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

}