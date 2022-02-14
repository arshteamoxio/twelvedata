<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;
use TwelveData\Base\ServiceInterface;

class Exchanges extends Service implements ServiceInterface
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->get('exchanges');
    }

    /**
     * @param array $params
     * @return array
     */
    public function search($params = array())
    {
        return $this->baseObject->httpRequest->get('exchanges', $params);
    }

    /**
     * @param array $params
     * @return array
     */
    public function marketState($params = array())
    {
        return $this->baseObject->httpRequest->get('market_state', $params);
    }

}
