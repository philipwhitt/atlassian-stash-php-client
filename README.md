[![Build Status](https://travis-ci.org/philipwhitt/atlassian-stash-php-client.svg?branch=master)](https://travis-ci.org/philipwhitt/atlassian-stash-php-client)
[![Latest Stable Version](https://poser.pugx.org/philipwhitt/atlassian-stash-php-client/v/stable.svg)](https://packagist.org/packages/philipwhitt/atlassian-stash-php-client)


Atlassian Stash PHP Client
============================
PHP Client for Atlassian Stash (Bitbucket v1)

### Install With Composer
```
{
	"require" : {
		"atlassian/stash-client" : "1.1.*"
	}
}
```

### Examples
```php
<?php
use Atlassian\Stash\StashClient;

// Init client, user/pass is optional
$stash = new StashClient('http://git.example.com', 'user', 'password');

// returns array of Atlassian\Stash\Api\Project
$projects = $stash->getProjects();

// returns array of Atlassian\Stash\Api\Repo
$repos = $stash->getRepos('test'); // By Project Key

// returns contents of file as a string
$fileContents = $stash->getRepoFileContents($repos[0], '/someFile.txt');
```

### Todo
Currently the client only does GETs (see above); Lots of missing methods, feel free to put in a pull request.