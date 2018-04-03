<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 */

class e_node{
    public $ivex;       // 该边所指向的顶点的位置
    public $next_edge;  // 指向下一条弧的指针

    public function __construct($pos)
    {
        $this->ivex=$pos;
    }
}

//顶点数据
class v_node{
    public $data;
    public $first_edge;  // 指向第一条依附该顶点的弧

    public function __construct($key)
    {
        $this->data = $key;
    }
}

class list_udg{
    //顶点边
    public $mVexs;

    //初始化顶点和边
    public function __construct($vexs, $edges)
    {
        //初始化顶点
        foreach($vexs as $val){
            $this->mVexs[] = new v_node($val);
        }
        //初始化边
        foreach($edges as $key=>$val){
            //起始顶点及结束顶点
            $p1 = $this->position($val[0]);  //起始顶点
            $p2 = $this->position($val[1]);  //结束顶点
            $node1 = new e_node($p2);
            $node2 = new e_node($p1);
            if($this->mVexs[$p1]->first_edge == null){
                $this->mVexs[$p1]->first_edge = $node1;
            }else{
                $this->link_last($this->mVexs[$p1]->first_edge,$node1);
            }
            if($this->mVexs[$p2]->first_edge == null){
                $this->mVexs[$p2]->first_edge = $node2;
            }else{
                $this->link_last($this->mVexs[$p2]->first_edge,$node2);
            }
        }
    }

    //插入到链表结点
    public function link_last($list,$node){
        $temp = $list;
        while($temp->next_edge!=null){
            $temp = $temp->next_edge;;
        }
        $temp->next_edge = $node;
    }

    public function position($char){
        $res=-1;
        foreach($this->mVexs as $key=>$val){
            if($val->data == $char){
                $res=$key;
            }
        }
        return $res;
    }

    //元素打印输出
    public function _print(){
        echo '*****邻接表*****<br/>';
        foreach ($this -> mVexs as $key => $val) {
            echo "$key({$val -> data})：";
            $node = $val->first_edge;
            while($node!=null){
                $ivex = $node -> ivex;
                echo " -> $ivex({$this -> mVexs[$ivex] -> data})";
                $node = $node->next_edge;
            }
            echo "</br>";
        }
    }
}

// 测试数据
$vexs  = array('A', 'B', 'C', 'D', 'E', 'F', 'G');
$edges = array(
    array('A', 'C'),
    array('A', 'D'),
    array('A', 'F'),
    array('B', 'C'),
    array('C', 'D'),
    array('E', 'G'),
    array('F', 'G')
);

$list = new list_udg($vexs,$edges);
$list->_print();
