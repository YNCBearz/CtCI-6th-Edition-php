<?php
require_once __DIR__ . '/../../lib/Node.php';

class HashTableDupRemover
{
    public static function removeDups(Node $node)
    {
        $hashTable = [];

        /**
         * @var ?Node $previousNode
         */
        $previousNode = null;

        while (!is_null($node)) {
            if (in_array($node->getData(), $hashTable)) {
                $previousNode->setNext($node->getNext());
            } else {
                $hashTable[] = $node->getData();
                $previousNode = $node;
            }

            $node = $node->getNext();
        }
    }
}
