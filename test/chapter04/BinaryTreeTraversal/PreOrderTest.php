<?php

require_once __DIR__ . '/../../../src/chapter04/BinaryTreeTraversal/PreOrder.php';

use PHPUnit\Framework\TestCase;

class PreOrderTest extends TestCase
{
    protected PreOrder $sut;

    /**
     * @test
     */
    public function testRun()
    {
        //Arrange
        $binaryTreeNode1 = new BinaryTreeNode(1);
        $binaryTreeNode2 = new BinaryTreeNode(2);
        $binaryTreeNode3 = new BinaryTreeNode(3);
        $binaryTreeNode4 = new BinaryTreeNode(4);
        $binaryTreeNode5 = new BinaryTreeNode(5);
        $binaryTreeNode6 = new BinaryTreeNode(6);
        $binaryTreeNode7 = new BinaryTreeNode(7);

        $binaryTreeNode4->left = $binaryTreeNode2;
        $binaryTreeNode4->right = $binaryTreeNode6;

        $binaryTreeNode2->left = $binaryTreeNode1;
        $binaryTreeNode2->right = $binaryTreeNode3;

        $binaryTreeNode6->left = $binaryTreeNode5;
        $binaryTreeNode6->right = $binaryTreeNode7;

        $head = $binaryTreeNode4;

        $expected = '4213657';

        $this->sut = new PreOrder();

        //Act
        $actual = $this->sut->run($head);

        //Assert
        $this->assertEquals($expected, $actual);
    }
}

