<?php

require_once __DIR__ . '/../../lib/BinaryTreeNode.php';

class BalancedTreeChecker
{
    public static function isBalanced(?BinaryTreeNode $node): bool
    {
        if (is_null($node)) {
            return true;
        }

        return self::getHeight($node) != PHP_INT_MIN;
    }

    public static function getHeight(?BinaryTreeNode $node): int
    {
        if (is_null($node)) {
            return -1;
        }

        $leftHeight = self::getHeight($node->left);

        if ($leftHeight == PHP_INT_MIN) {
            return PHP_INT_MIN;
        }

        $rightHeight = self::getHeight($node->right);

        if ($rightHeight == PHP_INT_MIN) {
            return PHP_INT_MIN;
        }

        $heightDiff = abs($leftHeight - $rightHeight);

        if ($heightDiff > 1) {
            return PHP_INT_MIN;
        } else {
            return max($leftHeight, $rightHeight) + 1;
        }
    }

}
