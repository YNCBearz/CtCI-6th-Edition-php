<?php

$baseDir = __DIR__ . '/../../../src/chapter02/question2.6';
require_once $baseDir . '/LinkedListPalindromeChecker.php';

class LinkedListPalindromeCheckerTest extends \PHPUnit\Framework\TestCase
{

    public function testIsPalindrome()
    {
        $node1 = new Node('A');
        $head = $node1;

        $node2 = new Node('B');
        $node3 = new Node('C');
        $node4 = new Node('B');
        $node5 = new Node('A');

        $node1->next = $node2;
        $node2->next = $node3;
        $node3->next = $node4;
        $node4->next = $node5;

        $this->assertTrue(LinkedListPalindromeChecker::isPalindrome($head));
    }

    public function testIsNotPalindrome()
    {
        $node1 = new Node('A');
        $head = $node1;

        $node2 = new Node('B');
        $node3 = new Node('C');

        $node1->next = $node2;
        $node2->next = $node3;

        $this->assertFalse(LinkedListPalindromeChecker::isPalindrome($head));
    }
}
