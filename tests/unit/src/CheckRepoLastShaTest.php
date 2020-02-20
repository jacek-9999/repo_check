<?php

use \Mockery as mock;

class CheckRepoLastShaTest extends \PHPUnit\Framework\TestCase
{
    public function testRun() 
    {
        $reposFactory = mock::mock(\RepoCheck\ReposFactory::class);
        $repo = mock::mock(\RepoCheck\Repos\RepoInterface::class);
        $checkRepoLastSha = new \RepoCheck\CheckRepoLastSha($reposFactory);

        $reposFactory->shouldReceive('getRepo')
            ->with(\RepoCheck\RepoParams::class)
            ->andReturn($repo);

        $repo->shouldReceive('getSha')
            ->with()
            ->andReturn('very nice SHA1');

        $argParams = [
            'app.php',
            'php-fig/log',
            'master'
        ];

        $this->assertEquals('very nice SHA1', $checkRepoLastSha->run($argParams));
    }
}