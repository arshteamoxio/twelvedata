<?php


namespace TwelveData\Base;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * @var Client $client
 */
class HttpRequest extends BaseClass
{
    private $client;

    public $apiKey;
    public $baseUrl;

    public function __construct($apiKey, $baseUrl)
    {
        if (!is_string($apiKey)) {
            throw new \InvalidArgumentException('Apikey must be string');
        }
        if (!is_string($baseUrl)) {
            throw new \InvalidArgumentException('Base URL must be string');
        }

        $this->apiKey = $apiKey;
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->baseUrl .= '/';

        $this->setClient();
    }

    private function setClient()
    {
        $this->client = new Client(array(
            'base_uri' => $this->baseUrl,
            'timeout' => 2.0,
        ));
    }

    private function setApiKey($data)
    {
        $data['apikey'] = $this->apiKey;
        return $data;
    }

    /**
     * @param string $path
     * @param array $params
     * @return string[]
     */
    public function get($path, $params = null)
    {
        return $this->request($path, 'GET', $params);
    }

    /**
     * @param string $path
     * @param array $params
     * @return string[]
     */
    public function post($path, $params = null)
    {
        return $this->request($path, 'POST', $params);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $params
     * @param array $headers
     * @return string[]
     */
    public function request($path, $method = 'GET', $params = null, $headers = null)
    {
        $params = $params ?: array();
        $headers = $headers ?: array();

        $params = $this->setApiKey($params);
        $method = strtoupper($method);

        $options['headers'] = $headers;
        if ($method == 'GET') {
            $options['query'] = $params;
        } elseif ($method == 'POST') {
            $options['body'] = $params;
        }

        try {
            $response = $this->client->request($method, $path, $options);
            return $this->handleResponse($response);
        } catch (\Exception $ex) {
            return $this->handleErrorResponse($ex);
        }
    }

    private function handleResponse(Response $response)
    {
        $statusCode = $response->getStatusCode();
        $response = $response->getBody()->getContents();
        if ($statusCode == 200) {
            return $response;
        } else {
            return $this->handleErrorResponse($response, $statusCode);
        }
    }

    private function handleErrorResponse($err, $statusCode = 422)
    {
        if ($err instanceof \Exception) {
            return $err->getMessage();
        } else {
            return $err;
        }
    }

}
