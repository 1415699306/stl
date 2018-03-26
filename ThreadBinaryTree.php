<?php

class TreeNode{    public $data = 0;    public $lchild=null;    public $rchild=null;    public $Ltag = 0;    public $Rtag = 1;
    static $front = 0;    static $rear=0;
    static $a=[];
    public function __construct($data = null)    {        $this->data = $data;    }}
$pre = new TreeNode();
//中序对二叉树进行线索化function InThreading($p){ $pre = new TreeNode(); if($p){  InThreading($p->lchild);//递归当前结点的左子树，进行线索化  if($p->lchild!=null){   //如果当前结点没有左孩子，左标志位设为1，左指针域指向上一结点 pre   $p->Ltag=1;   $p->lchild=$pre;  }  //如果 pre 没有右孩子，右标志位设为 1，右指针域指向当前结点  if($pre && !$pre->rchild){   $pre->Rtag=0;         $pre->rchild=$p;  }  $pre=$p;  InThreading($p->rchild); }}
//中序遍历线索二叉树function InOrderThraverse_Thr($p){ while($p){  //一直找左孩子，最后一个为中序序列中排第一的  while($p->Ltag  == 0){   $p=$p->lchild;  }  echo $p->data.'</br>';  //当结点右标志位为1时，直接找到其后继结点  while($p->Rtag==1 && $p->rchild!=null){   $p = $p->rchild;         echo $p->data.'</br>';  }  //否则，按照中序遍历的规律，找其右子树中最左下的结点，也就是继续循环遍历  $p=$p->rchild; }}
/*
LTag 值为 0 时，表示 lchild 指针域指向的是该结点的左孩子；为 1 时，表示指向的是该结点的直接前趋结点；• RTag 值为 0 时，表示 rchild 指针域指向的是该结点的右孩子；为 1 时，表示指向的是该结点的直接后继结点。
 *///树初始化$tree = new TreeNode();$tree->data = 1;$tree->lchild=new TreeNode();$tree->rchild=new TreeNode();//$tree->LTag = 0;//$tree->RTag = 0;$tree->lchild->data=2;$tree->lchild->lchild=new TreeNode();$tree->lchild->rchild=new TreeNode();//$tree->lchild->LTag = 0;//$tree->lchild->RTag = 0;
$tree->lchild->rchild->data=5;// $tree->lchild->rchild->LTag=1;// $tree->lchild->rchild->RTag=1;$tree->lchild->rchild->lchild=NULL;$tree->lchild->rchild->rchild=NULL;
// $tree->rchild->LTag=0;// $tree->rchild->RTag=0;$tree->rchild->data=3;$tree->rchild->lchild=new TreeNode();$tree->rchild->lchild->data=6;$tree->rchild->lchild->lchild=NULL;$tree->rchild->lchild->rchild=NULL;// $tree->rchild->lchild->LTag=1;// $tree->rchild->lchild->RTag=1;
$tree->rchild->rchild=new TreeNode();$tree->rchild->rchild->data=7;$tree->rchild->rchild->lchild=NULL;$tree->rchild->rchild->rchild=NULL;// $tree->rchild->rchild->LTag=1;// $tree->rchild->rchild->RTag=1;
$tree->lchild->lchild->data=4;$tree->lchild->lchild->lchild=NULL;$tree->lchild->lchild->rchild=NULL;// $tree->lchild->lchild->LTag=1;// $tree->lchild->lchild->RTag=1;
InThreading($tree);InOrderThraverse_Thr($tree);
