<?php
require_once __DIR__ . '/../../lib/Node.php';

class LinkedListPartitioner
{
    public static function partition(Node $node, $x)
    {
        $head = new Node();
        $headStart = $head;

        $tail = new Node();
        $tailStart = $tail;

        while (!is_null($node)) {
            $data = $node->data;

            if ($data < $x) {
                $head->next = new Node($data);
                $head = $head->next;
            } else {
                $tail->next = new Node($data);
                $tail = $tail->next;
            }

            $node = $node->next;
        }

        $head->next = $tailStart->next;

        return $headStart->next;
    }
}
