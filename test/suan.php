<?php
$arr=array(1,2,3,4);


//二分查找法
function binSearch($arr,$search){
    $height=count($arr)-1;
    $low=0;
    while($low<=$height){
        $mid=floor(($low+$height)/2);//获取中间数
        if($arr[$mid]==$search){
            return $mid;//返回
        }elseif($arr[$mid]<$search){//当中间值小于所查值时，则$mid左边的值都小于$search，此时要将$mid赋值给$low
            $low=$mid+1;
        }elseif($arr[$mid]>$search){//中间值大于所查值,则$mid右边的所有值都大于$search,此时要将$mid赋值给$height
            $height=$mid-1;
        }
    }
    return "查找失败";
}
//获取长度
$hight=count($arr)-1;
$low=0;
//获取中间值
while ($low <=$hight){
    $middile=ceil(($low+$hight)/2);
    if($arr[$middile]==$search){
        return $middile;
    }elseif($arr[$middile]<$search){
        //当中间值小于所查值时，则$mid左边的值都小于$search，此时要将$mid赋值给$low
        $low=$mid+1;
    }elseif ($arr[$middile]>$search){
        $height=$middle-1;
    }


}







////二分查找递归实现
//function binSearch2($arr,$low,$height,$k){
//    if($low<=$height){
//        $mid=floor(($low+$height)/2);//获取中间数
//        if($arr[$mid]==$k){
//            return $mid;
//        }elseif($arr[$mid]<$k){
//            return binSearch2($arr,$mid+1,$height,$k);
//        }elseif($arr[$mid]>$k){
//            return binSearch2($arr,$low,$mid-1,$k);
//        }
//    }
//    return -1;
//}
//
////顺序查找
//function seqSearch($arr,$k){
//    foreach($arr as $key=>$val){
//        if($val==$k){
//            return $key;
//        }
//    }
//    return -1;
//}
//
//echo binSearch($arr,4).'<br/>';
//echo binSearch2($arr,0,4,4).'<br/>';
//echo seqSearch($arr,4).'<br/>';
//echo in_array(4,$arr).'<br/>';
//echo array_search(4,$arr);

//　　function order($arr){
//    　　$count = count($arr);
//    　　$temp = 0;
//    　　 //外层控制排序轮次
//    　　for($i=0; $i<$count; $i++){
//        　　//内层控制每轮比较次数
//        　　for($j=0; $j< $count-$i; $j++){
//            　　if($arr[$j] > $arr[$j+1]){
//                　　$temp        = $arr[$j];
//                　　$arr[$j]     = $arr[$j+1];
//                　　$arr[$j+1]   = $temp;
//                　　}
//            　　 }
//        　　}
//    　　    return $arr;
//}
//



//$arr=array(1,43,54,62,21,66,32,78,36,76,39);
// function bubbleSort ($arr)
// {
//  $len = count($arr);
// //该层循环控制 需要冒泡的轮数
// for ($i=1; $i<$len; $i++) {
//  //该层循环用来控制每轮 冒出一个数 需要比较的次数
// for ($k=0; $k<$len-$i; $k++) {
//          9 if($arr[$k] > $arr[$k+1]) {
//              10 $tmp = $arr[$k+1]; // 声明一个临时变量
// $arr[$k+1] = $arr[$k];
// $arr[$k] = $tmp;
// }
// }
// }
// return $arr;
// }


 $arr= array(6,3,8,2,9,1);
$res =  order($arr);
var_dump($res);





header("content-type:text/html;charset=utf-8");
$arr = array(3,5,8,4,9,6,1,7,2);
echo implode(" ",$arr)."<br/>";
//---------------------------------------
//              常用排序算法
//---------------------------------------
//冒泡排序
//function BubbleSort($arr){
//    $length = count($arr);
//    if($length<=1){
//        return $arr;
//    }
//    for($i=0;$i<$length;$i++){
//        for($j=$length-1;$j>$i;$j--){
//            if($arr[$j]<$arr[$j-1]){
//                $tmp = $arr[$j];
//                $arr[$j] = $arr[$j-1];
//                $arr[$j-1] = $tmp;
//            }
//        }
//    }
//    return $arr;
//}
echo '冒泡排序：';
echo implode(' ',BubbleSort($arr))."<br/>";

