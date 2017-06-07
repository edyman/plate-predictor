<?php
namespace App\Libraries;

final class Plate extends \Base{

  private $peakDays=[];
  private $peakHours=[];

  // Declare properties
  private $plate;
  private $date;

  // Constructor
  public function __construct(){
    parent::__construct();
    //print __CLASS__.' created <br>';
  }

/**
 *  SETTERS
 */
    public function setPlate($plate){
        if (!is_string($plate))
            throw new \InvalidArgumentException;
        $this->plate=$plate;
        return $this;
    }

    /**
     * Static constructor / factory
     */
    public static function create() {
        $instance = new self();
        return $instance;
    }
  public function setDate($date){
    $this->date=$date;
    return $this;
  }

  public function setString($string){
    //TODO get string and asign to each class' variable
  }

  public function setCurrentDate(){

  }

  public function setCurrentTime(){

  }



  public function getPeakDays(){
    return $this->peakDays;
  }

  public function getPeakHours(){
    return $this->peakHours;
  }

  public function getPlate(){
    return $this->plate;
  }

  public function canBeOnTheRoad(){
    //TODO

    return TRUE;
  }

  private function ensureValidPlate($plate){
    if (strlen($plate)<>7)
      throw new InvalidArgumentException('tripleInteger function only accepts integers. Input was: '.$plate);

  }


}
