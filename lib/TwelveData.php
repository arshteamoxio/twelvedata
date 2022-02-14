<?php

namespace TwelveData;

use TwelveData\Base\BaseClass;
use TwelveData\Base\HttpRequest;
use TwelveData\Services\Core;
use TwelveData\Services\CryptoCurrencies;
use TwelveData\Services\CryptoCurrencyExchanges;
use TwelveData\Services\Etf;
use TwelveData\Services\Exchanges;
use TwelveData\Services\Forex;
use TwelveData\Services\Indices;
use TwelveData\Services\Stocks;
use TwelveData\Services\Symbol;

/**
 *
 * @property Core $core
 * @property CryptoCurrencyExchanges $cryptoCurrencyExchanges
 * @property CryptoCurrencies $cryptoCurrencies
 * @property Stocks $stocks
 * @property Forex $forex
 * @property Etf $etf
 * @property Indices $indices
 * @property Exchanges $exchanges
 * @property Symbol $symbol
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
