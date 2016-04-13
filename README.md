[![Build Status](https://drone.io/github.com/philipwhitt/atlassian-stash-php-client/status.png)](https://drone.io/github.com/philipwhitt/atlassian-stash-php-client/latest)

Atlassian Stash PHP Client
============================
PHP Client for Atlassian Stash (Bitbucket v1)

###Install With Composer
```
{
	"require" : {
		"atlassian/stash-client" : "1.*"
	}
}
```

###Example: Get Projects
```php
<?php
use Atlassian\Stash\StashClient;

// Init client, user/pass is optional
$stash = new StashClient('http://git.example.com', 'user', 'password');

// returns array of Atlassian\Stash\Api\Project
$projects = $stash->getProjects();
```

###Example: Get Repos for a Project
```php
<?php
use Atlassian\Stash\StashClient;

// Init client, user/pass is optional
$stash = new StashClient('http://git.example.com', 'user', 'password');

// returns array of Atlassian\Stash\Api\Repo
$repos = $stash->getRepos('test'); // Project Key Parameter 
```

###Example: Get File Contents
```php
<?php
use Atlassian\Stash\StashClient;

// Init client, user/pass is optional
$stash = new StashClient('http://git.example.com', 'user', 'password');

$repos = $stash->getRepos('test');
$fileContents = $stash->getRepoFileContents($repos[0], '/someFile.txt');
```

###Todo
Currently the client only does GETs (see above); Lots of missing methods, feel free to put in a pull request.