<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 17:57
 */
class LinkNode{
    public $next=null;
    public $pre=null;
    public $data=0;
    public function __construct($data = null)
    {
        $this->data = $data;
    }
}

class CircleLinkList{
    public $header;
    public $m_length;
    public function __construct()
    {
        $this->header = new LinkNode();
    }

    public function insert($pos, $node = null)
    {
        $current = $this->header;
        if($pos>0){
            for($i=1;$i<$pos;$i++){
                $current = $current->next;
            }
            //$current->next = $node;
            $node->next = $current->next;
            $current->next = $node;
            if($this->m_length == 0){
                $node->next = $node;
            }
            $this->m_length++;
        }
        return true;
    }

    public function get($pos){
        $ret = null;
        if($pos>0 && $pos<=$this->m_length){
            $current = $this->header;
            for($i=0;$i<$pos;$i++){
                $current = $current->next;
            }
            $ret = $current->next;
        }
        return $ret;
    }

    public function delete($pos){
        $current = $this->header;
        if($current!=null && $pos>=0 && $pos<$this->m_length){
            for($i=0;$i<$pos;$i++){
                $current=$current->next;
            }
            $ret = $current->next;
            $current->next = $ret->next;
            $this->m_length--;
        }
        return true;
    }
}
