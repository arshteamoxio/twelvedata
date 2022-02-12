<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;

class CryptoCurrencyExchanges extends Service
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->request('cryptocurrency_exchanges');
    }

}
