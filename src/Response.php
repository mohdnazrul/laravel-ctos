<?php

/**
 * @copyright MIT
 * @version 1.0.1
 * @created_by Nazrul Mustaffa
 * @email nazrulmustaffa@gmail.com
 */

namespace MohdNazrul\CTOSLaravel;

class Response
{
    public $VERSION;
    private $JSONXML;
    // Enquiry Attributes
    private $ENQUIRY;
    private $ENQUIRY_REPORT_ID;
    private $ENQUIRY_REPORT_TYPE;
    private $ENQUIRY_REPORT_TITLE;
    private $ENQUIRY_HEADER;
    private $ENQUIRY_SUMMARY;

    // Enquiry Header
    private $HEADER;
    private $HEADER_USER;
    private $HEADER_COMPANY;
    private $HEADER_ACCOUNT;
    private $HEADER_TEL;
    private $HEADER_FAX;
    private $HEADER_ENQ_DATE;
    private $HEADER_ENQ_TIME;
    private $HEADER_ENQ_STATUS;
    // Summary
    private $ENQ_SUM;
    private $ENQ_SUM_PARTY_TYPE;
    private $ENQ_SUM_BASIC_GROUP_CODE;
    private $ENQ_SUM_RECORD_SEQUENCE;

    private $SUM;
    private $SUM_NAME;
    private $SUM_IC_LCNO;
    private $SUM_NIC_BRNO;
    private $SUM_STATUS;
    private $SUM_DUE_DILIGENCE_INDEX;
    private $SUM_MOBILE_NO;
    private $SUM_REF_NO;
    private $SUM_DIST_CODE;
    private $SUM_PURPOSE;
    private $SUM_INCL_CTOS;
    private $SUM_INCL_TREX;
    private $SUM_INCL_CCRIS;
    private $SUM_INCL_DCHEQ;
    private $SUM_INCL_FICO;
    private $SUM_INCL_SSM;
    private $SUM_CONFIRM_ENTITY;
    private $SUM_ENQ_STATUS;
    private $SUM_ENQ_CODE;

    // Enquiry
    // CTOS
    private $ENQ_SECTION;
    private $ENQ_SEQ;

    private $SEC_SUMMARY;
    private $SEC_SUM_CTOS;
    private $SEC_SUM_CTOS_BANKRUPTCY;
    private $SEC_SUM_CTOS_BANKRUPTCY_STATUS;

    private $SEC_SUM_CTOS_LEGAL;
    private $SEC_SUM_CTOS_LEGAL_TOTAL;
    private $SEC_SUM_CTOS_LEGAL_VALUE;
    private $SEC_SUM_CTOS_LEGAL_PERS_CAP_TOTAL;
    private $SEC_SUM_CTOS_LEGAL_PERS_CAP_VALUE;
    private $SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_TOTAL;
    private $SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_VALUE;
    //TREX
    private $SEC_SUM_TREX;
    private $SEC_SUM_TREX_REF_NEGT;
    private $SEC_SUM_TREX_REF_POST;
    //CCRIS
    private $SEC_SUM_CCRIS;
    private $SEC_SUM_CCRIS_APP_TOTAL;
    private $SEC_SUM_CCRIS_APP_APPROVED;
    private $SEC_SUM_CCRIS_APP_PENDING;

    private $SEC_SUM_CCRIS_FACILITY_TOTAL;
    private $SEC_SUM_CCRIS_FACILITY_APPROVED;
    private $SEC_SUM_CCRIS_FACILITY_VALUE:

    private $SEC_SUM_CCRIS_SPECIAL_ATTENTION_ACC;

    private $SEC_SUM_DCHEQS;
    private $SEC_SUM_DCHEQS_ENTITY;

    public function __construct($xml)
    {
        $this->convertToJSON($xml);
    }

    private function convertToJSON($xml)
    {
        $xmlObject = simplexml_load_string($xml);
        $this->JSONXML = json_decode(json_encode($xmlObject), true);
    }

    public function getXMLtoJSON()
    {
        return $this->JSONXML;
    }

