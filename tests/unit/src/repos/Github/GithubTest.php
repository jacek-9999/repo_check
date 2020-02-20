<?php

use \Mockery as mock;

class GithubTest extends \PHPUnit\Framework\TestCase
{
    public function testGetSha() 
    {
        $connectorMock = mock::mock(\RepoCheck\Repos\Github\Connector::class);
        $parserMock = mock::mock(\RepoCheck\Repos\Github\Parser::class);
        $githubRepo = new \RepoCheck\Repos\Github\Github($connectorMock, $parserMock);

        $githubRepo->setBranchName('master');
        $githubRepo->setAccountName('blaster');
        $githubRepo->setRepoName('disaster');

        $connectorMock->shouldReceive('fetchData')
            ->with('blaster', 'disaster', 'master')
            ->andReturn(json_encode(['commit' => ['sha' => 9000]]));
        $parserMock->shouldReceive('parse')
            ->with(json_encode(['commit' => ['sha' => 9000]]))
            ->andReturn('cool repo bro');

        $this->assertEquals('cool repo bro', $githubRepo->getSha());
    }

    public function testGetShaEmptyRepoData() 
    {
        $connectorMock = mock::mock(\RepoCheck\Repos\Github\Connector::class);
        $parserMock = mock::mock(\RepoCheck\Repos\Github\Parser::class);
        $githubRepo = new \RepoCheck\Repos\Github\Github($connectorMock, $parserMock);

        try {
            $githubRepo->getSha();
            $this->fail();
        } catch (\Exception $e) {
            $this->assertEquals('invalid repo data', $e->getMessage());
        }
    }
}