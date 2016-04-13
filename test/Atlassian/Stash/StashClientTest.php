<?php

namespace Atlassian\Stash;

use Atlassian\Stash\Api as api;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class StashClientTest extends \PHPUnit_Framework_TestCase {

	public function setup() {
		$this->client = new StashClient('http://git.example.com');
	}

	public function testGetRepos() {
		// given
		$body = Stream::factory(file_get_contents(__DIR__.'/repoStub.json'));

		$mock = new Mock([new Response(200, [], $body)]);
		$this->client->getHttpClient()->getEmitter()->attach($mock);

		// when 
		$repos = $this->client->getRepos('test');

		// then
		$this->assertEquals($repos[0], (new api\Repo)
			->setName("test-project")
			->setCloneUrl("http://git.example.com/scm/TST/test-project.git")
			->setProjectKey("TST")
		);

		$this->assertEquals($repos[1], (new api\Repo)
			->setName("something-else")
			->setCloneUrl("http://git.example.com/scm/TST/something-else.git")
			->setProjectKey("TST")
		);
	}

	public function testGetProjects() {
		// given
		$body = Stream::factory(file_get_contents(__DIR__.'/projectStub.json'));

		$mock = new Mock([new Response(200, [], $body)]);
		$this->client->getHttpClient()->getEmitter()->attach($mock);

		// when 
		$projects = $this->client->getProjects();

		// then
		$this->assertEquals($projects[0], (new api\Project)
			->setKey("TEST")
			->setName("Test Project")
			->setDescription("Lorem Ipsum")
		);

		$this->assertEquals($projects[1], (new api\Project)
			->setKey("TEST2")
			->setName("Test Project 2")
			->setDescription("Lorem Ipsum 2")
		);
	}

	public function testGetComposer() {
		// given
		$body = Stream::factory(file_get_contents(__DIR__.'/fileStub.json'));

		$mock = new Mock([new Response(200, [], $body)]);
		$this->client->getHttpClient()->getEmitter()->attach($mock);

		$repo = (new api\Repo)
			->setProjectKey('test')
			->setName('some-project');

		// when
		$contents = $this->client->getRepoFileContents($repo, '/composer.json');

		// then
		$json = json_decode($contents, true);

		$this->assertEquals('test/project', $json['name']);
		$this->assertEquals('1.*', $json['require']['nacha/file-generator']);
	}

}