    public function generateValueJSON()
    {
        $json = $this->JSONXML;
        // 1.  Version
        $this->VERSION = $json['@attributes']['version'];
        // 2. Attribute Enquiry Report
        $this->ENQUIRY = $json['enq_report']['@attributes'];
        $this->ENQUIRY_REPORT_ID = $json['enq_report']['@attributes']['id'];
        $this->ENQUIRY_REPORT_TYPE = $json['enq_report']['@attributes']['report_type'];
        $this->ENQUIRY_REPORT_TITLE = $json['enq_report']['@attributes']['title'];
        // 3. Header
        $this->HEADER = $json['enq_report']['header'];
        $this->HEADER_USER = $json['enq_report']['header']['user'];
        $this->HEADER_COMPANY = $json['enq_report']['header']['company'];
        $this->HEADER_ACCOUNT = $json['enq_report']['header']['account'];
        $this->HEADER_TEL = $json['enq_report']['header']['tel'];
        $this->HEADER_FAX = $json['enq_report']['header']['fax'];
        $this->HEADER_ENQ_DATE = $json['enq_report']['header']['enq_date'];
        $this->HEADER_ENQ_TIME = $json['enq_report']['header']['enq_time'];
        $this->HEADER_ENQ_STATUS = $json['enq_report']['header']['enq_status'];
        // 4. Summary
        $this->ENQ_SUM = $json['enq_report']['summary']['enq_sum']['@attributes'];
        $this->ENQ_SUM_PARTY_TYPE = $json['enq_report']['summary']['enq_sum']['@attributes']['ptype'];
        $this->ENQ_SUM_BASIC_GROUP_CODE = $json['enq_report']['summary']['enq_sum']['@attributes']['pcode'];
        $this->ENQ_SUM_RECORD_SEQUENCE = $json['enq_report']['summary']['enq_sum']['@attributes']['seq'];

        $this->SUM_NAME = $json['enq_report']['summary']['enq_sum']['name'];
        $this->SUM_IC_LCNO = $json['enq_report']['summary']['enq_sum']['ic_lcno'];
        $this->SUM_NIC_BRNO = $json['enq_report']['summary']['enq_sum']['nic_brno'];
        $this->SUM_STATUS = $json['enq_report']['summary']['enq_sum']['stat'];
        $this->SUM_DUE_DILIGENCE_INDEX = $json['enq_report']['summary']['enq_sum']['dd_index'];
        $this->SUM_MOBILE_NO = $json['enq_report']['summary']['enq_sum']['mphone_nos']['mphone_no'];
        $this->SUM_REF_NO = $json['enq_report']['summary']['enq_sum']['ref_no'];
        $this->SUM_DIST_CODE = $json['enq_report']['summary']['enq_sum']['dist_code'];
        $this->SUM_PURPOSE = $json['enq_report']['summary']['enq_sum']['purpose'];
        $this->SUM_INCL_CTOS = $json['enq_report']['summary']['enq_sum']['include_ctos'];
        $this->SUM_INCL_TREX = $json['enq_report']['summary']['enq_sum']['include_trex'];
        $this->SUM_INCL_CCRIS = $json['enq_report']['summary']['enq_sum']['include_ccris'];
        $this->SUM_INCL_DCHEQ = $json['enq_report']['summary']['enq_sum']['include_dcheq'];
        $this->SUM_INCL_FICO = $json['enq_report']['summary']['enq_sum']['include_fico'];
        $this->SUM_INCL_SSM = $json['enq_report']['summary']['enq_sum']['include_ssm'];
        $this->SUM_CONFIRM_ENTITY = $json['enq_report']['summary']['enq_sum']['confirm_entity'];
        $this->SUM_ENQ_STATUS = $json['enq_report']['summary']['enq_sum']['enq_status'];
        $this->SUM_ENQ_CODE = $json['enq_report']['summary']['enq_sum']['enq_code'];

        // 5. Enquiry
        $this->ENQ_SECTION = $json['enq_report']['enquiry'];
        $this->ENQ_SEQ = $json['enq_report']['enquiry']['@attributes']['seq'];
        $this->SEC_SUMMARY = $json['enq_report']['enquiry']['section_summary'];

        $this->SEC_SUM_CTOS = $json['enq_report']['enquiry']['section_summary']['ctos'];
        $this->SEC_SUM_CTOS_BANKRUPTCY = $json['enq_report']['enquiry']['section_summary']['ctos']['bankruptcy']['@attributes'];
        $this->SEC_SUM_CTOS_BANKRUPTCY_STATUS = $json['enq_report']['enquiry']['section_summary']['ctos']['bankruptcy']['@attributes']['status'];
        $this->SEC_SUM_CTOS_LEGAL = $json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes'];
        $this->SEC_SUM_CTOS_LEGAL_TOTAL = $json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes']['total'];
        $this->SEC_SUM_CTOS_LEGAL_VALUE = $json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes']['value'];
        $this->SEC_SUM_CTOS_LEGAL_PERS_CAP_TOTAL = $json['enq_report']['enquiry']['section_summary']['ctos']['legal_personal_capacity']['@attributes']['total'];
        $this->SEC_SUM_CTOS_LEGAL_PERS_CAP_VALUE = $json['enq_report']['enquiry']['section_summary']['ctos']['legal_personal_capacity']['@attributes']['value'];
        $this->SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_TOTAL = $json['enq_report']['enquiry']['section_summary']['ctos']['legal_non_personal_capacity']['@attributes']['total'];
        $this->SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_VALUE = $json['enq_report']['enquiry']['section_summary']['ctos']['legal_non_personal_capacity']['@attributes']['value'];

        $this->SEC_SUM_TREX = $json['enq_report']['enquiry']['section_summary']['tr'];
        $this->SEC_SUM_TREX_REF_NEGT = $json['enq_report']['enquiry']['section_summary']['tr']['trex_ref']['@attributes']['negative'];
        $this->SEC_SUM_TREX_REF_POST = $json['enq_report']['enquiry']['section_summary']['tr']['trex_ref']['@attributes']['positive'];

    }

