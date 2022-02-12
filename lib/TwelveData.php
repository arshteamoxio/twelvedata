<?php

namespace TwelveData;

use TwelveData\Base\BaseClass;
use TwelveData\Base\HttpRequest;
use TwelveData\Services\CryptoCurrencies;
use TwelveData\Services\CryptoCurrencyExchanges;

/**
 *
 * @property CryptoCurrencyExchanges $cryptoCurrencyExchanges
 * @property CryptoCurrencies $cryptoCurrencies
 *
 * @property HttpRequest $httpRequest
 *
 */
class TwelveData extends BaseClass
{

    public $httpRequest;
    private $baseUrl = 'https://api.twelvedata.com';

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        if (!is_string($apiKey)) {
            throw new \InvalidArgumentException('Apikey must be string');
        }
        $this->httpRequest = new HttpRequest($apiKey, $this->baseUrl);
    }

    public function __get($name)
    {
        $className = "\\" . static::getRootNamespace() . "\\Services\\" . ucfirst($name);
        if (class_exists($className)) {
            return new $className($this);
        } else {
            throw new \InvalidArgumentException('Requested object does not exist');
        }
    }

}
