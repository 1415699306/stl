<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 10:24
 */
class LinkNode{
    public $data = 0;
    public $next = null;
    public function __construct($data = null)
    {
        $this->data = $data;
    }
}

class LinkList
{
    public $m_length;
    public $header;

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
    
    //链表反转
    public function ReverseList($head){
        if($head == null){
            return null;
        }
        $pre=null;
        $cur=null;
        while($head!=null){
            $next = $head->next;
            $head->next = $pre;
            $pre = $head;
            $head = $next;
        }
        return $pre;
    }
    
    //Given 1->1->2, return 1->2.
    //Given 1->1->2->3->3, return 1->2->3.
    public function deleteDuplicates($head){
        if($head == null || $head->next == null){
            return null;
        }
        $q = $head;
        while($q){
            /*if( $q->next!=NULL && $q->next->value==$q->value ) {
                $p=$q->next;
                $q->next=$p->next;
            }else{
                $q=$q->next;
            }*/
            if($q->next!=null && $q->value==$q->next->value){
                $p=$q->next;
                $q->next=$p->next;
            }else{
                $q=$q->next;
            }
        }
        return $head;
    }
    
    //Partition List （链表处理）
    /*
     * Given 1->4->3->2->5->2 and x = 3,
        return 1->2->2->4->3->5.
     * */
    public function partition($head,$x){
        $head1 = new Node();
        $head2 = new Node();
        $p1=$head1;
        $p2=$head2;
        while($head->next!=null){
            if($head->value<$x)
            {
                $p1->next=new Node($head->value);
                $p1=$p1->next;
            }
            else
            {
                $p2->next=new Node($head->value);
                $p2=$p2->next;
            }
            $head=$head->next;
        }
        if($head2->next!=NULL) $p1->next=$head2->next;
        $temp=$head1->next;
        return $temp;
    }
}
