<?php
require 'vendor/autoload.php';
use TwelveData\TwelveData;

$apiKey = 'demo';

$api = new TwelveData($apiKey);

//To get all crypto currency exchanges
$cryptoCurrencies = $api->cryptoCurrencyExchanges->all();

//To get all crypto currencies
$cryptoExchanges = $api->cryptoCurrencies->all();

//To search crypto currencies by symbol
$cryptoExchanges = $api->cryptoCurrencies->search('BTC/USD');

//To search crypto currencies by pair
$cryptoExchanges = $api->cryptoCurrencies->searchPair('BTC', 'USD');

