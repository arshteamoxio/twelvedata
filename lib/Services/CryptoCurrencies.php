<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;
use TwelveData\Base\ServiceInterface;

class CryptoCurrencies extends Service implements ServiceInterface
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->get('cryptocurrencies');
    }

    /**
     * @param array $params
     * @return array
     */
    public function search($params = array())
    {
        return $this->baseObject->httpRequest->get('cryptocurrencies', $params);
    }

    /**
     * @param string $token
     * @param string $currency
     * @return array
     */
    public function searchPair($token, $currency)
    {
        return $this->search(array(
            'symbol' => $token . '/' . $currency
        ));
    }

}
