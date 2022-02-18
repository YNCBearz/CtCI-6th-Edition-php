<?php
require_once __DIR__ . '/../../lib/Node.php';

class MiddleNodeDeleter
{
    public static function deleteNodeFromLinkedList(Node $node)
    {
        if (is_null($node) || is_null($node->next)) {
            return false;
        }

        $node->data = $node->next->data;
        $node->next = $node->next->next;
    }
}