//快速排序
function QSort($arr){
    $length = count($arr);
    if($length <=1){
        return $arr;
    }
    $pivot = $arr[0];//枢轴
    $left_arr = array();
    $right_arr = array();
    for($i=1;$i<$length;$i++){//注意$i从1开始0是枢轴
        if($arr[$i]<=$pivot){
            $left_arr[] = $arr[$i];
        }else{
            $right_arr[] = $arr[$i];
        }
    }
    $left_arr = QSort($left_arr);//递归排序左半部分
    $right_arr = QSort($right_arr);//递归排序右半部份
    return array_merge($left_arr,array($pivot),$right_arr);//合并左半部分、枢轴、右半部分
}
echo "快速排序：";
echo implode(' ',QSort($arr))."<br/>";

//选择排序(不稳定)
function SelectSort($arr){
    $length = count($arr);
    if($length<=1){
        return $arr;
    }
    for($i=0;$i<$length;$i++){
        $min = $i;
        for($j=$i+1;$j<$length;$j++){
            if($arr[$j]<$arr[$min]){
                $min = $j;
            }
        }
        if($i != $min){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $tmp;
        }
    }
    return $arr;
}
echo "选择排序：";
echo implode(' ',SelectSort($arr))."<br/>";

//插入排序
function InsertSort($arr){
    $length = count($arr);
    if($length <=1){
        return $arr;
    }
    for($i=1;$i<$length;$i++){
        $x = $arr[$i];
        $j = $i-1;
        while($x<$arr[$j] && $j>=0){
            $arr[$j+1] = $arr[$j];
            $j--;
        }
        $arr[$j+1] = $x;
    }
    return $arr;
}
echo '插入排序：';
echo implode(' ',InsertSort($arr))."<br/>";
//---------------------------------------
//              常用查找算法
//---------------------------------------
//二分查找
function binary_search($arr,$low,$high,$key){
    while($low<=$high){
        $mid = intval(($low+$high)/2);
        if($key == $arr[$mid]){
            return $mid+1;
        }elseif($key<$arr[$mid]){
            $high = $mid-1;
        }elseif($key>$arr[$mid]){
            $low = $mid+1;
        }
    }
    return -1;
}
$key = 6;
echo "二分查找{$key}的位置：";
echo binary_search(QSort($arr),0,8,$key);

//顺序查找
function SqSearch($arr,$key){
    $length = count($arr);
    for($i=0;$i<$length;$i++){
        if($key == $arr[$i]){
            return $i+1;
        }
    }
    return -1;
}
$key = 8;
echo "<br/>顺序常规查找{$key}的位置：";
echo SqSearch($arr,$key);
//---------------------------------------
//              常用数据结构
//---------------------------------------
//线性表的删除(数组实现)
function delete_array_element($arr,$pos){
    $length = count($arr);
    if($pos<1 || $pos>$length){
        return "删除位置出错!";
    }
    for($i=$pos-1;$i<$length-1;$i++){
        $arr[$i] = $arr[$i+1];
    }
    array_pop($arr);
    return $arr;
}
$pos = 3;
echo "<br/>除第{$pos}位置上的元素后：";
echo implode(' ',delete_array_element($arr,$pos))."<br/>";

/**
 * Class Node
 * PHP模拟链表的基本操作
 */
