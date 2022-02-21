<?php

class Queue
{
    protected ?QueueNode $first;
    protected ?QueueNode $last;

    public function add($item)
    {
        $queueNode = new QueueNode($item);

        if (!is_null($this->last)) {
            $this->last->next = $queueNode;
        }

        $this->last = $queueNode;

        if (is_null($this->first)) {
            $this->first = $queueNode;
        }
    }

    public function remove()
    {
        if (is_null($this->first)) {
            throw new Exception('No Such Element');
        }

        $item = $this->first->data;

        $this->first = $this->first->next;

        if (is_null($this->first)) {
            $this->last = null;
        }

        return $item;

    }

    public function peek()
    {
        if (is_null($this->first)) {
            throw new Exception('No Such Element');
        }

        return $this->first->data;
    }

    public function isEmpty()
    {
        return is_null($this->first);
    }
}

class QueueNode
{
    public mixed $data;
    public ?QueueNode $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}