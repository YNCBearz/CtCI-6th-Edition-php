<?php

$baseDir = __DIR__ . '/../../../src/chapter02/question2.2';
require_once $baseDir . '/KthToLastElementFinder.php';

class KthToLastElementFinderTest extends \PHPUnit\Framework\TestCase
{
    protected $linkedList;
    protected $values;

    protected function setUp(): void
    {
        $this->values = [16, 22, 4, 19, 99, 17, 44, 90];
        // build a linked list
        $head = null;
        $previousNode = null;
        foreach ($this->values as $value) {
            $node = new Node($value);
            if ($head === null) {
                $head = $node;
            } else {
                $previousNode->setNext($node);
            }
            $previousNode = $node;
        }
        $this->linkedList = $head;
    }

    protected function tearDown(): void
    {
        $this->linkedList = null;
        $this->values = null;
    }

    public function testFind()
    {
        $expectedValues = [17, 44, 90];
        // build a linked list
        $head = null;
        $previousNode = null;
        foreach ($expectedValues as $value) {
            $node = new Node($value);
            if ($head === null) {
                $head = $node;
            } else {
                $previousNode->setNext($node);
            }
            $previousNode = $node;
        }

        $expected = $head;

        $this->assertEquals($expected, KthToLastElementFinder::find($this->linkedList, 3));
        $this->assertNull(KthToLastElementFinder::find($this->linkedList, 99));
    }
}
