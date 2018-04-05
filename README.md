# CTOS API Package

This lLibrary allows to query the CTOS - B2B API for registered users. 

You need the access details that were provided to you to make any calls to the API.
For exact parameters in the data array/XML, refer to your offline documentation.

If you do not know what all this is about, then you probably do not need or want this library.

# Configuration
## .env file

Configuration via the .env file currently allows the following variables to be set:
- CTOS_ENV=UAT
- CTOS_URL='http://api.endpoint/url/'
- CTOS_USERNAME=demouser
- CTOS_PASSWORD=demopassword
- CTOS_ACCOUNT_CODE=ACC_CODE
- CTOS_COMPANY_CODE=COMPANY_CODE

## Available functions
** 1. Set records **
```php
     $records = new Records($party_type, $basic_group_code, $iclc_no, $nicbr_no, $name,
                    $mobile_no, $ref_no, $distribution_code, $purpose_code, $purpose_content,
                    $state_code, $country_code, $include_consent, $include_ctos, $include_trex, $include_ccris,
                    $summary, $include_ccris_supplementary, $include_dcheque, $include_fico, $include_sme_financial_health_indicator,
                    $include_fico_capacity_index, $include_latest_ssm, $entity_key_confirm);
```
** 2. Set Batch CTOS **
```php
   $batch = new Batch('0009', '0',
                    'http://ws.cmctos.com.my/ctosnet/request', $this->company_code,
                    $this->account_code, $this->soapUser, '1');
```
** 3. Set Batch Request **
```php
 $xml = $batch->XMLBatchWithRecords('request', $records->getRequestXMLFormat('request'));
```
** 4. Set XML with format HTML escape and put inside envelope **
```php
 $dataXML = $ctos->setXMLPostString(htmlentities($xml), true);

```
** 5. Set variable header for CTOS; **
```php
 $content_type = 'text/xml;charset=\"utf-8\"';
                $accept = 'text/xml';
                $cache_control = 'no-cache';
                $pragma = 'no-cache';
                $soap_action = '';
                $ctos->setHeader($content_type, $accept, $cache_control, $pragma, $soap_action, true);

```
** 6. Connect CTOS **
```php
  $ctos->connect();

```
** 7. Get Response **
```php 
  $res = $ctos->getResponse();

```
 

This function tries to retrieve the report data from CTOS and returns the XML response;
In case of a connection error, it return,

If the request was successful but the query resulted in data related errors, the returned array will have the fields:

code  : contains the error code received from CTOS
error : contains the error message received from CTOS

A successful request returns the XML of the requested report



**FOR LARAVEL SETUP CONFIGURATION:-**

- Do composer require mohdnazrul/laravel-stos
```php
   composer require mohdnazrul/laravel-stos
```
- Add this syntax inside config/app.php
```php
   ....
   'providers'=> [
     .
     MohdNazrul\CTOSLaravel\CTOSServiceProvider::class,
     .
   ],
   'aliases' => [
      .
      'CTOSApi' => MohdNazrul\CTOSLaravel\CTOSServiceFacade::class,
      '
    ],
``` 
- Do publish as below
```php
php artisan vendor:publish --tag=ctos 
```
- You can edit the default configuration CBM inside config/ctos.php based your account as below
```php
return [
    'env' => env('CTOS_ENV', 'UAT'),
    'url' => env('CTOS_URL', 'http://locahost'),
    'username' => env('CTOS_USERNAME', 'xml'),
    'password' => env('CTOS_PASSWORD', '123456'),
    'account_code' => env('CTOS_ACCOUNT_CODE', 'account_code'),
    'company_code' => env('CTOS_COMPANY_CODE', 'company_code')
];
``` 