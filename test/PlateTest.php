<?php

use \App\Libraries\Plate;

class PlateTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->plate=new Plate();

        $this->peek_days=[
            'Monday'    =>[1,2],
            'Tuesday'   =>[3,4],
            'Wednesday' =>[5,6],
            'Thursday'  =>[7,8],
            'Friday'    =>[9,0],
        ];

        $this->peak_hours=[
            [ 'begin'=>strtotime('07:00'),'end'=>strtotime('09:30')],
            [ 'begin'=>strtotime('16:30'),'end'=>strtotime('19:00')]
        ];
    }

    public function inputPlates(){
        return [
            ['POI1111','2017/06/5','5:30',true],
            ['POI1111','2017/06/5','8:30',false],
            ['POI1111','2017/06/5','11:30',true],
            ['POI1111','2017/06/5','17:00',false],

        ];
    }

    /**
     * @dataProvider inputPlates
     */
    public function testMultiplePlates($plate,$date,$hour,$expectedValue){
        $this->plate->setPlate($plate);
        $this->plate->setDate($date);
        $this->plate->setPeakHour($hour);
        $this->assertEquals($expectedValue,$this->plate->canBeOnTheRoad($this->peek_days,$this->peak_hours));

    }

    public function testThatWeCanGetPlate(){
        $this->plate->setPlate('PBJ1234');
        $this->assertEquals($this->plate->getPlate(),'PBJ1234');
    }

    public function testAppropriatePlateLenght(){
        $this->plate->setPlate('PBJ1235');
        $this->assertEquals(7, strlen($this->plate->getPlate()));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testStringPlateValueFailure(){
        $this->plate->setPlate(42);
        $this->assertInternalType('string',$this->plate->getPlate());
    }

    public function testStringPlateIsTrimmed(){
        $this->plate->setPlate('  PBJ1234  ');
        $this->assertEquals($this->plate->getPlate(),'PBJ1234');
    }

    /**
     * @expectedException  \InvalidArgumentException
     */
    public function testValidPlatePatternFailure(){
        $this->plate->setPlate('PBJJ123');
        $this->assertFalse($this->plate->validatePlate());
    }

}
