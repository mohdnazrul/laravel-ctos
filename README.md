# CTOS - B2B API Packages

**CTOS Integration (B2B) with WSDL.**

System Integrator (SI) and CTOS ENQWS platform.
1. SI conncetion to ENQWS
2. SI requesting authentication information from ENQWS
3. SI requesting information from ENQWS

**FOR LARAVEL SETUP CONFIGURATION:-**

1. composer require mohdnazrul/laravel-ctos
2. Add this syntax inside config/app.php
```php
   ....
   'providers'=> [
     .
     MohdNazrul\CTOSLaravel\CTOSServiceProvider::class,
     .
   ],
``` 




