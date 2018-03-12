<?php

namespace MohdNazrul\CTOSLaravel;

class RequestRecords
{
    private $PARTY_TYPE;
    private $BASIC_GROUP_CODE;
    private $ICLC_NO;
    private $NICBR_NO;
    private $NAME;
    private $MOBILE_NO;
    private $REF_NO;
    private $DISTRIBUTION_CODE;
    private $PURPOSE_CODE;
    private $PURPOSE_CONTENT;
    private $STATE_CODE;
    private $COUNTRY_CODE;
    private $INCLUDE_CONSENT;
    private $INCLUDE_CTOS;
    private $INCLUDE_TREX;
    private $INCLUDE_CCRIS;
    private $SUMMARY;
    private $DCHEQUE;
    private $FICO;
    private $INCLUDE_SME_FINANCIAL_HEALTH_INDICATOR;
    private $INCLUDE_FICO_CAPACITY_INDEX;
    private $INCLUDE_LATEST_SSM;
    private $ENTITY_KEY_CONFIRMATION;
    private $INCLUDE_CCRIS_SUPPLEMENTARY;

    public function __construct($party_type, $basic_group_code, $iclc_no = null,
                                $nicbr_no = null, $name = null, $mobile_no = null, $ref_no = null, $distribution_code = null,
                                $purpose_code = null, $purpose_content = null,
                                $state_code = null, $country_code = null, $include_consent = null,
                                $include_ctos = null, $include_trex = null, $include_ccris = null, $summary = null,
                                $include_ccris_supplementary = null,
                                $dcheque = null, $fico = null, $include_sme_financial_health_indicator = null,
                                $include_fico_capacity_index = null, $include_latest_ssm = null, $entity_key_confirmation = null)
    {
        $this->PARTY_TYPE = $party_type;
        $this->BASIC_GROUP_CODE = $basic_group_code;
        $this->ICLC_NO = $iclc_no;
        $this->NICBR_NO = $nicbr_no;
        $this->NAME = $name;
        $this->MOBILE_NO = $mobile_no;
        $this->REF_NO = $ref_no;
        $this->DISTRIBUTION_CODE = $distribution_code;
        $this->PURPOSE_CODE = $purpose_code;
        $this->PURPOSE_CONTENT = $purpose_content;
        $this->STATE_CODE = $state_code;
        $this->COUNTRY_CODE = $country_code;
        $this->INCLUDE_CONSENT = $include_consent;
        $this->INCLUDE_CTOS = $include_ctos;
        $this->INCLUDE_TREX = $include_trex;
        $this->INCLUDE_CCRIS = $include_ccris;
        $this->SUMMARY = $summary;
        $this->INCLUDE_CCRIS_SUPPLEMENTARY = $include_ccris_supplementary;
        $this->DCHEQUE = $dcheque;
        $this->FICO = $fico;
        $this->INCLUDE_SME_FINANCIAL_HEALTH_INDICATOR = $include_sme_financial_health_indicator;
        $this->INCLUDE_FICO_CAPACITY_INDEX = $include_fico_capacity_index;
        $this->INCLUDE_LATEST_SSM = $include_latest_ssm;
        $this->ENTITY_KEY_CONFIRMATION = $entity_key_confirmation;
    }

    public function setPartyType($party_type)
    {
        $this->PARTY_TYPE = $party_type;
    }

    public function setBasicGroupCode($basic_group_code)
    {
        $this->BASIC_GROUP_CODE = $basic_group_code;
    }

    public function setICLCNo($iclc_no)
    {
        $this->ICLC_NO = $iclc_no;
    }

    public function setNICBRNo($nicbr_no)
    {
        $this->NICBR_NO = $nicbr_no;
    }

    public function setName($name)
    {
        $this->NAME = $name;
    }

    public function setMobileNo($mobile_no)
    {
        $this->MOBILE_NO = $mobile_no;
    }

