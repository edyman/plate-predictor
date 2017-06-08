<?php
namespace App\Libraries;

class Plate{
    const   PLATE_LENGHT=7;
    // Declare properties

    protected   $plate;
    protected   $peak_day;
    protected   $peak_hour;
    protected   $plate_last_digit;
    protected   $message=array();


    private $peakDays=[];
    private $peakHours=[];

    // Constructor
    public function __construct(){
        //TODO
    }

    public function setPlate($plate){

        if (!is_string($plate)){
            array_push($this->message,'Plate must be string');
            throw new \InvalidArgumentException;
        }
        $this->plate=trim($plate);
        $this->plate_last_digit=substr($this->plate,-1);

    }

    public function getPlate(){
        return $this->plate;
    }

    public function getLastDigit(){
        return substr($this->plate,-1);
    }

    public function validatePlate(){
        $pattern = '/[A-Za-z]{3}[0-9]{4}+$/';
        $result = preg_match( $pattern, $this->plate );
        if(!$result){
            array_push($this->message,'Plate must match pattern Ex: ABC1234');
            throw new \InvalidArgumentException;
        }

        return $result;
    }

    public function setDate($date){
        $this->peak_day=date('l', strtotime($date));
    }

    public function setPeakHour($time){
        $this->peak_hour=strtotime($time);
    }

    public function getVariables(){
        return [
            'plate'=>$this->plate,
            'plate_last_digit'=>$this->plate_last_digit,
            'peak_day'=>$this->peak_day,
            'peak_hour'=>$this->peak_hour
        ];
    }

    public function getMessage(){
        return $this->message;
    }

    public function canBeOnTheRoad($peakDays,$peakHours){
        $this->validatePlate();
        // Verify Peak Day exist in array
        if (array_key_exists($this->peak_day, $peakDays)) {
            // Verify if last plate digit exist in current array
            if (in_array($this->plate_last_digit,$peakDays[$this->peak_day])){
                if (  (($this->peak_hour>=$peakHours[0]['begin']) &&  ($this->peak_hour<=$peakHours[0]['end'])) or  ( ($this->peak_hour>=$peakHours[1]['begin']) &&  ($this->peak_hour<=$peakHours[1]['end']))){
                    array_push($this->message,'You are in restricted hour, stop and park your car.');
                    return false;
                }
                array_push($this->message,'Run like the wind, but take care today you have restricted circulation.');
            }
            else{
                array_push($this->message,'Today you are safe!!');
            }
        }else
            array_push($this->message,$this->peak_day.': take your bike and enjoy the nature !!!');
        return true;
    }
}