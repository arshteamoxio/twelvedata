<?php

namespace TwelveData\Base;

use TwelveData\TwelveData;

/**
 * @property TwelveData $baseObject
*/

class Service extends BaseClass
{
    public $baseObject;

    public function __construct($baseObject)
    {
        $this->baseObject = $baseObject;
    }

}
