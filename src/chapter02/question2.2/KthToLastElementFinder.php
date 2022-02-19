<?php
require_once __DIR__ . '/../../lib/Node.php';

class KthToLastElementFinder
{
    public static function find(Node $node, $k)
    {
        $pointer1 = $node;
        $pointer2 = $node;

        for ($i = 0; $i < $k; $i++) {
            if (is_null($pointer1)) {
                return null;
            }

            $pointer1 = $pointer1->next;
        }

        while ($pointer1 != null) {
            $pointer1 = $pointer1->next;
            $pointer2 = $pointer2->next;
        }

        return $pointer2;
    }
}
