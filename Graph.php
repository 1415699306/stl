<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 */
class Node{
	public $var=null;
	public $arrNext = [];
	public function __construct($val = null){
		$this->val = $val;
	}

}

class Graph{
	//建立连通图，nodes =array('val1'=>array('val2','val3'..),'val2'=>array(...));
    //返回第一个节点，由于是连通图，可以根据第一个节点遍历整个图
    public function generate(array $nodes){$arrNodes= array_keys($nodes);
       $resNodes= array();
       foreach($arrNodes as $nodeVal){
                $resNodes[$nodeVal]= new Node($nodeVal);
       }
       foreach($nodes as $key => $val){
                foreach($val as $node){
                         if(isset($resNodes[$node]) &&is_object($resNodes[$node])){
                                   $resNodes[$key]->arrNext[]= $resNodes[$node];
                         }
                }
       }
       return current($resNodes);
    }

    //深度优先遍历
    /**
     *深度优先算法：采用栈（后进先出LIFO）的思想，遍历节点时，被遍历的节点出栈，再遍历其子节点，将子节点逐一进栈。需要注意的是，为了防止重复遍历，被遍历过的节点以及已经进栈的节点，需要用一个数组存着，避免再次进站
     */
    public function searchByDeep(Node $node){
    	$resultWord= array();//存放遍历结果
     	$nodeStack= array();//存放遍历过程中的中间结果
        $wordStack= array();//**存放当前已经进栈的节点，防止重复进栈**
        array_push($nodeStack,$node);
        array_push($wordStack,$node->val);
        while(!empty($nodeStack)){
        	$curNode= array_pop($nodeStack);
            array_push($resultWord,$curNode->val);//节点进栈
            $arrNext= $curNode->arrNext;
            //遍历节点的next数组，找出所有的子节点
            for($i=count($arrNext)-1;$i>=0;$i--){
            	$curChildNode= $arrNext[$i];
            	//判断节点不在结果集且不在栈内，则进栈，避免重复
            	if(!in_array($curChildNode->val,$resultWord) && !in_array($curChildNode->val, $wordStack)){
            		array_push($nodeStack,$curChildNode);
                    array_push($wordStack,$curChildNode->val);//标记该节点已经进栈
            	}
            }
        }
        return$resultWord;
    }

     //广度优先搜索  //队列先入先出
    /**
     * 广度优先算法：采用队列（先进先出FIFO）的思想，遍历节点时，被遍历的节点出队列，再遍历其子节点。关键要点和深度优先算法类似
     * */
     public function searchByWide(Node $node){
         $resultWord= array();//存放遍历结果
         $nodeStack= array();//存放遍历过程中的中间结果
         $wordStack= array();//**存放已经遍历过子节点的节点，防止重复遍历**
         array_push($nodeStack,$node);
         while(!empty($nodeStack)){
                  $curNode= array_shift($nodeStack);//第一个节点出栈，实现队列  ----数组第一个元素
                  array_push($resultWord,$curNode->val);//节点进栈
                  array_push($wordStack,$curNode->val);//即将开始遍历其子节点
                   $arrNext= $curNode->arrNext;
                   //遍历节点的next数组，找出所有的子节点
                   for($i=0;$i<count($arrNext);$i++){
                        $curChildNode= $arrNext[$i];
                         //判断节点不在结果集且不在栈内，则进栈，避免重复
                     if(!in_array($curChildNode->val,$resultWord) && !in_array($curChildNode->val, $wordStack)){
                  array_push($nodeStack,$curChildNode);
                  array_push($wordStack,$curChildNode->val);//标记该节点已经进栈
                                 }                                   
                        }                          
               }
               return$resultWord;
     }
}

$graph = new Graph();
$arrNode = array(
    'a'=> array('b', 'f'),
    'b'=> array('a', 'c', 'd'),
    'c'=> array('b', 'd', 'e'),
    'd'=> array('b', 'c'),
    'e'=> array('c'),
    'f'=> array('a', 'g', 'h'),
    'g'=> array('f', 'h'),
    'h'=> array('f', 'g')
);
$graphTree = $graph->generate($arrNode);
$res = $graph->searchByDeep($graphTree);
echo '<br />深度优先搜索的结果是：';
print_r($res);
echo '<br />广度优先搜索的结果是：';
$res = $graph->searchByWide($graphTree);
print_r($res);
