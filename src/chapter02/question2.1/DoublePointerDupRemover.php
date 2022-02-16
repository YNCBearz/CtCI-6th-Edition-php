<?php
require_once __DIR__ . '/../../lib/Node.php';

class DoublePointerDupRemover
{
    public static function removeDups(Node $node)
    {
        $pointer1 = $node;

        while (!is_null($pointer1)) {
            $pointer2 = $pointer1;

            while (!is_null($pointer2->getNext())) {
                if ($pointer2->getNext()->getData() == $pointer1->getData()) {
                    $pointer2->setNext($pointer2->getNext()->getNext());
                } else {
                    $pointer2 = $pointer2->getNext();
                }
            }

            $pointer1 = $pointer1->getNext();
        }
    }
}
