<?php

require "vendor/autoload.php";


$dataFromTheForm = $_POST['fieldName']; // request data from the form
$soapUrl = "http://uat.cmctos.com.my:8080/ctos/Proxy?wsdl"; // asmx URL of WSDL
$soapUser = "capbay_xml";  //  username
$soapPassword = "123456"; // password

$xml_post_string = '<?xml version="1.0" encoding="utf-8"?>' .
    '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ws="http://ws.proxy.xml.ctos.com.my/">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:request>
         <!--Optional:-->
         <input>
        &lt;batch output=&#039;0&#039; no=&#039;0009&#039; xmlns=&#039;http://ws.cmctos.com.my/ctosnet/request&#039;&gt;&lt;company_code&gt;CAPBAYUAT&lt;/company_code&gt;&lt;account_no&gt;CAPBAYUAT&lt;/account_no&gt;&lt;user_id&gt;capbay_xml&lt;/user_id&gt;&lt;record_total&gt;1&lt;/record_total&gt;&lt;records&gt;&lt;type code=&#039;11&#039;&gt;I&lt;/type&gt;&lt;ic_lc&gt;&lt;/ic_lc&gt;&lt;nic_br&gt;871204236060&lt;/nic_br&gt;&lt;name&gt;thomas&lt;/name&gt;&lt;mphone_nos/&gt;&lt;ref_no&gt;2017071915652&lt;/ref_no&gt;&lt;purpose code=&#039;200&#039;&gt;Credit evaluation/account opening on subject/directors/shareholder with consent /due diligence on AMLA compliance&lt;/purpose&gt;&lt;include_ccris&gt;1&lt;/include_ccris&gt;&lt;include_ctos&gt;1&lt;/include_ctos&gt;&lt;include_dcheq&gt;1&lt;/include_dcheq&gt;&lt;include_ssm&gt;0&lt;/include_ssm&gt;&lt;include_trex&gt;1&lt;/include_trex&gt;&lt;include_fico&gt;0&lt;/include_fico&gt;&lt;include_cci&gt;0&lt;/include_cci&gt;&lt;confirm_entity&gt;&lt;/confirm_entity&gt;&lt;/records&gt;&lt;/batch&gt;
         </input>
      </ws:request>
   </soapenv:Body>
</soapenv:Envelope>';

$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: ",
    "Content-length: " . strlen($xml_post_string),
    "username:" . $soapUser,
    "password:" . $soapPassword
); //SOAPAction: your op URL

$url = $soapUrl;

// PHP cURL  for https connection with auth
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// converting
$response = curl_exec($ch);
curl_close($ch);

// converting




$response1 = str_replace("<?xml version='1.0' encoding='UTF-8'?><S:Envelope xmlns:S=\"http://schemas.xmlsoap.org/soap/envelope/\"><S:Body><ns2:requestResponse xmlns:ns2=\"http://ws.proxy.xml.ctos.com.my/\"><return>", "", $response);
$response2 = str_replace("</return></ns2:requestResponse></S:Body></S:Envelope>", "", $response1);
$res = base64_decode($response2);
//$xml = simplexml_load_string($res);
//
//print_r($xml);

//$array = xmlToArray($xml);
//echo json_encode($arrayData);

//$xml = simplexml_load_string($res);
//$json = json_decode(json_encode($xml));
//header('Content-Type: application/json');
//echo json_encode($xml, JSON_PRETTY_PRINT);

//$array = json_decode(json_encode($xml), true);
//echo $array['@attributes']['version'];
//print_r($data->@attributes);
//$attribute = $data['@attributes'];
//echo $attribute['version'];

//echo $data['@attributes'];
//echo "<br/>print_r: <br/>";
//print_r($json);


//echo "<pre>". htmlentities($res) . "</pre>";
//header('Content-Type: application/json');
//$json_pretty = json_encode(json_decode($xml), JSON_PRETTY_PRINT);
//echo $json_pretty;


//$json = json_encode($xml, JSON_PRETTY_PRINT);
//$array = json_decode($json,TRUE);
//header('Content-Type: application/json');
//
//
//var_dump(
//    $xml,
//    json_encode($xml, JSON_PRETTY_PRINT)
//);

//// user $parser to get your data out of XML response and to display it.
//print_r($parser);

//print $response->return;

//$env = 'UAT';
//
//$ctos = new \MohdNazrul\CTOSLaravel\CTOS($env, $soapUser, $soapPassword, $soapUrl);
//$ctos->setHeader(null, null, null,
//   null, null,  null, true)

/**
 * $batch_no, $output_format, $xml_namespace, $company_code,
$account_code, $user_id, $total_record
 */

//$batch =  new \MohdNazrul\CTOSLaravel\Batch('0009', '0', 'http://ws.cmctos.com.my/ctosnet/request', 'CAPBAYUAT',
//    'CAPBAYUAT', 'capbay_xml', '1');
//
////$batchXML = $batch->XMLBatchWithRecords('AAAAA', 'request');
//echo '<pre>', htmlentities($batch->XMLBatchWithRecords()) , '</pre>';


/**
 * $party_type, $basic_group_code, $iclc_no = null,
$nicbr_no = null, $name = null, $mobile_no = null, $ref_no = null, $distribution_code = null,
$purpose_code = null, $purpose_content = null,  $state_code = null, $country_code = null, $include_consent = null,
$include_ctos = null, $include_trex = null, $include_ccris = null, $summary = null,
$include_ccris_supplementary = null,
$dcheque = null, $fico = null, $include_sme_financial_health_indicator = null,
$include_fico_capacity_index = null, $include_latest_ssm = null, $entity_key_confirmation = null
 */
$records = new \MohdNazrul\CTOSLaravel\RequestRecords('I', '11', null, '871204236060', 'thomas',
    null, '2017071915652', null, '200', 'Credit evaluation/account opening on subject/directors/shareholder with consent /due diligence on AMLA compliance',
    null, null, null, '1', '1', '1', null, null, '1', '0', null, '0', '0', null);
//
//$recordXML = $records->getRequestXMLFormat('request');
//
//echo htmlentities($recordXML);

?>