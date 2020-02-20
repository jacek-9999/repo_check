<?php

use Mockery as mock;

class ReposFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetRepoGithub() 
    {
        $reposFactory = new \RepoCheck\ReposFactory();
        $repoParams = mock::mock(\RepoCheck\RepoParams::class);

        $repoParams->shouldReceive('getRepoService')
            ->with()
            ->andReturn('github');
        $repoParams->shouldReceive('getAccountName')
            ->with()
            ->andReturn('testval1');
        $repoParams->shouldReceive('getRepoName')
            ->with()
            ->andReturn('testval2');
        $repoParams->shouldReceive('getBranchName')
            ->with()
            ->andReturn('testval3');

        $this->assertInstanceOf(
            \RepoCheck\Repos\Github\Github::class,
            $reposFactory->getRepo($repoParams)
        );
    }

    public function testGetRepoBitbucket() 
    {
        $reposFactory = new \RepoCheck\ReposFactory();
        $repoParams = mock::mock(\RepoCheck\RepoParams::class);

        $repoParams->shouldReceive('getRepoService')
            ->with()
            ->andReturn('bitbucket');
        try {
            $reposFactory->getRepo($repoParams);
            $this->fail();
        } catch (\Exception $e) {
            $this->assertEquals("Unknown service 'bitbucket'", $e->getMessage());
        }
    }
}