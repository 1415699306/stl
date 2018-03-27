<?php

/**
*@martin
*冒泡排序、插入排序、快速排序、选择排序
*/
//冒泡排序
function bubble_sort($arr){
    $len = count($arr);
    for($i=0;$i<$len;$i++){
        for($j=0;$j<$len-$i-1;$j++){
            if($arr[$j] > $arr[$j+1]){
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tmp;
            }
        }
    }
    return $arr;
}

//选择排序
function select_sort($arr){
    $len = count($arr);
    for($i=0;$i<$len;$i++){
        $min = $i;
        for($j=$i+1;$j<$len;$j++){
            if($arr[$j] > $arr[$min]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$min];
                $arr[$min] = $temp;
            }
        }
    }
    return $arr;
}

//插入排序
function insert_sort($arr){
    $len=count($arr);
    for($i=1;$i<$len;$i++){
        $min = $i;
        $temp = $arr[$i];
        for($j=$i-1;$j>0;$j--){
            if($arr[$j]>$arr[$min]){
                $arr[$j+1] = $arr[$j];
                $min = $j;
            }
            $arr[$min] = $temp;
        }
    }
    return $arr;
}

//快速排序
function quick_sort($arr){
    $len=count($arr);
    if($len > 1){
        $r=[];
        $l=[];
        $key=$arr[0];
        for($i=1;$i<$len;$i++){
            if($arr[$i] > $key){
                $r[] = $arr[$i];
            }else{
                $l[] = $arr[$i];
            }
        }
        $l=quick_sort($l);
        $r=quick_sort($r);
        return array_merge($l,array($key),$r);
    }else{
        return $arr;
    }
}

//希尔排序
function shell_sort($arr){
    $count = count($arr);
    $inc = $count;
    do{
        $inc=ceil($inc/2);
        for($i=$inc;$i<$count;$i++){
            $min = $arr[$i];
            for($j=$i-$inc;$j>=0 && ($arr[$j+$inc] < $arr[$j]);$j -= $inc){
                $arr[$j+$inc] = $arr[$j];
            }
            $arr[$j+$inc] = $min;
        }
    }while($inc>1);

    /*$count = count($arr);
    $inc = $count;
    do {
        //计算增量
        $inc = ceil($inc / 2);
        for ($i = $inc; $i < $count; $i++) {
            $temp = $arr[$i];    //设置哨兵
            //需将$temp插入有序增量子表
            for ($j = $i - $inc; $j >= 0 && $arr[$j + $inc] < $arr[$j]; $j -= $inc) {
                $arr[$j + $inc] = $arr[$j]; //记录后移
            }
            //插入
            $arr[$j + $inc] = $temp;
        }
        //增量为1时停止循环
    } while ($inc > 1);*/
    return $arr;
}
