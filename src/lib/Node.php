<?php

class Node {
    public $data;
    public $next;

    public function __construct($data = null) {
        $this->data = $data;
        $this->next = null;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getNext() {
        return $this->next;
    }

    public function setNext($node) {
        $this->next = $node;
    }
}