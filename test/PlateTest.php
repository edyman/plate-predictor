<?php

use \App\Libraries\Plate;

class PlateTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->plate=new Plate();
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

    


    // STRING


}
