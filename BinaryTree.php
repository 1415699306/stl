<?php

class TreeNode{
    public $data = 0;
    public $lchild=null;
    public $rchild=null;

    public function __construct($data = null)
    {
        $this->data = $data;
    }
}


function displayNode(TreeNode $node){
    echo $node->data;
}

function preOrder($root){
    $stack = [];
    array_push($stack,$root);
    while(!empty($stack)){
        $center_node = array_pop($stack);
        echo $center_node->data . ' ';
        if($center_node->rchild != null) array_push($stack,$center_node->rchild);
        if($center_node->lchild != null) array_push($stack,$center_node->lchild);
    }
}

function recv_preOrder($root){
    echo $root->data . ' ';
    if($root->rchild != null){
        recv_preOrder($root->rchild);
    }
    if($root->lchild != null){
        recv_preOrder($root->lchild);
    }
}

function midOrder($root){
    $stack = [];
    $center_node = $root;
    while(!empty($stack) || $center_node!=null){
        while($center_node!=null){
            array_push($stack, $center_node);
            $center_node = $center_node->lchild;
        }
        $center_node = array_pop($stack);
        echo $center_node->data . ' ';
        $center_node = $center_node->rchild;
    }
}

function recv_midOrder($root){
    if($root->rchild != null){
        recv_preOrder($root->rchild);
    }
    echo $root->data . ' ';
    if($root->lchild != null){
        recv_preOrder($root->lchild);
    }
}

function recv_endOrder($root){
    if($root->rchild != null){
        recv_preOrder($root->rchild);
    }
    if($root->lchild != null){
        recv_preOrder($root->lchild);
    }
    echo $root->data . ' ';
}

//递归版
function level_order1($root,$level){
    if($root == NULL || $level < 1){
        return;
    }
    if($level == 1){
        echo $root->data.' ';
        return;
    }
    if($root->rchild!=null){
        level_order1($root->rchild,$level-1);
    }
    if($root->lchild!=null){
        level_order1($root->lchild,$level-1);
    }
}

function LevelOrder($root){
    $level = 3;
    for($i = 1;$i <= $level;$i ++){
        level_order1($root,$i);
    }
}

$tree = new TreeNode();
$tree->data = 1;
$tree->lchild=new TreeNode();
$tree->rchild=new TreeNode();
$tree->lchild->data=2;
$tree->lchild->lchild=new TreeNode();
$tree->lchild->rchild=new TreeNode();
$tree->lchild->rchild->data=5;
$tree->lchild->rchild->lchild=NULL;
$tree->lchild->rchild->rchild=NULL;

$tree->rchild->data=3;
$tree->rchild->lchild=new TreeNode();
$tree->rchild->lchild->data=6;
$tree->rchild->lchild->lchild=NULL;
$tree->rchild->lchild->rchild=NULL;

$tree->rchild->rchild=new TreeNode();
$tree->rchild->rchild->data=7;
$tree->rchild->rchild->lchild=NULL;
$tree->rchild->rchild->rchild=NULL;

$tree->lchild->lchild->data=4;
$tree->lchild->lchild->lchild=NULL;
$tree->lchild->lchild->rchild=NULL;

recv_preOrder($tree);
echo "</br>";
recv_midOrder($tree);
echo "</br>";
recv_endOrder($tree);
echo "</br>";
LevelOrder($tree);
echo "</br>";
