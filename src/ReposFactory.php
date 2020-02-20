<?php


namespace RepoCheck;
use RepoCheck\Repos\Github\Github;
use RepoCheck\Repos\RepoInterface;

/**
 * Class ReposFactory
 * @package RepoCheck
 */
class ReposFactory
{
    /**
     * @param RepoParams $repoParams
     * @return RepoInterface
     */
    public function getRepo(RepoParams $repoParams): RepoInterface
    {
        $repo = null;
        $service = $repoParams->getRepoService();
        switch ($service) {
        case 'github':
            $repo = Github::getInstance();
            $repo->setAccountName($repoParams->getAccountName());
            $repo->setRepoName($repoParams->getRepoName());
            $repo->setBranchName($repoParams->getBranchName());
            break;
        default:
            throw new \InvalidArgumentException("Unknown service '$service'");
                break;
        }
        return $repo;
    }
}