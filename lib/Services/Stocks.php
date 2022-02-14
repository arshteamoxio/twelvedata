<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;
use TwelveData\Base\ServiceInterface;

class Stocks extends Service implements ServiceInterface
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->get('stocks');
    }

    /**
     * @param array $params
     * @return array
     */
    public function search($params = array())
    {
        return $this->baseObject->httpRequest->get('stocks', $params);
    }


}
