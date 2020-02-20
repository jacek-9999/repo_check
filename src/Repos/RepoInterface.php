<?php

namespace RepoCheck\Repos;

/**
 * Interface RepoInterface
 * @package RepoCheck\Repos
 */
interface RepoInterface
{
    /**
     * @param string $name
     * @return mixed
     */
    public function setAccountName(string $name);

    /**
     * @param string $name
     * @return mixed
     */
    public function setRepoName(string $name);

    /**
     * @param string $name
     * @return mixed
     */
    public function setBranchName(string $name);

    /**
     * @return string
     */
    public function getSha(): string ;
}