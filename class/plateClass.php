<?php
require("baseClass.php");
class PlateClass extends BaseClass{

  // Declare properties
  public $stringSection='';
  public $numberSection='';

  // Constructor
  function __construct(){
    parent::__construct();
    print "Constructor PlateClass";
  }


  // Setters
  public function setString($string){
    //TODO get string and asign to each class' variable
  }

  public function setCurrentDate(){

  }

  public function setCurrentTime(){

  }

  public function canBeOnTheRoad(){
    //TODO

    return TRUE;
  }


}
