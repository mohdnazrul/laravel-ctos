<?php

namespace MohdNazrul\CTOSLaravel;

class Batch
{

    private $BATCH_NO;
    private $OUTPUT_FORMAT;
    private $XML_NAMESPACE;
    private $COMPANY_CODE;
    private $ACCOUNT_NO;
    private $USER_ID;
    private $TOTAL_RECORD;


    public function __construct($batch_no, $output_format, $xml_namespace, $company_code,
                                $account_code, $user_id, $total_record)
    {
        $this->BATCH_NO = $batch_no;
        $this->OUTPUT_FORMAT = $output_format;
        $this->XML_NAMESPACE = $xml_namespace;
        $this->COMPANY_CODE = $company_code;
        $this->ACCOUNT_NO = $account_code;
        $this->USER_ID = $user_id;
        $this->TOTAL_RECORD = $total_record;
    }

    public function setBatchNo($batch_no)
    {
        $this->BATCH_NO = $batch_no;
    }

    public function setOutputFormat($output_format)
    {
        $this->OUTPUT_FORMAT = $output_format;
    }

    public function setXMLNamespace($xml_namespace)
    {
        $this->XML_NAMESPACE = $xml_namespace;
    }

    public function setCompanyCode($company_code)
    {
        $this->COMPANY_CODE = $company_code;
    }

    public function setAccountNo($account_no)
    {
        $this->ACCOUNT_NO = $account_no;
    }

    public function setUserID($user_id)
    {
        $this->USER_ID = $user_id;
    }

    public function setTotalRecord($total_record)
    {
        $this->TOTAL_RECORD = $total_record;
    }

    public function getBatchNo()
    {
        return $this->BATCH_NO;
    }

    public function getOutputFormat()
    {
        return $this->OUTPUT_FORMAT;
    }

    public function getXMLNamespace()
    {
        return $this->XML_NAMESPACE;
    }

    public function getCompanyCode()
    {
        return $this->COMPANY_CODE;
    }

    public function getAccountCode()
    {
        return $this->ACCOUNT_CODE;
    }

    public function getUserID()
    {
        return $this->USER_ID;
    }

    public function getTotalRecord()
    {
        return $this->TOTAL_RECORD;
    }

    public function XMLBatchWithRecords($report_type, $records)
    {
        $str = '<batch output=\''.$this->OUTPUT_FORMAT.'\' no=\''.$this->BATCH_NO.'\' xmlns=\''.
            $this->XML_NAMESPACE.'\'><company_code>'.$this->COMPANY_CODE.'</company_code><account_no>'.
            $this->ACCOUNT_NO.'</account_no><user_id>'.$this->USER_ID.'</user_id>';
        if ($report_type == "request" || $report_type == "requestConfirm" || $report_type == "requestLite") {
            $str .= '<record_total>'.$this->TOTAL_RECORD.'</record_total>';
        }
        $str .= $records;
        $str .= '</batch>';

        return $str;

    }


}