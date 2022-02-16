<?php

require_once __DIR__ . '/../../lib/Node.php';

class HashTableDupRemover
{
    public static function removeDups(Node $node)
    {
        self::removeDuplicated($node);
    }

    public static function removeDuplicated(Node $node)
    {
        $hashTable = [];

        /**
         * @var ?Node $previousNode
         */
        $previousNode = null;

        while (!is_null($node)) {
            if (in_array($node->data, $hashTable)) {
                $previousNode->next = $node->next;
            } else {
                $hashTable[] = $node->data;
                $previousNode = $node;
            }

            $node = $node->getNext();
        }
    }
}
