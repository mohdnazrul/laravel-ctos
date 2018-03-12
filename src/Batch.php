<?php

/**
 * @copyright MIT
 * @version 1.0.1
 * @created_by Nazrul Mustaffa
 * @email nazrul.mustaffa@capitalbay.com
 */

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


    /**
     * Batch constructor.
     * @param $batch_no
     * @param $output_format
     * @param $xml_namespace
     * @param $company_code
     * @param $account_code
     * @param $user_id
     * @param $total_record
     */
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

    /**
     * Set Batch No
     * @param $batch_no
     */
    public function setBatchNo($batch_no)
    {
        $this->BATCH_NO = $batch_no;
    }

    /**
     * Set Output Format
     * @param $output_format
     */
    public function setOutputFormat($output_format)
    {
        $this->OUTPUT_FORMAT = $output_format;
    }

    /**
     * Set XML Namespace
     * @param $xml_namespace
     */
    public function setXMLNamespace($xml_namespace)
    {
        $this->XML_NAMESPACE = $xml_namespace;
    }

    /**
     * Set Company Code
     * @param $company_code
     */
    public function setCompanyCode($company_code)
    {
        $this->COMPANY_CODE = $company_code;
    }

    /**
     * Set Account No
     * @param $account_no
     */
    public function setAccountNo($account_no)
    {
        $this->ACCOUNT_NO = $account_no;
    }

    /**
     * Set User ID
     * @param $user_id
     */
    public function setUserID($user_id)
    {
        $this->USER_ID = $user_id;
    }

    /**
     * Set Total Record
     * @param $total_record
     */
    public function setTotalRecord($total_record)
    {
        $this->TOTAL_RECORD = $total_record;
    }

    /**
     * Get Batch No
     * @return mixed
     */
    public function getBatchNo()
    {
        return $this->BATCH_NO;
    }

    /**
     * Get Output Format
     * @return mixed
     */
    public function getOutputFormat()
    {
        return $this->OUTPUT_FORMAT;
    }

    /**
     * Get XML Name Space
     * @return mixed
     */
    public function getXMLNamespace()
    {
        return $this->XML_NAMESPACE;
    }

    /**
     * Get Company Code
     * @return mixed
     */
    public function getCompanyCode()
    {
        return $this->COMPANY_CODE;
    }

    /**
     * Get Account Code
     * @return mixed
     */
    public function getAccountCode()
    {
        return $this->ACCOUNT_CODE;
    }

    /**
     * Get User ID
     * @return mixed
     */
    public function getUserID()
    {
        return $this->USER_ID;
    }

    /**
     * Get Total Record
     * @return mixed
     */
    public function getTotalRecord()
    {
        return $this->TOTAL_RECORD;
    }

    /**
     * Get XML with Batch and records
     * @param $report_type
     * @param $records
     * @return string
     */
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