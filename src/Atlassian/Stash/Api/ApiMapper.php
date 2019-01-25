<?php

namespace Atlassian\Stash\Api;

abstract class ApiMapper {

	public abstract function getFromEncoded(array $params);

	public function getAllFromEncoded(array $encs) {
		$data = [];
		foreach ($encs as $enc) {
			$data[] = $this->getFromEncoded($enc);
		}
		return $data;
	}

}