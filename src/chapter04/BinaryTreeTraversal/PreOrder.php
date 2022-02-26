<?php

class PreOrder
{
    protected string $result = '';

    public function run(BinaryTreeNode $node): string
    {
        $this->preOrderTraversal($node);

        return $this->result;
    }

    public function preOrderTraversal(?BinaryTreeNode $node)
    {
        if ($node != null) {
            $this->visit($node);
            $this->preOrderTraversal($node->left);
            $this->preOrderTraversal($node->right);
        }
    }

    private function visit(BinaryTreeNode $node)
    {
        $this->result = $this->result . $node->data;
    }
}
