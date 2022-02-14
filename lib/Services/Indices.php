<?php

namespace TwelveData\Services;


use TwelveData\Base\Service;
use TwelveData\Base\ServiceInterface;

class Indices extends Service implements ServiceInterface
{
    /**
     * @return array
     */
    public function all()
    {
        return $this->baseObject->httpRequest->get('indices');
    }

    /**
     * @param array $params
     * @return array
     */
    public function search($params = array())
    {
        return $this->baseObject->httpRequest->get('indices', $params);
    }


}
