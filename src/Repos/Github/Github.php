<?php

namespace RepoCheck\Repos\Github;

use RepoCheck\Repos\RepoInterface;

/**
 * Class Github
 * @package RepoCheck\Repos\Github
 */
class Github implements RepoInterface
{

    /**
     * @var Connector
     */
    private $connector;
    /**
     * @var Parser
     */
    private $parser;
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
     * Github constructor.
     * @param Connector $connector
     * @param Parser $parser
     */
    public function __construct(Connector $connector, Parser $parser)
    {
        $this->connector = $connector;
        $this->parser = $parser;
    }

    /**
     * @param string $name
     */
    public function setAccountName(string $name)
    {
        $this->accountName = $name;
    }

    /**
     * @param string $name
     */
    public function setRepoName(string $name)
    {
        $this->repoName = $name;
    }

    /**
     * @param string $name
     */
    public function setBranchName(string $name)
    {
        $this->branchName = $name;
    }

    /**
     * @return string
     */
    public function getSha(): string
    {
        if (empty($this->accountName) || empty($this->repoName) || empty($this->branchName)) {
            throw new \InvalidArgumentException('invalid repo data');
        }
        $data = $this->connector->fetchData($this->accountName, $this->repoName, $this->branchName);
        return $this->parser->parse($data);
    }

    /**
     * @return Github
     */
    public static function getInstance()
    {
        return new self(new Connector(), new Parser());
    }
}