    public function setRefNo($ref_no)
    {
        $this->REF_NO = $ref_no;
    }

    public function setDistributionCode($distribution_code)
    {
        $this->DISTRIBUTION_CODE = $distribution_code;
    }

    public function setPurposeCode($purpose_code)
    {
        $this->PURPOSE_CODE = $purpose_code;
    }

    public function setStateCode($state_code)
    {
        $this->STATE_CODE = $state_code;
    }

    public function setCountryCode($country_code)
    {
        $this->COUNTRY_CODE = $country_code;
    }

    public function setIncludeConsent($include_consent)
    {
        $this->INCLUDE_CONSENT = $include_consent;
    }

    public function setIncludeCTOS($include_ctos)
    {
        $this->INCLUDE_CTOS = $include_ctos;
    }

    public function setIncludeTREX($include_trex)
    {
        $this->INCLUDE_TREX = $include_trex;
    }

    public function setSummary($summary)
    {
        $this->SUMMARY = $summary;
    }

    public function setIncludeCcrisSupplementary($include_ccris_supplementary)
    {
        $this->INCLUDE_CCRIS_SUPPLEMENTARY = $include_ccris_supplementary;
    }

    public function setSummary($summary)
    {
        $this->SUMMARY = $summary;
    }

    public function setDCeque($DCheque)
    {
        $this->DCHEQUE = $DCheque;
    }

    public function setFico($fico)
    {
        $this->FICO = $fico;
    }

    public function setIncludeSMEFinancialHealthIndicator($include_sme_financial_health_indicator)
    {
        $this->INCLUDE_SME_FINANCIAL_HEALTH_INDICATOR = $include_sme_financial_health_indicator;
    }

    public function setIncludeFicoCapacityIndex($include_fico_capacity_index)
    {
        $this->INCLUDE_FICO_CAPACITY_INDEX = $include_fico_capacity_index;
    }

    public function setIncludeLatestSSM($include_latest_ssm)
    {
        $this->INCLUDE_LATEST_SSM = $include_latest_ssm;
    }

    public function setEntityKeyConfirmation($entity_key_confirmation)
    {
        $this->ENTITY_KEY_CONFIRMATION = $entity_key_confirmation;
    }

    public function getPartyType()
    {
        return $this->PARTY_TYPE;
    }

    public function getBasicGroupCode()
    {
        return $this->BASIC_GROUP_CODE;
    }

    public function getICLCNo()
    {
        return $this->ICLC_NO;
    }

    public function getNICBRNo()
    {
        return $this->NICBR_NO;
    }

    public function getName()
    {
        return $this->NAME;
    }

    public function getMobileNo()
    {
        return this->MOBILE_NO;
    }

    public function getRefNo()
    {
        return $this->REF_NO;
    }

    public function getDistributionCode()
    {
        return $this->DISTRIBUTION_CODE;
    }

    public function getPurposeCode()
    {
        return $this->PURPOSE_CODE;
    }

    public function getStateCode()
    {
        return $this->STATE_CODE;
    }

    public function getCountryCode()
    {
        return $this->COUNTRY_CODE;
    }

    public function getIncludeConsent()
    {
        return $this->INCLUDE_CONSENT;
    }

    public function getIncludeCTOS()
    {
        return $this->INCLUDE_CTOS;
    }

    public function getIncludeTREX()
    {
        return $this->INCLUDE_TREX;
    }

    public function getSummary()
    {
        return $this->SUMMARY;
    }

    public function getIncludeCcrisSupplementary()
    {
        return $this->INCLUDE_CCRIS_SUPPLEMENTARY;
    }

    public function getDCeque()
    {
        return $this->DCHEQUE;
    }

    public function getFico()
    {
        return $this->FICO;
    }

    public function getIncludeSMEFinancialHealthIndicator()
    {
        return $this->INCLUDE_SME_FINANCIAL_HEALTH_INDICATOR;
    }

    public function getIncludeFicoCapacityIndex()
    {
        return $this->INCLUDE_FICO_CAPACITY_INDEX;
    }

