<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
	
class LRUCache{
   public function __construct($limitElements){
      $this->limit = $limitElements;
	  $this->cacheArr = array();
   }
   
   public function printElements(){
	  echo implode($this->cacheArr,',').'<br><br>';
   }
   
   public function get($key){
	  if( !empty($this->cacheArr[$key]) ){
		  return $this->cacheArr[$key];
	  }else{
		  return '-1';
	  }
   }
   
   public function add($key,$num){
      echo 'Added Number-'.$num.'<br>';
	  if(count($this->cacheArr) == $this->limit){
		 array_shift($this->cacheArr);
		 $this->cacheArr[$key] = $num;
		 $this->printElements();
	  }else{
	     $this->cacheArr[$key] = $num;
	  }
   }
}

$obj = new LRUCache(5);
$obj->add( md5('RRRRR'.'1') , 1);
$obj->add( md5('RRRRR'.'10') ,10);
$obj->add( md5('RRRRR'.'100') ,100);
$obj->add( md5('RRRRR'.'17') ,17);
$obj->add( md5('RRRRR'.'31') ,31);

echo '<br>';
echo 'Fetch element from LRU='.$obj->get(md5('RRRRR'.'17') );
echo '<br/>';

$obj->add( md5('RRRRR'.'34') ,34);
$obj->add( md5('RRRRR'.'145') ,145);
$obj->add( md5('RRRRR'.'123') ,123);
$obj->add( md5('RRRRR'.'170') ,170);
$obj->add( md5('RRRRR'.'310') ,310);

echo '<br>';
echo 'Fetch element from LRU='.$obj->get( md5('RRRRR'.'170') );
echo '<br>';

echo '<br>';
echo 'Fetch element from LRU='.$obj->get( md5('RRRRR'.'1700') );
echo '<br>';
?>