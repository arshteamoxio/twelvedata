<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;
use TwelveData\Base\ServiceInterface;

class Forex extends Service implements ServiceInterface
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->get('forex_pairs');
    }

    /**
     * @param array $params
     * @return array
     */
    public function search($params = array())
    {
        return $this->baseObject->httpRequest->get('forex_pairs', $params);
    }

    /**
     * @param string $currency1
     * @param string $currency2
     * @return array
     */
    public function searchPair($currency1, $currency2)
    {
        return $this->search(array(
            'symbol' => $currency1 . '/' . $currency2
        ));
    }

    /**
     * @param array $params
     * @return array
     */
    public function exchangeRate($params = array())
    {
        return $this->baseObject->httpRequest->get('exchange_rate', $params);
    }

}
