<?php

namespace RepoCheck\Repos\Github;

/**
 * Class Connector
 * @package RepoCheck\Repos\Github
 */
class Connector
{
    /**
     * API url
     */
    const API = 'https://api.github.com';

    /**
     * @param string github $accountName
     * @param string github $repoName
     * @param string github $branchName
     * @return bool|string
     */
    public function fetchData(string $accountName, string $repoName, string $branchName)
    {
        $handle = curl_init();
        curl_setopt(
            $handle,
            CURLOPT_URL,
            self::API . "/repos/$accountName/$repoName/branches/$branchName"
        );
        curl_setopt($handle, CURLOPT_HEADER, 0);
        curl_setopt($handle, CURLOPT_USERAGENT, "PHP CLI");
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($handle);
        curl_close($handle);
        return $data;
    }
}