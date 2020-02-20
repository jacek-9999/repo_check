<?php
namespace RepoCheck;

/**
 * Interface JobInterface
 * @package RepoCheck
 */
interface JobInterface
{
    /**
     * @param array $params
     * @return string
     */
    public function run(array $params): string;
}