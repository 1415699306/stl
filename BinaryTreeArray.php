<?php
/**
 * Created by PhpStorm.
 * User: martin
 */
$nodes = [];
$nodes[] = "Final";
$nodes[] = "Semi Final 1";
$nodes[] = "Semi Final 2";
$nodes[] = "Quarter Final 1";
$nodes[] = "Quarter Final 2";
$nodes[] = "Quarter Final 3";
$nodes[] = "Quarter Final 4";

class BinaryTree{
    public $nodes = [];
    public function __construct($nodes = [])
    {
        $this->nodes = $nodes;
    }


    //2*$num+1
    //2*($num+1)
    public function traverse($num = 0,$level = 0){
        if(isset($this->nodes[$num])){
            echo str_repeat("-", $level);
            echo $this->nodes[$num] . "</br>";
            $this->traverse(2*$num+1,$level+1);
            $this->traverse(2*($num+1),$level+1);
        }
    }
}


$BinaryTree = new BinaryTree($nodes);
$BinaryTree->traverse();
