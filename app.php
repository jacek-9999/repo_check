<?php
require_once __DIR__ . '/vendor/autoload.php';
use RepoCheck\CheckRepoLastSha;

$r = CheckRepoLastSha::getInstance();
try {
    $val = $r->run($argv);
    echo($val . "\n");
} catch (Exception $e) {
    $hint = <<<USAGE
Usage:
./app php-fig/log master
./app --service=bitbucket php-fig/log master
USAGE;
    echo('error: ' . $e->getMessage() . "\n" . $hint . "\n");
    exit(1);
}
