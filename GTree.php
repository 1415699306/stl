<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 15:49
 */
include "list.php";

class TreeNode{
    public $value;
    public $parent;

    public function __construct()
    {
        $this->parent = null;
    }
}

class GTreeNode extends TreeNode{
    public $child;
    public function __construct()
    {
        $this->child  = new LinkList();
    }
}


class Tree{
    public $m_root;
    public function __construct()
    {
        $this->m_root  = null;
    }

    //方法实现
    public function insert($value,TreeNode $node){

    }

    public function find($node,$value){

    }

    public function degree(){

    }

    public function count(){

    }

    public function height(){

    }
}
class GTree extends Tree{

}

