<?php

require_once __DIR__ . '/../../lib/BinaryTreeNodeWithParent.php';

class SuccessorNodeFinder
{
    public static function findSuccessor(?BinaryTreeNodeWithParent $node)
    {
        return self::inorderSuccessor($node);
    }

    private static function inorderSuccessor(?BinaryTreeNodeWithParent $node): ?BinaryTreeNode
    {
        if (is_null($node)) {
            return null;
        }

        if (!is_null($node->right)) {
            return self::leftMostChild($node->right);
        } else {
            $parent = $node->parent;

            while (!is_null($parent) && ($parent->left != $node)) {
                $node = $parent;
                $parent = $parent->parent;
            }

            return $parent;
        }
    }

    private static function leftMostChild(BinaryTreeNode $node): BinaryTreeNode
    {
        while (!is_null($node->left)) {
            $node = $node->left;
        }

        return $node;
    }


}
