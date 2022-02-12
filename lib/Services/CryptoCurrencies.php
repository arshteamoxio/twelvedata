<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;

class CryptoCurrencies extends Service
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->request('cryptocurrencies');
    }

    /**
     * @param string $symbol
     * @return array
     */
    public function search($symbol)
    {
        $symbol = strtoupper($symbol);
        return $this->baseObject->httpRequest->request('cryptocurrencies', 'GET', array(
            'symbol' => $symbol
        ));
    }

    /**
     * @param string $token
     * @param string $currency
     * @return array
     */
    public function searchPair($token, $currency)
    {
        return $this->search($token.'/'. $currency);
    }

}
