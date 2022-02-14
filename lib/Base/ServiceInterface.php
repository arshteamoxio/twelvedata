<?php

namespace TwelveData\Base;

use TwelveData\TwelveData;

/**
 * @property TwelveData $baseObject
 */
interface ServiceInterface
{

    /**
     * @return array
     */
    public function all();

    /**
     * @param array $params
     * @return array
     */
    public function search($params = array());

}
