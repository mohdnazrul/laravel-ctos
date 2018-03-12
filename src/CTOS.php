<?php

namespace MohdNazrul\CTOSLaravel;

class CTOS
{

    private $ENV;
    private $USERNAME;
    private $PASSWORD;
    private $URL;
    private $XMLPOSTSTRING;
    private $HEADERS
    private $RESPONSE;

    public function __construct($env, $username, $password, $url)
    {
        $this->ENV = $env;
        $this->USERNAME = $username;
        $this->PASSWORD = $password;
        $this->URL = $url;
    }

    public function setXMLPostString($xml, $escapeFomatter = false)
    {
        if ($escapeFomatter) {
            $str = startEnvelopInput() . XMLEscape($xml) . endEnvelopInput();
            $this->XMLPOSTSTRING = $str;
        }

        $str = startEnvelopInput() . $xml . endEnvelopInput();
        $this->XMLPOSTSTRING = $xml;

    }

    public function setHeader($contentType = null, $accept = null, $cacheControl = null,
                              $pragma = null, $soapAction = null, $contentLength = null, $auth = false)
    {

        $headers = array(
            "Content-type: " . $this->setContentType($contentType),
            "Accept: " . $this->setAccept($accept),
            "Cache-Control: " . $this->setCacheControl($cacheControl),
            "Pragma: " . $this->setPragma($pragma),
            "SOAPAction: " . $this->setSOAPAction($soapAction),
            "Content-length: " . strlen($this->XMLPOSTSTRING),
        ); //SOAPAction: your op URL

        if ($auth) {
            $headers[] = "username:" . $this->USERNAME;
            $headers[] = "password:" . $this->PASSWORD;
        }

        $this->HEADERS = $headers;

    }

    public function connect()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->USERNAME . ":" . $this->PASSWORD); // username and password - declared at the top of the doc
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->XMLPOSTSTRING); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->HEADERS);

        $response = curl_exec($ch);
        curl_close($ch);

        if (curl_errno($ch)) {
            return new \Exception(curl_error($ch))
        }

        $this->RESPONSE = $response;

    }

    private function setContentType($contentType)
    {
        if (!empty($contentType)) {
            return $contentType;
        }
        return "text/xml;charset=\"utf-8\"";
    }

    private function setAccept($accept)
    {
        if (!empty($accept)) {
            return $accept;
        }

        return "text/xml";
    }

    private function setCacheControl($cacheControl)
    {
        if (!empty($cacheControl)) {
            return $cacheControl;
        }
        return "no-cache";
    }

    private function setPragma($pragma)
    {
        if (!empty($pragma)) {
            return $pragma;
        }
        return "no-cache";
    }

    private function setSOAPAction($soapAction)
    {
        if (!empty($soapAction)) {
            return $soapAction;
        }
        return "";
    }

    public function listCTOSReport()
    {
        return $data['1' => "Request ID",
              '2' => "Generate CTOS Report",
              '3' => "Request SSM",
              '4' => "Request Index",
              '5' => "Request Party", // have
              '6' => "Request Party Confirm", //have
              '7' => "Request ID Confirm",
              '8' => "Request Lite", // have
              '9'  => "Request Confirm", // have
              '10' => "Request", // have
              '11' => "Generate TR Report",
              '12' => "Generate CTOS Lite Report"
            ];
    }




}
