<?php

namespace Atlassian\Stash\Api;

class TagApiMapper extends ApiMapper {

	public function getFromEncoded(array $params) {
		return (new Tag)
			->setId($params['id'])
			->setDisplayId($params['displayId'])
			->setLatestChangeset($params['latestChangeset'])
			->setHash($params['hash']);
	}

}