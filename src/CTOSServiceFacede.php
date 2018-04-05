<?php
/**
 * @copyright MIT
 * @version 1.0.1
 * @created_by Nazrul Mustaffa
 * @email nazrul.mustaffa@capitalbay.com
 */
namespace MohdNazrul\CTOSLaravel;
use Illuminate\Support\Facades\Facade;

class CTOSServiceFacede extends Facade
{
    protected static function getFacadeAccessor(){return 'CTOSApi';}
}