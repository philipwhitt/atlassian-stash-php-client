<?php

namespace Atlassian\Stash\Api;

class Branch {

	private $id;
	private $displayId;
	private $latestChangeset;
	private $isDefault;

	public function getId() {
		return $this->id;
	}
	public function getDisplayId() {
		return $this->displayId;
	}
	public function getLatestChangeset() {
		return $this->latestChangeset;
	}
	public function getIsDefault() {
		return $this->isDefault;
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
	public function setIsDefault($isDefault) {
		$this->isDefault = $isDefault;
		return $this;
	}

}