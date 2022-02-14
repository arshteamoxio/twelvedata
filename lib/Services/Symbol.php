<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;
use TwelveData\Base\ServiceInterface;

class Symbol extends Service
{
    /**
     * @param array $params
     * @return array
     */
    public function search($params = array())
    {
        return $this->baseObject->httpRequest->get('symbol_search', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function earliestTimestamp($params = array())
    {
        return $this->baseObject->httpRequest->get('earliest_timestamp', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function timeSeries($params = array())
    {
        return $this->baseObject->httpRequest->get('time_series', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function currencyConversion($params = array())
    {
        return $this->baseObject->httpRequest->get('currency_conversion', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function quote($params = array())
    {
        return $this->baseObject->httpRequest->get('quote', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function price($params = array())
    {
        return $this->baseObject->httpRequest->get('price', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function eod($params = array())
    {
        return $this->baseObject->httpRequest->get('eod', $params);
    }

}
