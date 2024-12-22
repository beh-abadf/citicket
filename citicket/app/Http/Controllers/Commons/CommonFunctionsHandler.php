<?php

namespace App\Http\Controllers\Commons;

require_once 'php/jdf.php';
require_once 'php/convert_to_persian.php';


/**
 * Common functions are defined here
 */
trait CommonFunctionsHandler
{
    private function configureDateOfCreation(): array
    {
        return [
            'date_created' => jdate('y/m/d'),
            'day_created' => jdate('l'),
            'time_created' => jdate('g:i:s')
        ];
    }
    private function configureDateOfUpdate(): array
    {
        return [
            'date_updated' => jdate('y/m/d'),
            'day_updated' => jdate('l'),
            'time_updated' => jdate('g:i:s')
        ];
    }
}
