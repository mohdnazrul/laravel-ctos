<?php

require "vendor/autoload.php";


$soapUrl = "http://uat.cmctos.com.my:8080/ctos/Proxy?wsdl";
$soapUser = "capbay_xml";
$soapPassword = "123456";

try {

    //1. Records CTOS Request
    $records = new \MohdNazrul\CTOSLaravel\Records('I', '11', null, '871204236060', 'thomas',
        null, '2017071915652', null, '200', 'Credit evaluation/account opening on subject/directors/shareholder with consent /due diligence on AMLA compliance',
        null, null, null, '1', null, '1', null, null, '1', '0', null, '0', '0', null);

    // 2. Set Batch CTOS Request
    $batch = new \MohdNazrul\CTOSLaravel\Batch('0009', '0', 'http://ws.cmctos.com.my/ctosnet/request', 'CAPBAYUAT',
        'CAPBAYUAT', 'capbay_xml', '1');

    $xml = $batch->XMLBatchWithRecords('request', $records->getRequestXMLFormat('request'));

    // 3. Create CTOS Provider
    $ctos = new \MohdNazrul\CTOSLaravel\CTOSService($soapUrl, $soapUser, $soapPassword);

    // 4. Set XML with format HTML escape and put inside envelope
    $dataXML = $ctos->setXMLPostString(htmlentities($xml), true);

    // 5. Set variable header for CTOS;
    $content_type = 'text/xml;charset=\"utf-8\"';
    $accept = 'text/xml';
    $cache_control = 'no-cache';
    $pragma = 'no-cache';
    $soap_action = '';
    $header = $ctos->setHeader($content_type, $accept, $cache_control, $pragma, $soap_action, true);

    // 6. Connect CTOS
    $ctos->connect();

    // Get Response;
    $res = $ctos->getResponse();
    echo '<pre>', htmlentities($res), '</pre>';

    //$res = base64_decode($response2);
//$xml = simplexml_load_string($res);

} catch (Exception $e) {
    print_r($e->getMessage());
}


?>