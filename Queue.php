<?php
/**
 * Created by PhpStorm.
 * User: martin
 */
include "LinkList.php";

class Queue{
    public function push($LinkList,$node){
        $LinkList->insert($LinkList->m_length+1,$node);
        return $LinkList;
    }

    public function pop($LinkList,$i){
        $ret = $LinkList->get($i);
        return $ret;
    }
}

//测试程序
$Queue = new Queue();
$LinkList = new LinkList();
for($i=1;$i<5;$i++){
    $node = new LinkNode($i);
    $Queue->push($LinkList,$node);
}
for($j=1;$j<5;$j++){
    $ret = $Queue->pop($LinkList,$i);
    print_r($ret);
}

