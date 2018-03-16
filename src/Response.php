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
    //CCRIS APPLICATION
    private $SEC_SUM_CCRIS_APP;
    private $SEC_SUM_CCRIS_APP_TOTAL;
    private $SEC_SUM_CCRIS_APP_APPROVED;
    private $SEC_SUM_CCRIS_APP_PENDING;
    //CCRIS FACILITY;
    private $SEC_SUM_CCRIS_FACILITY;
    private $SEC_SUM_CCRIS_FACILITY_TOTAL;
    private $SEC_SUM_CCRIS_FACILITY_ARREARS;
    private $SEC_SUM_CCRIS_FACILITY_VALUE;
    //CCRIS_SPECIAL_ATTENTION;
    private $SEC_SUM_CCRIS_SPECIAL_ATTENTION;
    private $SEC_SUM_CCRIS_SPECIAL_ATTENTION_ACC;
    //DCHEQS
    private $SEC_SUM_DCHEQS;
    private $SEC_SUM_DCHEQS_ENTITY;

    //SECTION A
    private $SECTION_A;
    private $SECTION_A_ATTRIBUTES;
    private $SECTION_A_DATA;
    private $SECTION_A_TITLE;

    private $SECTION_A_RECORD;
    private $SECTION_A_RECORD_ATTRIBUTES;
    private $SECTION_A_RECORD_NAME;
    private $SECTION_A_RECORD_IC_LCNO;
    private $SECTION_A_RECORD_NIC_BRNO;
    private $SECTION_A_RECORD_ADDR;
    private $SECTION_A_RECORD_ADDR1;
    private $SECTION_A_RECORD_CCRIS_ADDRESSES;
    private $SECTION_A_SOURCE;
    private $SECTION_A_NATIONALITY;
    private $SECTION_A_BIRTH_DATE;

    //SECTION B
    private $SECTION_B;
    private $SECTION_B_ATTRIBUTES;
    private $SECTION_B_HISTORY;

    //SECTION C
    private $SECTION_C;
    private $SECTION_C_ATTRIBUTES;

    private $SECTION_C_DATA;

    //SECTION D
    private $SECTION_D;
    private $SECTION_D_ATTRIBUTES;
    private $SECTION_D_DATA;

    //SECTION D2
    private $SECTION_D2;
    private $SECTION_D2_ATTRIBUTES;
    private $SECTION_D2_DATA;

    //SECTION CCRIS
    private $SECTION_CCRIS;
    private $SECTION_CCRIS_ATTRIBUTES;
    private $SECTION_CCRIS_ATTR_TITLE;
    private $SECTION_CCRIS_ATTR_DATA;
    private $SECTION_CCRIS_SUM; // application, liabilities, legal, specail_attetion, special_name

    private $SECTION_CCRIS_DERIVATIVES; //application, facilities -> [secure, unsecure]
    private $SECTION_CCRIS_APPLICATIONS; // application -> array[application]
    private $SECTION_CCRIS_ACCOUNTS; // application -> array[account]
    private $SECTION_SPECIAL_ATT_ACCS;

    private $SECTION_DCHEQS;
    private $SECTION_DCHEQS_ATTRIBUTES;
    private $SECTION_DCHEQS_DATA;


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
        $this->ENQUIRY_REPORT_ID = empty($json['enq_report']['@attributes']['id']) ? '' : $json['enq_report']['@attributes']['id'];
        $this->ENQUIRY_REPORT_TYPE = empty($json['enq_report']['@attributes']['report_type']) ? '' : $json['enq_report']['@attributes']['report_type'];
        $this->ENQUIRY_REPORT_TITLE = empty($json['enq_report']['@attributes']['title']) ? '' : $json['enq_report']['@attributes']['title'];
        // 3. Header
        $this->HEADER = $json['enq_report']['header'];
        $this->HEADER_USER = empty($json['enq_report']['header']['user']) ? '' : $json['enq_report']['header']['user'];
        $this->HEADER_COMPANY = empty($json['enq_report']['header']['company']) ? '' : $json['enq_report']['header']['company'];
        $this->HEADER_ACCOUNT = empty($json['enq_report']['header']['account']) ? '' : $json['enq_report']['header']['account'];
        $this->HEADER_TEL = empty($json['enq_report']['header']['tel']) ? '' : $json['enq_report']['header']['tel'];
        $this->HEADER_FAX = empty($json['enq_report']['header']['fax']) ? '' : $json['enq_report']['header']['fax'];
        $this->HEADER_ENQ_DATE = empty($json['enq_report']['header']['enq_date']) ? '' : $json['enq_report']['header']['enq_date'];
        $this->HEADER_ENQ_TIME = empty($json['enq_report']['header']['enq_time']) ? '' : $json['enq_report']['header']['enq_time'];
        $this->HEADER_ENQ_STATUS = empty($json['enq_report']['header']['enq_status']) ? '' : $json['enq_report']['header']['enq_status'];
        // 4. Summary
        $this->ENQ_SUM = $json['enq_report']['summary']['enq_sum']['@attributes'];
        $this->ENQ_SUM_PARTY_TYPE = empty($json['enq_report']['summary']['enq_sum']['@attributes']['ptype']) ? '' : $json['enq_report']['summary']['enq_sum']['@attributes']['ptype'];
        $this->ENQ_SUM_BASIC_GROUP_CODE = empty($json['enq_report']['summary']['enq_sum']['@attributes']['pcode']) ? '' : $json['enq_report']['summary']['enq_sum']['@attributes']['pcode'];
        $this->ENQ_SUM_RECORD_SEQUENCE = empty($json['enq_report']['summary']['enq_sum']['@attributes']['seq']) ? '' : $json['enq_report']['summary']['enq_sum']['@attributes']['seq'];

        $this->SUM_NAME = empty($json['enq_report']['summary']['enq_sum']['name']) ? '' : $json['enq_report']['summary']['enq_sum']['name'];
        $this->SUM_IC_LCNO = empty($json['enq_report']['summary']['enq_sum']['ic_lcno']) ? '' : $json['enq_report']['summary']['enq_sum']['ic_lcno'];
        $this->SUM_NIC_BRNO = empty($json['enq_report']['summary']['enq_sum']['nic_brno']) ? '' : $json['enq_report']['summary']['enq_sum']['nic_brno'];
        $this->SUM_STATUS = empty($json['enq_report']['summary']['enq_sum']['stat']) ? '' : $json['enq_report']['summary']['enq_sum']['stat'];
        $this->SUM_DUE_DILIGENCE_INDEX = empty($json['enq_report']['summary']['enq_sum']['dd_index']) ? '' : $json['enq_report']['summary']['enq_sum']['dd_index'];
        $this->SUM_MOBILE_NO = empty($json['enq_report']['summary']['enq_sum']['mphone_nos']['mphone_no']) ? '' : $json['enq_report']['summary']['enq_sum']['mphone_nos']['mphone_no'];
        $this->SUM_REF_NO = empty($json['enq_report']['summary']['enq_sum']['ref_no']) ? '' : $json['enq_report']['summary']['enq_sum']['ref_no'];
        $this->SUM_DIST_CODE = empty($json['enq_report']['summary']['enq_sum']['dist_code']) ? '' : $json['enq_report']['summary']['enq_sum']['dist_code'];
        $this->SUM_PURPOSE = empty($json['enq_report']['summary']['enq_sum']['purpose']) ? '' : $json['enq_report']['summary']['enq_sum']['purpose'];
        $this->SUM_INCL_CTOS = empty($json['enq_report']['summary']['enq_sum']['include_ctos']) ? '' : $json['enq_report']['summary']['enq_sum']['include_ctos'];
        $this->SUM_INCL_TREX = empty($json['enq_report']['summary']['enq_sum']['include_trex']) ? '' : $json['enq_report']['summary']['enq_sum']['include_trex'];
        $this->SUM_INCL_CCRIS = empty($json['enq_report']['summary']['enq_sum']['include_ccris']) ? '' : $json['enq_report']['summary']['enq_sum']['include_ccris'];
        $this->SUM_INCL_DCHEQ = empty($json['enq_report']['summary']['enq_sum']['include_dcheq']) ? '' : $json['enq_report']['summary']['enq_sum']['include_dcheq'];
        $this->SUM_INCL_FICO = empty($json['enq_report']['summary']['enq_sum']['include_fico']) ? '' : $json['enq_report']['summary']['enq_sum']['include_fico'];
        $this->SUM_INCL_SSM = empty($json['enq_report']['summary']['enq_sum']['include_ssm']) ? '' : $json['enq_report']['summary']['enq_sum']['include_ssm'];
        $this->SUM_CONFIRM_ENTITY = empty($json['enq_report']['summary']['enq_sum']['confirm_entity']) ? '' : $json['enq_report']['summary']['enq_sum']['confirm_entity'];
        $this->SUM_ENQ_STATUS = empty($json['enq_report']['summary']['enq_sum']['enq_status']) ? '' : $json['enq_report']['summary']['enq_sum']['enq_status'];
        $this->SUM_ENQ_CODE = empty($json['enq_report']['summary']['enq_sum']['enq_code']) ? '' : $json['enq_report']['summary']['enq_sum']['enq_code'];

        // 5. Enquiry
        $this->ENQ_SECTION = $json['enq_report']['enquiry'];
        $this->ENQ_SEQ = empty($json['enq_report']['enquiry']['@attributes']['seq']) ? '' : $json['enq_report']['enquiry']['@attributes']['seq'];
        $this->SEC_SUMMARY = empty($json['enq_report']['enquiry']['section_summary']) ? '' : $json['enq_report']['enquiry']['section_summary'];

        // 5.1 CTOS
        $this->SEC_SUM_CTOS = $json['enq_report']['enquiry']['section_summary']['ctos'];
        // 5.1.1 CTOS Bankruptcy
        $this->SEC_SUM_CTOS_BANKRUPTCY = $json['enq_report']['enquiry']['section_summary']['ctos']['bankruptcy']['@attributes'];
        $this->SEC_SUM_CTOS_BANKRUPTCY_STATUS = empty($json['enq_report']['enquiry']['section_summary']['ctos']['bankruptcy']['@attributes']['status']) ? '' : $json['enq_report']['enquiry']['section_summary']['ctos']['bankruptcy']['@attributes']['status'];
        // 5.1.2 CTOS Legal
        $this->SEC_SUM_CTOS_LEGAL = $json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes'];
        $this->SEC_SUM_CTOS_LEGAL_TOTAL = empty($json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes']['total']) ? '' : $json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes']['total'];
        $this->SEC_SUM_CTOS_LEGAL_VALUE = empty($json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes']['value']) ? '' : $json['enq_report']['enquiry']['section_summary']['ctos']['legal']['@attributes']['value'];
        // 5.1.3 CTOS Legal Personal Capacity
        $this->SEC_SUM_CTOS_LEGAL_PERS_CAP_TOTAL = empty($json['enq_report']['enquiry']['section_summary']['ctos']['legal_personal_capacity']['@attributes']['total']) ? '' : $json['enq_report']['enquiry']['section_summary']['ctos']['legal_personal_capacity']['@attributes']['total'];
        $this->SEC_SUM_CTOS_LEGAL_PERS_CAP_VALUE = empty($json['enq_report']['enquiry']['section_summary']['ctos']['legal_personal_capacity']['@attributes']['value']) ? '' : $json['enq_report']['enquiry']['section_summary']['ctos']['legal_personal_capacity']['@attributes']['value'];
        // 5.1.4 CTOS Legal Non Personal Capacity
        $this->SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_TOTAL = empty($json['enq_report']['enquiry']['section_summary']['ctos']['legal_non_personal_capacity']['@attributes']['total']) ? '' : $json['enq_report']['enquiry']['section_summary']['ctos']['legal_non_personal_capacity']['@attributes']['total'];
        $this->SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_VALUE = empty($json['enq_report']['enquiry']['section_summary']['ctos']['legal_non_personal_capacity']['@attributes']['value']) ? '' : $json['enq_report']['enquiry']['section_summary']['ctos']['legal_non_personal_capacity']['@attributes']['value'];

        $this->SEC_SUM_TREX = $json['enq_report']['enquiry']['section_summary']['tr'];
        $this->SEC_SUM_TREX_REF_NEGT = empty($json['enq_report']['enquiry']['section_summary']['tr']['trex_ref']['@attributes']['negative']) ? '' : $json['enq_report']['enquiry']['section_summary']['tr']['trex_ref']['@attributes']['negative'];
        $this->SEC_SUM_TREX_REF_POST = empty($json['enq_report']['enquiry']['section_summary']['tr']['trex_ref']['@attributes']['positive']) ? '' : $json['enq_report']['enquiry']['section_summary']['tr']['trex_ref']['@attributes']['positive'];

        $this->SEC_SUM_CCRIS = $json['enq_report']['enquiry']['section_summary']['ccris'];
        $this->SEC_SUM_CCRIS_APP = $json['enq_report']['enquiry']['section_summary']['ccris']['application']['@attributes'];
        $this->SEC_SUM_CCRIS_APP_TOTAL = empty($json['enq_report']['enquiry']['section_summary']['ccris']['application']['@attributes']['total']) ? '' : $json['enq_report']['enquiry']['section_summary']['ccris']['application']['@attributes']['total'];
        $this->SEC_SUM_CCRIS_APP_APPROVED = empty($json['enq_report']['enquiry']['section_summary']['ccris']['application']['@attributes']['approved']) ? '' : $json['enq_report']['enquiry']['section_summary']['ccris']['application']['@attributes']['approved'];
        $this->SEC_SUM_CCRIS_APP_PENDING = empty($json['enq_report']['enquiry']['section_summary']['ccris']['application']['@attributes']['pending']) ? '' : $json['enq_report']['enquiry']['section_summary']['ccris']['application']['@attributes']['pending'];

        $this->SEC_SUM_CCRIS_FACILITY = $json['enq_report']['enquiry']['section_summary']['ccris']['facility']['@attributes'];
        $this->SEC_SUM_CCRIS_FACILITY_TOTAL = empty($json['enq_report']['enquiry']['section_summary']['ccris']['facility']['@attributes']['total']) ? '' : $json['enq_report']['enquiry']['section_summary']['ccris']['facility']['@attributes']['total'];
        $this->SEC_SUM_CCRIS_FACILITY_ARREARS = empty($json['enq_report']['enquiry']['section_summary']['ccris']['facility']['@attributes']['arrears']) ? '' : $json['enq_report']['enquiry']['section_summary']['ccris']['facility']['@attributes']['arrears'];
        $this->SEC_SUM_CCRIS_FACILITY_VALUE = empty($json['enq_report']['enquiry']['section_summary']['ccris']['facility']['@attributes']['value']) ? '' : $json['enq_report']['enquiry']['section_summary']['ccris']['facility']['@attributes']['value'];

        $this->SEC_SUM_CCRIS_SPECIAL_ATTENTION = $json['enq_report']['enquiry']['section_summary']['ccris']['special_attention']['@attributes'];
        $this->SEC_SUM_CCRIS_SPECIAL_ATTENTION_ACC = empty($json['enq_report']['enquiry']['section_summary']['ccris']['special_attention']['@attributes']['accounts']) ? '' : $json['enq_report']['enquiry']['section_summary']['ccris']['special_attention']['@attributes']['accounts'];

        $this->SEC_SUM_DCHEQS = $json['enq_report']['enquiry']['section_summary']['dcheqs']['@attributes'];
        $this->SEC_SUM_DCHEQS_ENTITY = empty($json['enq_report']['enquiry']['section_summary']['dcheqs']['@attributes']['entity']) ? '' : $json['enq_report']['enquiry']['section_summary']['dcheqs']['@attributes']['entity'];

        $this->SECTION_A = $json['enq_report']['enquiry']['section_a'];
        $this->SECTION_A_ATTRIBUTES = $json['enq_report']['enquiry']['section_a']['@attributes'];
        $this->SECTION_A_DATA = empty($json['enq_report']['enquiry']['section_a']['@attributes']['data']) ? '' : $json['enq_report']['enquiry']['section_a']['@attributes']['data'];
        $this->SECTION_A_TITLE = empty($json['enq_report']['enquiry']['section_a']['@attributes']['title']) ? '' : $json['enq_report']['enquiry']['section_a']['@attributes']['title'];
        $this->SECTION_A_RECORD_ATTRIBUTES = $json['enq_report']['enquiry']['section_a']['record']['@attributes'];
        $this->SECTION_A_RECORD_NAME = empty($json['enq_report']['enquiry']['section_a']['record']['name']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['name'];
        $this->SECTION_A_RECORD_IC_LCNO = empty($json['enq_report']['enquiry']['section_a']['record']['ic_lcno']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['ic_lcno'];
        $this->SECTION_A_RECORD_NIC_BRNO = empty($json['enq_report']['enquiry']['section_a']['record']['nic_brno']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['nic_brno'];
        $this->SECTION_A_RECORD_ADDR = empty($json['enq_report']['enquiry']['section_a']['record']['addr']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['addr'];
        $this->SECTION_A_RECORD_ADDR1 = empty($json['enq_report']['enquiry']['section_a']['record']['addr1']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['addr1'];
        $this->SECTION_A_RECORD_CCRIS_ADDRESSES = empty($json['enq_report']['enquiry']['section_a']['record']['ccris_addresses']['ccris_address']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['ccris_addresses']['ccris_address'];
        $this->SECTION_A_SOURCE = empty($json['enq_report']['enquiry']['section_a']['record']['source']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['source'];
        $this->SECTION_A_NATIONALITY = empty($json['enq_report']['enquiry']['section_a']['record']['nationality']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['nationality'];
        $this->SECTION_A_BIRTH_DATE = empty($json['enq_report']['enquiry']['section_a']['record']['birth_date']) ? '' : $json['enq_report']['enquiry']['section_a']['record']['birth_date'];

        $this->SECTION_B = $json['enq_report']['enquiry']['section_b'];
        $this->SECTION_B_ATTRIBUTES = $json['enq_report']['enquiry']['section_b']['@attributes'];
        if ($json['enq_report']['enquiry']['section_b']['@attributes']['data'] == "true") {
            $this->SECTION_B_HISTORY = $json['enq_report']['enquiry']['section_b']['period'];
        }

        $this->SECTION_C = $json['enq_report']['enquiry']['section_c'];
        $this->SECTION_C_ATTRIBUTES = $json['enq_report']['enquiry']['section_c']['@attributes'];
        if ($json['enq_report']['enquiry']['section_c']['@attributes']['data'] == "true") {
            $this->SECTION_C_DATA = $json['enq_report']['enquiry']['section_c'];
        }

        $this->SECTION_D = $json['enq_report']['enquiry']['section_d'];
        $this->SECTION_D_ATTRIBUTES = $json['enq_report']['enquiry']['section_d']['@attributes'];
        if ($json['enq_report']['enquiry']['section_c']['@attributes']['data'] == "true") {
            $this->SECTION_D_DATA = $json['enq_report']['enquiry']['section_d'];
        }

        $this->SECTION_D2 = $json['enq_report']['enquiry']['section_d'];
        $this->SECTION_D2_ATTRIBUTES = $json['enq_report']['enquiry']['section_d']['@attributes'];
        if ($json['enq_report']['enquiry']['section_c']['@attributes']['data'] == "true") {
            $this->SECTION_D2_DATA = $json['enq_report']['enquiry']['section_d'];
        }

        $this->SECTION_CCRIS = $json['enq_report']['enquiry']['section_ccris'];
        $this->SECTION_CCRIS_ATTRIBUTES = $json['enq_report']['enquiry']['section_ccris']['@attributes'];
        $this->SECTION_CCRIS_ATTR_TITLE = empty($json['enq_report']['enquiry']['section_ccris']['@attributes']['title']) ? '' : $json['enq_report']['enquiry']['section_ccris']['@attributes']['title'];
        $this->SECTION_CCRIS_ATTR_DATA = empty($json['enq_report']['enquiry']['section_ccris']['@attributes']['data']) ? '' : $json['enq_report']['enquiry']['section_ccris']['@attributes']['data'];
        if ($json['enq_report']['enquiry']['section_ccris']['@attributes']['data'] == 'true') {
            $this->SECTION_CCRIS_SUM = empty($json['enq_report']['enquiry']['section_ccris']['summary']) ? '' : $json['enq_report']['enquiry']['section_ccris']['summary'];
            $this->SECTION_CCRIS_DERIVATIVES = empty($json['enq_report']['enquiry']['section_ccris']['derivatives']) ? '' : $json['enq_report']['enquiry']['section_ccris']['derivatives'];
            $this->SECTION_CCRIS_APPLICATIONS = empty($json['enq_report']['enquiry']['section_ccris']['applications']) ? '' : $json['enq_report']['enquiry']['section_ccris']['applications'];
            $this->SECTION_CCRIS_ACCOUNTS = empty($json['enq_report']['enquiry']['section_ccris']['accounts']) ? '' : $json['enq_report']['enquiry']['section_ccris']['accounts'];
            $this->SECTION_SPECIAL_ATT_ACCS = empty($json['enq_report']['enquiry']['section_ccris']['special_attention_accs']) ? '' : $json['enq_report']['enquiry']['section_ccris']['special_attention_accs'];
        }

        $this->SECTION_DCHEQS = $json['enq_report']['enquiry']['section_dcheqs'];
        $this->SECTION_DCHEQS_ATTRIBUTES = $json['enq_report']['enquiry']['section_dcheqs']['@attributes'];
        if ($json['enq_report']['enquiry']['section_dcheqs']['@attributes']['data'] == 'true') {
            $this->SECTION_DCHEQS_DATA = $json['enq_report']['enquiry']['section_dcheqs'];
        }


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

    public function getEnquiry()
    {
        $data = [
            'ctos' => $this->SEC_SUM_CTOS,
            'tr' => $this->SEC_SUM_TREX,
            'ccris' => $this->SEC_SUM_CCRIS,
            'dcheqs' => $this->SEC_SUM_DCHEQS
        ];

        return $data;
    }

    public function getEnquirySectionSummaryCTOS()
    {
        $data = [
            'bankruptcy' => ['status' => $this->SEC_SUM_CTOS_BANKRUPTCY_STATUS],
            'legal' => [
                'total' => $this->SEC_SUM_CTOS_LEGAL_TOTAL,
                'value' => $this->SEC_SUM_CTOS_LEGAL_VALUE
            ],
            'legal_personal_capacity' => [
                'total' => $this->SEC_SUM_CTOS_LEGAL_PERS_CAP_TOTAL,
                'value' => $this->SEC_SUM_CTOS_LEGAL_PERS_CAP_VALUE
            ],
            'legal_non_personal_capacity' => [
                'total' => $this->SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_TOTAL,
                'value' => $this->SEC_SUM_CTOS_LEGAL_NON_PERS_CAP_VALUE
            ]
        ];

        return $data;
    }

    public function getEnquirySectionSummaryTR()
    {
        $data = [
            'negative' => $this->SEC_SUM_TREX_REF_NEGT,
            'positive' => $this->SEC_SUM_TREX_REF_POST
        ];

        return $data;
    }

    public function getEnquirySectionSummaryCCRIS()
    {
        $data = [
            'application' => [
                'total' => $this->SEC_SUM_CCRIS_APP_TOTAL,
                'approved' => $this->SEC_SUM_CCRIS_APP_APPROVED,
                'pending' => $this->SEC_SUM_CCRIS_APP_PENDING
            ],
            'facility' => [
                'total' => $this->SEC_SUM_CCRIS_FACILITY_TOTAL,
                'arrears' => $this->SEC_SUM_CCRIS_FACILITY_ARREARS,
                'value' => $this->SEC_SUM_CCRIS_FACILITY_VALUE
            ],
            'special_attention' => [
                'accounts' => $this->SEC_SUM_CCRIS_SPECIAL_ATTENTION_ACC
            ]
        ];
        return $data;
    }

    public function getEnquirySectionSummaryDCHEQS()
    {
        $data = [
            'entity' => $this->SEC_SUM_DCHEQS_ENTITY
        ];

        return $data;
    }

    public function getSection_A()
    {
        return $this->SECTION_A;
    }

    public function getSection_A_Attributes()
    {
        return $this->SECTION_A_ATTRIBUTES;
    }

    public function getSection_A_Record()
    {
        $data = [
            'attributes' => $this->SECTION_A_RECORD_ATTRIBUTES,
            'name' => $this->SECTION_A_RECORD_NAME,
            'ic_lcno' => $this->SECTION_A_RECORD_IC_LCNO,
            'nic_brno' => $this->SECTION_A_RECORD_NIC_BRNO,
            'addr' => $this->SECTION_A_RECORD_ADDR,
            'addr1' => $this->SECTION_A_RECORD_ADDR1,
            'ccris_addresses' => $this->SECTION_A_RECORD_CCRIS_ADDRESSES,
            'source' => $this->SECTION_A_SOURCE,
            'nationality' => $this->SECTION_A_NATIONALITY,
            'birth_date' => $this->SECTION_A_BIRTH_DATE
        ];

        return $data;

    }

    public function getSection_B(){
        return $this->SECTION_B;
    }

    public function getSection_B_Attributes(){
        return $this->SECTION_B_ATTRIBUTES;
    }

    public function getSection_B_History(){
        return $this->SECTION_B_HISTORY;
    }

    public function getSection_C(){
        return $this->SECTION_C;
    }

    public function getSection_C_Attributes(){
        return $this->SECTION_C_ATTRIBUTES;
    }

    public function getSection_C_Data(){
        return $this->SECTION_C_DATA;
    }

    public function getSection_D(){
        return $this->SECTION_D;
    }

    public function getSection_D_Attributes(){
        return $this->SECTION_D_ATTRIBUTES;
    }

    public function getSection_D_Data(){
        return $this->SECTION_D_DATA;
    }

    public function getSection_D2(){
        return $this->SECTION_D2;
    }

    public function getSection_D2_Attributes(){
        return $this->SECTION_D2_ATTRIBUTES;
    }

    public function getSection_D2_Data(){
        return $this->SECTION_D2_DATA;
    }

    public function getSectionCCRIS(){
        return $this->SECTION_CCRIS;
    }

    public function getSectionCCRIS_Attributes(){
        return $this->SECTION_CCRIS_ATTRIBUTES;
    }

    public function getSectionCCRIS_Summary(){
        return $this->SECTION_CCRIS_SUM;
    }

    public function getSectionCCRIS_Derivatives(){
        return $this->SECTION_CCRIS_DERIVATIVES;
    }

    public function getSectionCCRIS_Applications(){
        return $this->SECTION_CCRIS_APPLICATIONS;
    }

    public function getSectionCCRIS_Accounts(){
        return $this->SECTION_CCRIS_ACCOUNTS;
    }

    public function getSection_SpecialAttAccs(){
        return $this->SECTION_SPECIAL_ATT_ACCS;
    }

    public function getSection_DCHEQS(){
        return $this->SECTION_DCHEQS;
    }

    public function getSection_DCHEQS_Attributes(){
        return $this->SECTION_DCHEQS_ATTRIBUTES;
    }

    public function getSection_DCHEQS_Data(){
        return $this->SECTION_DCHEQS_DATA;
    }

}