<?php
/**
 * Created by PhpStorm.
 * User: John Kagga
 * Date: 1/17/2017
 * Time: 1:08 AM
 */

namespace Kagga\Telco\facades;


use Illuminate\Support\Facades\Facade;

class Telco extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'telco';
    }

}