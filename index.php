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


try{
    $obj1= new Plate();
    $obj2= new Plate();
    $obj1->setPlate('PBJ1232');
    $obj1->setDate('2017/06/05');
    $obj1->setPeakHour('5:30');
    $obj1->canBeOnTheRoad($peakDays,$peakHours);
    var_dump($obj1->getMessage());

    $obj2->setPlate('PBJ1238');
    $obj2->setDate('2017/06/08');
    $obj2->setPeakHour('9:30');
    $obj2->canBeOnTheRoad($peakDays,$peakHours);
    var_dump($obj2->getMessage());
}catch (\InvalidArgumentException $e){
    print_r( 'Ocurrio un error verifique la información ingresada');

}