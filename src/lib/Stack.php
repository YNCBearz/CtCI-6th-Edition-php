<?php

class Stack
{
    protected ?StackNode $top;

    public function pop()
    {
        if (is_null($this->top)) {
            throw new Exception('Empty Stack');
        }

        $item = $this->top->data;
        $this->top = $this->top->next;

        return $item;
    }

    public function push($item)
    {
        $stackNode = new StackNode($item);
        $stackNode->next = $this->top;

        $this->top = $stackNode;
    }

    public function peek()
    {
        if (is_null($this->top)) {
            throw new Exception('Empty Stack');
        }

        return $this->top->data;
    }

    public function isEmpty()
    {
        return is_null($this->top);
    }

}

class StackNode
{
    public mixed $data;
    public ?StackNode $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}
