<?php

namespace Atlassian\Stash\Api;

class Tag {

	private $id;
	private $displayId;
	private $latestChangeset;
	private $hash;
	
	public function getId() {
		return $this->id;
	}
	public function getDisplayId() {
		return $this->displayId;
	}
	public function getLatestChangeset() {
		return $this->latestChangeset;
	}
	public function getHash() {
		return $this->hash;
	}
	
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function setDisplayId($displayId) {
		$this->displayId = $displayId;
		return $this;
	}
	public function setLatestChangeset($latestChangeset) {
		$this->latestChangeset = $latestChangeset;
		return $this;
	}
	public function setHash($hash) {
		$this->hash = $hash;
		return $this;
	}

}