<?php

namespace RustemKaimolla\KaspiOrdersApi\Contracts;

use RustemKaimolla\KaspiOrdersApi\Exceptions\ApiResultException;

interface ClientContract
{
    /**
     * @param string $kaspiToken Токен авторизации
     */
    public function __construct(string $kaspiToken);


    /**
     * @param string $path Путь API метода
     * @param array  $query Массив GET параметров
     *
     * @return array
     */
    public function getRequest(string $path = '', array $query = []): array;
}