<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 17:57
 */
include "list.php";
/*class Node{
    public $value;
    public $next = null;
    public function __construct()
    {

    }
}*/

class CircleList{
    public $m_circle;
    public function __construct($m_circle)
    {
        $this->m_circle  = $m_circle;
    }

    public function insert($i,$e){
        $ret  = true;
        if($ret){
            $i=$i%($this->m_circle->m_length+1);
            $ret=$this->m_circle->insert($i,$e);
            if($ret && $i = 0){
                $this->last_to_frist();
            }
        }
        return $ret;
    }

    public function last(){
        return $this->m_circle->position($this->m_length-1)->next;
    }

    public function last_to_frist(){
        $this->last()->next=$this->m_circle->m_header->next;
    }

    public function mod($i){
        return ($this->m_circle->m_length==0)?0:($i%$this->m_circle->m_length);
    }

    public function set($i,$e){
        return $this->m_circle->set($this->mod($i),$e);
    }

    public function get($i){
        return $this->m_circle->get($this->mod($i));
    }

    public function find($e){
        $ret = 0;
        $Slider = $this->m_circle->m_header->next;
        for($i=0;$i<$this->m_circle->m_length;$i++){
            if($Slider->value==$e)
                {
                    $ret=$i;
                    break;
                }
                $Slider=$Slider->next;
        }
        return $ret;
    }

    public function move($i,$step = 1){
        return $this->m_circle->move($this->mod($i),$step);
    }

    public function end(){
        return ($this->m_circle->m_length==0)||($this->m_circle->m_current==NULL);
    }

    public function next(){
        $this->m_circle->next();
    }

    public function current(){
        if(!$this->m_circle->end()){
            return $this->m_circle->m_current->value;
        }
    }

}

$linklist = new LinkList();
$CircleList = new CircleList($linklist);
for($i=0;$i<5;$i++){
    $CircleList->insert(0,$i);
}
for($CircleList->move(0);!$CircleList->end();$CircleList->next()){
    echo $CircleList->current().'</br>';
}