    public function getVersion()
    {
        return $this->JSONXML;
    }

    public function getEnqReportAttributes()
    {
        $data = [
            'id' => empty($this->ENQUIRY_REPORT_ID) ? '' : $this->ENQUIRY_REPORT_ID,
            'report_type' => empty($this->ENQUIRY_REPORT_TYPE) ? '' : $this->ENQUIRY_REPORT_TYPE,
            'title' => empty($this->ENQUIRY_REPORT_TITLE) ? '' : $this->ENQUIRY_REPORT_TITLE
        ];
        return $data;
    }

    public function getHeader()
    {
        $data = [
            'user' => empty($this->HEADER_USER) ? '' : $this->HEADER_USER,
            'company' => empty($this->HEADER_COMPANY) ? '' : $this->HEADER_COMPANY,
            'account' => empty($this->HEADER_ACCOUNT) ? '' : $this->HEADER_ACCOUNT,
            'tel' => empty($this->HEADER_TEL) ? '' : $this->HEADER_TEL,
            'fax' => empty($this->HEADER_FAX) ? '' : $this->HEADER_FAX,
            'enq_date' => empty($this->HEADER_ENQ_DATE) ? '' : $this->HEADER_ENQ_DATE,
            'enq_time' => empty($this->HEADER_ENQ_TIME) ? '' : $this->HEADER_ENQ_TIME,
            'enq_status' => empty($this->HEADER_ENQ_STATUS) ? '' : $this->HEADER_ENQ_STATUS
        ];
        return $data;
    }

    public function getSummary()
    {
        $data = [
            'party_type' => empty($this->ENQ_SUM_PARTY_TYPE) ? '' : $this->ENQ_SUM_PARTY_TYPE,
            'basic_group_code' => empty($this->ENQ_SUM_BASIC_GROUP_CODE) ? '' : $this->ENQ_SUM_BASIC_GROUP_CODE,
            'record_sequence' => empty($this->ENQ_SUM_RECORD_SEQUENCE) ? '' : $this->ENQ_SUM_RECORD_SEQUENCE,
            'name' => empty($this->SUM_NAME) ? '' : $this->SUM_NAME,
            'mobile_number' => empty($this->SUM_MOBILE_NO) ? '' : $this->SUM_MOBILE_NO,
            'reference_number' => empty($this->SUM_REF_NO) ? '' : $this->SUM_REF_NO,
            'distribution_code' => empty($this->SUM_DIST_CODE) ? '' : $this->SUM_DIST_CODE,
            'purpose' => empty($this->SUM_PURPOSE) ? '' : $this->SUM_PURPOSE,
            'include_ctos' => empty($this->SUM_INCL_CTOS) ? '' : $this->SUM_INCL_CTOS,
            'include_trex' => empty($this->SUM_INCL_TREX) ? '' : $this->SUM_INCL_TREX,
            'include_ccris' => empty($this->SUM_INCL_CCRIS) ? '' : $this->SUM_INCL_CCRIS,
            'include_dcheq' => empty($this->SUM_INCL_DCHEQ) ? '' : $this->SUM_INCL_DCHEQ,
            'include_fico' => empty($this->SUM_INCL_FICO) ? '' : $this->SUM_INCL_FICO,
            'include_ssm' => empty($this->SUM_INCL_SSM) ? '' : $this->SUM_INCL_SSM,
            'confirm_entity' => empty($this->SUM_CONFIRM_ENTITY) ? '' : $this->SUM_CONFIRM_ENTITY,
            'enq_status' => empty($this->SUM_ENQ_STATUS) ? '' : $this->SUM_ENQ_STATUS,
            'enq_code' => empty($this->SUM_ENQ_CODE) ? '' : $this->SUM_ENQ_CODE
        ];
        return $data;
    }


}