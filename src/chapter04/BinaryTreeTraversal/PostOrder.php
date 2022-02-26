<?php

class PostOrder
{
    protected string $result = '';

    public function run(BinaryTreeNode $node): string
    {
        $this->PostOrderTraversal($node);

        return $this->result;
    }

    public function PostOrderTraversal(?BinaryTreeNode $node)
    {
        if ($node != null) {
            $this->PostOrderTraversal($node->left);
            $this->PostOrderTraversal($node->right);
            $this->visit($node);
        }
    }

    private function visit(BinaryTreeNode $node)
    {
        $this->result = $this->result . $node->data;
    }
}
