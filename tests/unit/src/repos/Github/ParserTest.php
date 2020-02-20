<?php
use PHPUnit\Framework\TestCase;

class ParserTest extends \PHPUnit\Framework\TestCase
{
    public function testParse() 
    {
        $parser = new \RepoCheck\Repos\Github\Parser();
        $validData = json_encode(['commit' => ['sha' => 777]]);
        $this->assertEquals(777, $parser->parse($validData));
    }
}
