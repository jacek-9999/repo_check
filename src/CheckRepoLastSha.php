<?php
namespace RepoCheck;

/**
 * Class CheckRepoLastSha
 * @package RepoCheck
 */
class CheckRepoLastSha implements JobInterface
{
    /**
     * @var string
     */
    private $repoService = 'github';
    /**
     * @var
     */
    private $accountName;
    /**
     * @var
     */
    private $repoName;
    /**
     * @var
     */
    private $branchName;
    /**
     * @var ReposFactory
     */
    private $reposFactory;

    /**
     * CheckRepoLastSha constructor.
     * @param ReposFactory $reposFactory
     */
    public function __construct(ReposFactory $reposFactory)
    {
        $this->reposFactory = $reposFactory;
    }

    /**
     * @param array $params
     * @return string
     */
    public function run(array $params): string 
    {
        $repo = $this->reposFactory->getRepo($this->parseArgs($params));
        return $repo->getSha();
    }

    /**
     * @return CheckRepoLastSha
     */
    public static function getInstance(): CheckRepoLastSha
    {
        return new self(new ReposFactory());
    }

    /**
     * @param array $params
     * @return RepoParams
     */
    private function parseArgs(array $params): RepoParams
    {
        switch (count($params)) {
        case 4:
            $this->branchName = $params[3];
            $customService = explode('=', $params[1]);
            if ($customService[0] !== '--service') {
                throw new \InvalidArgumentException(
                    "wrong service param"
                );
            }
            $this->repoService = $customService[1];
            $accountRepo = explode('/', $params[2]);
            $this->accountName = $accountRepo[0];
            $this->repoName = $accountRepo[1];
            break;
        case 3:
            $this->branchName = $params[2];
            $accountRepo = explode('/', $params[1]);
            $this->accountName = $accountRepo[0];
            $this->repoName = $accountRepo[1];
            break;
        default:
            throw new \InvalidArgumentException('Invalid number of arguments or wrong format of arguments.');
        }

        return new RepoParams(
            $this->repoService,
            $this->accountName,
            $this->repoName,
            $this->branchName
        );
    }
}