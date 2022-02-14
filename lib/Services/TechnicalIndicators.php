<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;
use TwelveData\Base\ServiceInterface;

class TechnicalIndicators extends Service
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->get('technical_indicators');
    }

}
