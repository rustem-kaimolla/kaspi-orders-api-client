<?php

namespace RustemKaimolla\KaspiOrdersApi\Contracts;

interface DTOContract
{
    public static function createFromArray(array $data = []): static;
}