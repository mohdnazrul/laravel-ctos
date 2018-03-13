<?php

/**
 * @copyright MIT
 * @version 1.0.1
 * @created_by Nazrul Mustaffa
 * @email nazrulmustaffa@gmail.com
 */

namespace MohdNazrul\CTOSLaravel;

class Response {
    public $VERSION;
    private $JSONXML;
    private $ENQUIRY_REPORT_ID;
    private $ENQUIRY_REPORT_TYPE;
    private $ENQUIRY_REPORT_TITLE;
    private $ENQUIRY_HEADER;
    private $ENQUIRY_SUMMARY;

    public function __construct($xml)
    {
        $this->convertToJSON($xml);
    }

    private function convertToJSON($xml){
        $xmlObject =  simplexml_load_string($xml);
        $this->JSONXML = json_decode(json_encode($xmlObject), true);
    }

    public function getXMLtoJSON(){
        return $this->JSONXML;
    }

    public function generateValueJSON(){
        $json = $this->JSONXML;
        // 1.  Version
        $this->VERSION = $json['@attributes']['version'];
        // 2. Attribute Enquiry Report
        $this->ENQUIRY_REPORT_ID = $json['enq_report']['@attributes']['id'];
        $this->ENQUIRY_REPORT_TYPE= $json['enq_report']['@attributes']['report_type'];
        $this->ENQUIRY_REPORT_TITLE= $json['enq_report']['@attributes']['title'];
        // 3. Header
//        $this->ENQUIRY_HEADER = $json['enq_report']['header']['']
    }

    public function getVersion(){
        return $this->JSONXML;
    }

    public function getEnqReportAttributes(){
        $data = [
            'id' => $this->ENQUIRY_REPORT_ID,
            'report_type' => $this->ENQUIRY_REPORT_TYPE,
            'title' => $this->ENQUIRY_REPORT_TITLE
        ];
        return $data;
    }




}