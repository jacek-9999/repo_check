<?php


namespace RepoCheck;

/**
 * Class RepoParams
 *
 * @package CheckRepoLastSha
 */
class RepoParams
{
    /**
     * @var string
     */
    private $repoService;
    /**
     * @var string
     */
    private $accountName;
    /**
     * @var string
     */
    private $repoName;
    /**
     * @var string
     */
    private $branchName;

    /**
     * RepoParams constructor.
     * @param $repoService
     * @param $accountName
     * @param $repoName
     * @param $branchName
     */
    public function __construct(
        string $repoService,
        string $accountName,
        string $repoName,
        string $branchName
    )
    {
        $this->repoService  = $repoService;
        $this->accountName  = $accountName;
        $this->repoName     = $repoName;
        $this->branchName   = $branchName;
    }

    /**
     * @return string
     */
    public function getRepoService(): string 
    {
        return $this->repoService;
    }

    /**
     * @return string
     */
    public function getAccountName(): string 
    {
        return $this->accountName;
    }

    /**
     * @return string
     */
    public function getRepoName(): string 
    {
        return $this->repoName;
    }

    /**
     * @return string
     */
    public function getBranchName(): string 
    {
        return $this->branchName;
    }
}