    public function getIncludeLatestSSM()
    {
        return $this->INCLUDE_LATEST_SSM;
    }

    public function getEntityKeyConfirmation()
    {
        return $this->ENTITY_KEY_CONFIRMATION;
    }

    public function getRequestXMLFormat($method)
    {
        $xml = '<records>';
        $xml .= '<type code=\'' . $this->BASIC_GROUP_CODE . '\'>' . $this->PARTY_TYPE . '</type>';
        if ($this->ICLC_NO != null) {
            $xml .= '<ic_lc>' . $this->ICLC_NO . '</ic_lc>';
        } else {
            $xml .= '<ic_lc />';
        }
        $xml .= '<nic_br>' . $this->NICBR_NO . '</nic_br>';
        $xml .= '<name>' . $this->NAME . '</name>';
        if ($this->MOBILE_NO != null) {
            $xml .= '<mphone_nos>'
            $xml .= '<mphone_no>' . $this->MOBILE_NO . '</mphone_no>';
        $xml .= '</mphone_nos>';
        } else {
            $xml .= '<mphone_nos/>'
        }


        if ($this->REF_NO != null) {
            $xml .= '<ref_no>' . $this->REF_NO . '</ref_no>';
        } else {
            $xml .= '<ref_no />';
        }

        if ($this->DISTRIBUTION_CODE != null) {
            $xml .= '<dist_code>' . $this->DISTRIBUTION_CODE . '</dist_code>';
        }

        if ($method != 'requestLite') {
            $xml .= '<purpose code=\'' . $this->PURPOSE_CODE . '\'>' . $this->PURPOSE_CONTENT . '</purpose>';
            if ($this->COUNTRY_CODE != null) {
                $xml .= '<country code=\'' . $this->COUNTRY_CODE . '\'></country>';
            }

            if($this->INCLUDE_CONSENT != null) {
                $xml .= '<include_consent>' . $this->INCLUDE_CONSENT . '</include_consent>';
            }
        }
        $xml .= '<include_ctos>' . $this->INCLUDE_CTOS . '</include_ctos>';
        $xml .= '<include_trex>' . $this->INCLUDE_TREX . '</include_trex>';
        if ($method != 'requestLite') {
            if($this->SUMMARY  != null){
                $xml .= '<include_ccris sum=\'' . $this->SUMMARY . '\'>' . $this->INCLUDE_CCRIS . '</include_ccris>';
            } else {
                $xml .= '<include_ccris>' . $this->INCLUDE_CCRIS . '</include_ccris>';
            }
        }

        $xml .= '<include_dcheq>' . $this->DCHEQUE . '</include_dcheq>';
        if($this->INCLUDE_CCRIS_SUPPLEMENTARY != null){
            $xml .= '<include_ccris_supp>' . $this->INCLUDE_CCRIS_SUPPLEMENTARY . '</include_ccris_supp>';
        }

        if ($method != 'requestLite') {
            $xml .= '<include_fico>' . $this->FICO . '</include_fico>';
        }

        if($this->INCLUDE_SME_FINANCIAL_HEALTH_INDICATOR != null){
            $xml .= '<include_sfi>' . $this->INCLUDE_SME_FINANCIAL_HEALTH_INDICATOR . '</include_sfi>';
        }

        $xml .= '<include_cci>' . $this->INCLUDE_FICO_CAPACITY_INDEX . '</include_cci>';
        $xml .= '<include_ssm>' . $this->INCLUDE_LATEST_SSM . '</include_ssm>';
        if ($method != 'requestLite') {
            if($this->ENTITY_KEY_CONFIRMATION != null){
                $xml .= '<confirm_entity>' . $this->ENTITY_KEY_CONFIRMATION . '</confirm_entity>';
            } else {
                $xml .= '<confirm_entity />';
            }

        }
        $xml .= '</records>';
        return $xml;
    }


}