class Node{
    public $data = '';
    public  $next = null;
}
//初始化
function init($linkList){
    $linkList->data = 0; //用来记录链表长度
    $linkList->next = null;
}
//头插法创建链表
function createHead(&$linkList,$length){
    for($i=0;$i<$length;$i++){
        $newNode = new Node();
        $newNode->data = $i;
        $newNode->next = $linkList->next;//因为PHP中对象本身就是引用所以不用再可用“&”
        $linkList->next = $newNode;
        $linkList->data++;
    }
}
//尾插法创建链表
function createTail(&$linkList,$length){
    $r = $linkList;
    for($i=0;$i<$length;$i++){
        $newNode = new Node();
        $newNode->data = $i;
        $newNode->next = $r->next;
        $r->next = $newNode;
        $r = $newNode;
        $linkList->data++;
    }
}
//在指定位置插入指定元素
function insert($linkList,$pos,$elem){
    if($pos<1 && $pos>$linkList->data+1){
        echo "插入位置错误！";
    }
    $p = $linkList;
    for($i=1;$i<$pos;$i++){
        $p = $p->next;
    }
    $newNode = new Node();
    $newNode->data = $elem;
    $newNode->next = $p->next;
    $p->next = $newNode;
}
//删除指定位置的元素
function delete($linkList,$pos){
    if($pos<1 && $pos>$linkList->data+1){
        echo "位置不存在！";
    }
    $p = $linkList;
    for($i=1;$i<$pos;$i++){
        $p = $p->next;
    }
    $q = $p->next;
    $p->next = $q->next;
    unset($q);
    $linkList->data--;
}
//输出链表数据
function show($linkList){
    $p = $linkList->next;
    while($p!=null){
        echo $p->data." ";
        $p = $p->next;
    }
    echo '<br/>';
}

$linkList = new Node();
init($linkList);//初始化
createTail($linkList,10);//尾插法创建链表
show($linkList);//打印出链表
insert($linkList,3,'a');//插入
show($linkList);
delete($linkList,3);//删除
show($linkList);

/**
 * Class Stack
 * 用PHP模拟顺序栈的基本操作
 */
class Stack{
    //用默认值直接初始化栈了，也可用构造方法初始化栈
    private $top = -1;
    private $maxSize = 5;
    private $stack = array();

    //入栈
    public function push($elem){
        if($this->top >= $this->maxSize-1){
            echo "栈已满！<br/>";
            return;
        }
        $this->top++;
        $this->stack[$this->top] = $elem;
    }
    //出栈
    public function pop(){
        if($this->top == -1){
            echo "栈是空的！";
            return ;
        }
        $elem = $this->stack[$this->top];
        unset($this->stack[$this->top]);
        $this->top--;
        return $elem;
    }
    //打印栈
    public function show(){
        for($i=$this->top;$i>=0;$i--){
            echo $this->stack[$i]." ";
        }
        echo "<br/>";
    }
}

$stack = new Stack();
$stack->push(3);
$stack->push(5);
$stack->push(8);
$stack->push(7);
$stack->push(9);
$stack->push(2);
$stack->show();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->show();

/**
 * Class Deque
 * 使用PHP实现双向队列
 */
class Deque{
    private $queue = array();
    public function addFirst($item){//头入队
        array_unshift($this->queue,$item);
    }
    public function addLast($item){//尾入队
        array_push($this->queue,$item);
    }
    public function removeFirst(){//头出队
        array_shift($this->queue);
    }
    public function removeLast(){//尾出队
        array_pop($this->queue);
    }
    public  function show(){//打印
        foreach($this->queue as $item){
            echo $item." ";
        }
        echo "<br/>";
    }
}
$deque = new Deque();
$deque->addFirst(2);
$deque->addLast(3);
$deque->addLast(4);
$deque->addFirst(5);
$deque->show();

//PHP解决约瑟夫环问题
//方法一
function joseph_ring($n,$m){
    $arr = range(1,$n);
    $i = 0;
    while(count($arr)>1){
        $i=$i+1;
        $head = array_shift($arr);
        if($i%$m != 0){ //如果不是则重新压入数组
            array_push($arr,$head);
        }
    }
    return $arr[0];
}
//方法二
function joseph_ring2($n,$m){
    $r = 0;
    for($i=2;$i<=$n;$i++){
        $r = ($r+$m)%$i;
    }
    return $r + 1;
}
echo "<br/>".joseph_ring(60,5)."<br/>";
echo "<br/>".joseph_ring2(60,5)."<br/>";