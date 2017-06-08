<?php
use App\Libraries\Plate;

require 'vendor/autoload.php';
 $peakDays=[
    'Monday'    =>[1,2],
    'Tuesday'   =>[3,4],
    'Wednesday' =>[5,6],
    'Thursday'  =>[7,8],
    'Friday'    =>[9,0],
  ];

  $peakHours=[
    [ 'begin'=>strtotime('07:00'),'end'=>strtotime('09:30')],
    [ 'begin'=>strtotime('16:30'),'end'=>strtotime('19:00')]
  ];

$obj1= new Plate();
try{
    $obj1->setPlate('PBJ1238');
    $obj1->setDate('2017/06/8');
    $obj1->setPeakHour('11:30');
    $obj1->canBeOnTheRoad($peakDays,$peakHours);
    var_dump($obj1->getMessage());
}catch (\InvalidArgumentException $e){
    print_r( 'Ocurrio un error verifique la información ingresada');

}