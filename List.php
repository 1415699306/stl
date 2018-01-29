<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 10:24
 */
class Node{
    public $value;
    public $next = null;
    public function __construct()
    {

    }
}

class LinkList{
    public $m_header;
    public $m_length;
    public $m_step;
    public $m_current;

    public function __construct()
    {
        $this->m_length = 0;
        $this->m_step = 1;
        $this->m_current = null;
        $this->m_header = new Node();
    }

    public function position($i = 0){
        $ret = $this->m_header;
        if($ret){
            for($p=0;$p<$i;$p++){
                $ret = $ret->next;
            }
        }
        return $ret;
    }

    public function insert($i,$e){
        $ret = false;
        if($i>=0){
            $ret = true;
        }
        if($ret){
            $node = new Node();
            $current = $this->m_header;
            for($p=0;$p<$i;$p++){
                $current = $current->next;
            }
            $node->value = $e;
            $node->next = $current->next;
            $current->next = $node;
            $this->m_length++;
        }
    }

    public function remove($i){
        $ret = false;
        if(($i>=0 && $i<$this->m_length)){
            $ret = true;
        }
        if($ret){
            $current = $this->m_header;
            for($p=0;$p<$i;$p++){
                $current = $current->next;
            }
            $ret = $current->next;
            $current->next = $ret->next;
            $this->m_length--;
        }
    }

    public function set($i,$e){
        $ret = false;
        if(($i>=0 && $i<$this->m_length)){
            $ret = true;
        }
        if($ret){
            $current = $this->m_header;
            for($p=0;$p<$i;$p++){
                $current = $current->next;
            }
            $current->next->value = $e;
        }
        return $ret;
    }

    public function get($i){
        $ret = false;
        if(($i>=0 && $i<$this->m_length)){
            $ret = true;
        }
		if($ret){
            $current = $this->m_header;
            for($p=0;$p<$i;$i++){
                $current = $current->next;
			}
			$e = $current->next->value;
		}
		return $ret;
    }

    public function move($i,$step = 1){
        $ret = false;
        if(($i>=0 && $i<$this->m_length && $step>0)){
            $ret = true;
        }
		if($ret){
            $this->m_current = $this->position($i)->next;
            $this->m_step = $step;
        }
		return $ret;
    }

    public function end(){
        return ($this->m_current == null);
    }

    public function current(){
        if(!$this->end()){
            return $this->m_current->value;
        }
    }

    public function next(){
        $i = 0;
        while($i<$this->m_step && !$this->end()){
            $this->m_current = $this->m_current->next;
            $i++;
        }
        return ($i = $this->m_step);
    }
}

$list = new LinkList();
for($i=0;$i<5;$i++){
    $list->insert(0,$i);
}
for($list->move(0);!$list->end();$list->next()){
    echo $list->current().'</br>';
}
