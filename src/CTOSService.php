<?php
/**
 * @copyright MIT
 * @version 1.0.1
 * @created_by Nazrul Mustaffa
 * @email nazrul.mustaffa@capitalbay.com
 */


namespace MohdNazrul\CTOSLaravel;

class CTOSService
{
    private $SOAP_USER;
    private $SOAP_PASS;
    private $SOAP_URL;
    private $XMLPOSTSTRING;
    private $HEADERS;
    private $RESPONSE;
    private $INSIDE_ENVELOPE;
    private $POSTMEN;

    /**
     * CTOSService constructor.
     * @param $url
     * @param $username
     * @param $password
     */
    public function __construct($url, $username, $password)
    {
        $this->SOAP_URL = $url;
        $this->SOAP_USER = $username;
        $this->SOAP_PASS = $password;
    }

    /**
     * @param $xml
     * @param bool $escapeFomatter
     */
    public function setXMLPostString($xml, $escapeFomatter = false)
    {
        if ($escapeFomatter) {
            $str = startEnvelopInput() .
                 XMLEscape($xml)
                . endEnvelopInput();
            $this->XMLPOSTSTRING = $str;
        }

        $str = startEnvelopInput() . $xml . endEnvelopInput();
        $this->XMLPOSTSTRING = $str;
    }


    /**
     * Set Header
     * @param null $contentType
     * @param null $accept
     * @param null $cacheControl
     * @param null $pragma
     * @param null $soapAction
     * @param bool $auth
     */
    public function setHeader($contentType = null, $accept = null, $cacheControl = null,
                              $pragma = null, $soapAction = null, $auth = false)
    {

        $headers = array(
            "Content-type: " . $this->setContentType($contentType),
            "Accept: " . $this->setAccept($accept),
            "Cache-Control: " . $this->setCacheControl($cacheControl),
            "Pragma: " . $this->setPragma($pragma),
            "SOAPAction: " . $this->setSOAPAction($soapAction),
            "Content-length: " . strlen($this->XMLPOSTSTRING),
        );

        if ($auth) {
            $headers[] = "username:" . $this->SOAP_USER;
            $headers[] = "password:" . $this->SOAP_PASS;
        }

        $this->HEADERS = $headers;

    }

    /**
     * Connection
     * @return \Exception
     */
    public function connect()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->SOAP_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->SOAP_USER . ":" . $this->SOAP_PASS); // username and password - declared at the top of the doc
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->XMLPOSTSTRING); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->HEADERS);

        $response = curl_exec($ch);
        curl_close($ch);

        if (curl_errno($ch)) {
            return new \Exception(curl_error($ch));
        }

        $this->RESPONSE = $response;
        $this->receiveEnvelope();

    }

    /**
     * Get Response (Decode 64 Response)
     * @return bool|string
     */
    public function getResponse()
    {
        return decode64Response($this->INSIDE_ENVELOPE);
    }

    /**
     * Remove the envelope response
     */
    private function receiveEnvelope()
    {
        $response1 = str_replace("<?xml version='1.0' encoding='UTF-8'?><S:Envelope xmlns:S=\"http://schemas.xmlsoap.org/soap/envelope/\"><S:Body><ns2:requestResponse xmlns:ns2=\"http://ws.proxy.xml.ctos.com.my/\"><return>", "", $this->RESPONSE);
        $response2 = str_replace("</return></ns2:requestResponse></S:Body></S:Envelope>", "", $response1);
        $this->INSIDE_ENVELOPE = $response2;
    }

    /**
     * Set Content Type
     * @param $contentType
     * @return string
     */
    private function setContentType($contentType)
    {
        if (!empty($contentType)) {
            return $contentType;
        }
        return "text/xml;charset=\"utf-8\"";
    }

    /**
     * Set Accept
     * @param $accept
     * @return string
     */
    private function setAccept($accept)
    {
        if (!empty($accept)) {
            return $accept;
        }

        return "text/xml";
    }

    /**
     * Set Cache Control
     * @param $cacheControl
     * @return string
     */
    private function setCacheControl($cacheControl)
    {
        if (!empty($cacheControl)) {
            return $cacheControl;
        }
        return "no-cache";
    }

    /**
     * Set Pragma
     * @param $pragma
     * @return string
     */
    private function setPragma($pragma)
    {
        if (!empty($pragma)) {
            return $pragma;
        }
        return "no-cache";
    }

    /**
     * Set SOAP Action
     * @param $soapAction
     * @return string
     */
    private function setSOAPAction($soapAction)
    {
        if (!empty($soapAction)) {
            return $soapAction;
        }
        return "";
    }


}
