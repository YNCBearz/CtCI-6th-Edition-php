<?php

require_once __DIR__ . '/../../lib/BinaryTreeNode.php';

class BalancedTreeChecker
{
    public static function isBalanced(?BinaryTreeNode $node): bool
    {
        if (is_null($node)) {
            return true;
        }

        $heightDiff = abs(self::getHeight($node->left) - self::getHeight($node->right));

        if ($heightDiff > 1) {
            return false;
        } else {
            return self::isBalanced($node->left) && self::isBalanced($node->right);
        }
    }

    public static function getHeight(?BinaryTreeNode $node): int
    {
        if (is_null($node)) {
            return -1;
        }

        return max(self::getHeight($node->left), self::getHeight($node->right)) + 1;
    }

}
