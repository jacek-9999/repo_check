<?php

namespace RepoCheck\Repos\Github;

/**
 * Class Parser
 * @package RepoCheck\Repos\Github
 */
class Parser
{

    /**
     * @param string $data
     * @return mixed
     * @throws \Exception
     */
    public function parse(string $data)
    {
        $parsed = json_decode($data);
        if (!isset($parsed->commit->sha)) {
            throw new \Exception('response parsing error');
        }
        return $parsed->commit->sha;
    }
}