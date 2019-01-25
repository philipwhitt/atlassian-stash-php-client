<?php

namespace Atlassian\Stash\Api;

class BranchApiMapper extends ApiMapper {

	public function getFromEncoded(array $params) {
		return (new Branch())
			->setId($params['id'])
			->setDisplayId($params['displayId'])
			->setLatestChangeset($params['latestChangeset'])
			->setIsDefault($params['isDefault']);
	}

}