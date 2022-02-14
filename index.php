<?php
require 'vendor/autoload.php';
use TwelveData\TwelveData;

$apiKey = 'demo';

$api = new TwelveData($apiKey);

//To get all crypto currency exchanges
//$cryptoCurrencies = $api->cryptoCurrencyExchanges->all();

//To get all crypto currencies
//$cryptoExchanges = $api->cryptoCurrencies->all();

//To search crypto currencies by pair
//$cryptoExchanges = $api->cryptoCurrencies->searchPair('BTC', 'USD');

//To search crypto currencies by different parameters
$cryptoExchanges = $api->cryptoCurrencies->search(array(
    'currency_base' => 'BTC'
));

print_r($cryptoExchanges);die;
