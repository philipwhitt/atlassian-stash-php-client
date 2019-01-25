<?php

namespace Atlassian\Stash\Api;

class RepoApiMapper extends ApiMapper {

	public function getFromEncoded(array $params) {
		return (new Repo())
			->setName($params['name'])
			->setCloneUrl($params['cloneUrl'])
			->setProjectKey($params['project']['key']);
	}

}

// Stash API response for repos
// 
// {  
//     "slug":"repo",
//     "id":1026,
//     "name":"repo",
//     "scmId":"git",
//     "state":"AVAILABLE",
//     "statusMessage":"Available",
//     "forkable":true,
//     "project":{  
//         "key":"PROJ",
//         "id":219,
//         "name":"Example Project",
//         "public":true,
//         "type":"NORMAL",
//         "link":{  
//             "url":"\/projects\/PROJ",
//             "rel":"self"
//         },
//         "links":{  
//             "self":[  
//                 {  
//                     "href":"http:\/\/user@git.example.net\/projects\/PROJ"
//                 }
//             ]
//         }
//     },
//     "public":false,
//     "link":{  
//         "url":"\/projects\/PROJ\/repos\/repo\/browse",
//         "rel":"self"
//     },
//     "cloneUrl":"http:\/\/user@git.example.net\/scm\/project\/repo.git",
//     "links":{  
//         "clone":[  
//             {  
//                 "href":"http:\/\/user@git.example.net\/scm\/project\/repo.git",
//                 "name":"http"
//             },
//             {  
//                 "href":"ssh:\/\/user@git.example.net:7999\/project\/repo.git",
//                 "name":"ssh"
//             }
//         ],
//         "self":[  
//             {  
//                 "href":"http:\/\/user@git.example.net\/projects\/project\/repos\/repo\/browse"
//             }
//         ]
//     }
// }