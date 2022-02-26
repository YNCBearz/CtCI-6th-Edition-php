<?php

class InOrder
{
    protected string $result = '';

    public function run(BinaryTreeNode $node): string
    {
        $this->InOrderTraversal($node);

        return $this->result;
    }

    public function InOrderTraversal(?BinaryTreeNode $node)
    {
        if ($node != null) {
            $this->InOrderTraversal($node->left);
            $this->visit($node);
            $this->InOrderTraversal($node->right);
        }
    }

    private function visit(BinaryTreeNode $node)
    {
        $this->result = $this->result . $node->data;
    }
}
