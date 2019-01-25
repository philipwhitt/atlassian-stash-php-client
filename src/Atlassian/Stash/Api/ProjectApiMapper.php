<?php

namespace Atlassian\Stash\Api;

class ProjectApiMapper extends ApiMapper {

	public function getFromEncoded(array $params) {
		return (new Project())
			->setKey($params['key'])
			->setName(isset($params['name']) ? $params['name'] : '') //optional
			->setDescription(isset($params['description']) ? $params['description'] : ''); //optional
	}

}

// Stash API response for projects
// 
// {  
//     "key":"TEST",
//     "id":2,
//     "name":"Test",
//     "description":"Test Project",
//     "public":false,
//     "type":"NORMAL",
//     "link":{  
//         "url":"\/projects\/TEST",
//         "rel":"self"
//     },
//     "links":{  
//         "self":[  
//             {  
//                 "href":"http:\/\/git.example.com\/projects\/TEST"
//             }
//         ]
//     }
// }