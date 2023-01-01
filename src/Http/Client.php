<?php

namespace RustemKaimolla\KaspiOrdersApi\Http;

use RustemKaimolla\KaspiOrdersApi\Contracts\ClientContract;
use RustemKaimolla\KaspiOrdersApi\Exceptions\ApiResultException;
use RustemKaimolla\KaspiOrdersApi\Traits\WithProxy;
use GuzzleHttp\Client as HttpClient;
use Throwable;

class Client implements ClientContract
{
    use WithProxy;

    public const SUCCESS      = 200;
    public const MANY_REQUEST = 429;
    public const SERVER_ERROR = 500;

    /**
     * @var string
     */
    protected string $apiUrl = 'https://kaspi.kz/shop/api/v2/';

    /**
     * @var array|string[]
     */
    protected array $baseHeader = [];

    /**
     * @var HttpClient
     */
    protected HttpClient $client;

    /**
     * @param string $kaspiToken Токен авторизации
     */
    public function __construct(string $kaspiToken)
    {
        $this->client = new HttpClient([
            'base_uri' => $this->apiUrl,
            'timeout'  => 2.0,
        ]);

        $this->baseHeader = [
            'Content-Type' => 'application/vnd.api+json',
            'X-Auth-Token' => $kaspiToken,
        ];
    }

    /**
     * @param string $path Путь API метода
     * @param array $query Массив GET параметров
     *
     * @return array
     *
     * @throws Throwable
     */
    public function getRequest(string $path = '', array $query = []): array
    {
        $apiResult = $this->client->get($path, $query);

        if ($apiResult->getStatusCode() !== Client::SUCCESS) {
            throw new ApiResultException();
        }

        return json_decode($apiResult->getBody()->getContents(), true);
    }
}