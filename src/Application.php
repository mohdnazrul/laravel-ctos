<?php

/**
 * @copyright MIT
 * @version 1.0.1
 * @created_by Nazrul Mustaffa
 * @email nazrul.mustaffa@capitalbay.com
 */

namespace MohdNazrul\CTOSLaravel;

class Application
{
    private $ARRAY_ORG1;
    private $ARRAY_ORG2;
    private $DATE;
    private $STATUS;
    private $CAPACITY;
    private $LENDER_TYPE;
    private $AMOUNT;

    public function __construct()
    {
        $this->ARRAY_ORG1 = array();
        $this->ARRAY_ORG2 = array();
    }

    public function setOrg1($array_org1){
        $this->ARRAY_ORG1 = $array_org1;
    }

    public function setOrg2($array_org2){
        $this->ARRAY_ORG2 = $array_org2;
    }

    public function setDate($date){
        $this->DATE = $date;
    }

    public function setStatus($status){
        $this->STATUS = $status;
    }

    public function setCapacity($capacity){
        $this->CAPACITY = $capacity;
    }

    public function setLenderType($lender_type){
        $this->LENDER_TYPE = $lender_type;
    }

    public function setAmount($amount){
        $this->AMOUNT = $amount;
    }

    public function getApplication(){
        $data = [
            'org1' => $this->ARRAY_ORG1,
            'org2' => $this->ARRAY_ORG2,
            'date' => $this->DATE,
            'status' => $this->STATUS,
            'capacity' => $this->CAPACITY,
            'lender_type' => $this->LENDER_TYPE,
            'amount' => $this->AMOUNT
        ];
        return $data;
    }

}