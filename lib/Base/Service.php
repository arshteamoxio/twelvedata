<?php

namespace TwelveData\Base;

use TwelveData\TwelveData;

/**
 * @property TwelveData $baseObject
*/

abstract class Service extends BaseClass
{
    protected $baseObject;

    public function __construct($baseObject)
    {
        $this->baseObject = $baseObject;
    }

}
