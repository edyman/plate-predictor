<?php
  //Include definition
  require("../class/plateClass.php");


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

  $time=strtotime('6:30');

  //if()

  // print current array
  //var_dump($peakDays);
  //var_dump($peakHours);

  //var_dump( $peakHours[0]['begin']);



  $plate='PBJ012';
  $lastPlateNumber=7;

  $date = '2017/06/01';

  $day = date('l', strtotime($date));


  // Validate Plate array
  if (array_key_exists($day, $peakDays)) {
    var_dump( $peakDays[$day]);
    if (in_array($lastPlateNumber,$peakDays[$day])){
      if (  (($time>=$peakHours[0]['begin']) &&  ($time<=$peakHours[0]['end'])) ||  ( ($time>=$peakHours[1]['begin']) &&  ($time<=$peakHours[1]['end'])))
      {
        echo "Cuidado !!";
      }else{
        echo "Hoy tiene pico y placa, puede circular horario permitido";
      }
    }
    else{
      echo "Puede circular";
    }

}
else {
  echo "No existe";
}

  $obj1= PlateClass::create()->setPlate($plate)->setDate($date);
  $obj1->setPlate($plate);

  //var_dump($obj1->getPeakDays());
  //var_dump($obj1->getPeakHOurs());

  //echo $obj1->canBeOnTheRoad();

  //var_dump($obj1->getPlate());
  var_dump($obj1);


 ?>
