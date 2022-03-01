<?php

require_once __DIR__ . '/../../lib/BinaryTreeNode.php';

class BinarySearchTreeChecker
{
    protected static ?int $lastPrinted = null;

    public static function isBinarySearchTree(?BinaryTreeNode $node, $min = null, $max = null)
    {
        $result = self::checkBST($node);
        self::$lastPrinted = null;

        return $result;
    }

    public static function checkBST(?BinaryTreeNode $node)
    {
        if (is_null($node)) {
            return true;
        }

        if (!self::checkBST($node->left)) {
            return false;
        }

        if (!is_null(self::$lastPrinted) && $node->data < self::$lastPrinted) {
            return false;
        }

        self::$lastPrinted = $node->data;

        if (!self::checkBST($node->right)) {
            return false;
        }

        return true;
    }
}
