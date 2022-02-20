<?php

require_once __DIR__ . '/../../lib/LinkedList.php';

class LinkedListPalindromeChecker
{
    public static function isPalindrome(?Node $node): bool
    {
        $reversed = self::reverseAndClone($node);
        return self::isEqual($node, $reversed);
    }

    private static function reverseAndClone(Node $node): ?Node
    {
        $head = null;

        while (!is_null($node)) {
            $n = new Node($node->data);
            $n->next = $head;

            $head = $n;
            $node = $node->next;
        }

        return $head;
    }

    private static function isEqual(?Node $node, ?Node $reversed): bool
    {
        while (!is_null($node) && !is_null($reversed)) {
            if ($node->data != $reversed->data) {
                return false;
            }

            $node = $node->next;
            $reversed = $reversed->next;
        }

        return $node === $reversed;
    }
}
