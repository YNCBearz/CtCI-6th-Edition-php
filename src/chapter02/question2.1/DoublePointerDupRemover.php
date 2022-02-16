<?php

require_once __DIR__ . '/../../lib/Node.php';

class DoublePointerDupRemover
{
    public static function removeDups(Node $node)
    {
        self::removeDuplicated($node);
    }

    public static function removeDuplicated(Node $node)
    {
        $pointer1 = $node;

        while (!is_null($pointer1)) {
            $pointer2 = $pointer1;

            while (!is_null($pointer2->next)) {
                if ($pointer2->next->data == $pointer1->data) {
                    $pointer2->next = $pointer2->next->next;
                } else {
                    $pointer2 = $pointer2->next;
                }
            }

            $pointer1 = $pointer1->next;
        }
    }
}
