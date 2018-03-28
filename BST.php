<?php
/**
 * Created by PhpStorm.
 * User: martin
 */
class Node{
    public $data;
    public $left;
    public $right;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    public function min(){
        $node=$this;
        while($node->left) {
            $node = $node->left;
        }
        return $node;
    }

    public function max() {
        $node = $this;
        while($node->right) {
            $node = $node->right;
        }
        return $node;
    }

    public function successor() {
        $node = $this;
        if($node->right)
            return $node->right->min();
        else
            return NULL;
    }

    public function predecessor() {
        $node = $this;
        if($node->left)
            return $node->left->max();
        else
            return NULL;
    }
}

class BST{
    public $root=null;
    public function __construct($data = null)
    {
        $this->root = new Node($data);
    }

    public function isEmpty(){
        if($this->root == null){
            return true;
        }
        return false;
    }

    public function search($data){
        if($this->isEmpty()){
            return false;
        }
        $node = $this->root;
        while($node){
            if($data > $node->data){
                $node = $node->left;
            }elseif($data < $node->data){
                $node = $node->right;
            }else{
                return false;
            }
        }
        return $node;
    }

    public function insert($data){
        if($this->isEmpty()){
            $node=new Node($data);
            $this->root = $node;
            return $node;
        }
        $node = $this->root;
        while($node){
            if($data > $node->data){
                if($node->right){
                    $node = $node->right;
                }else{
                    $node->right = new Node($data);
                    $node = $node->right;
                    return;
                }
            }elseif($data < $node->data) {
                if($node->left) {
                    $node = $node->left;
                } else {
                    $node->left = new Node($data);
                    $node = $node->left;
                    return;
                }
            } else {
                return;
            }
        }
        return $node;
    }


    public function traverse($node){
        if($node){
            if($node->left){
                $this->traverse($node->left);
            }
            echo $node->data . "\n";
            if($node->right){
                $this->traverse($node->right);
            }
        }
    }
}


$tree = new BST(10);

$tree->insert(12);
$tree->insert(6);
$tree->insert(3);
$tree->insert(8);
$tree->insert(15);
$tree->insert(13);
$tree->insert(36);
echo "数据遍历</br>";
$tree->traverse($tree->root);
