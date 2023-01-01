<?php

namespace RustemKaimolla\KaspiOrdersApi\Traits;

trait WithProxy
{
    /**
     * @param string $ip
     * @param string $port
     *
     * @return void
     */
    public function withProxy(string $ip, string $port): void
    {
        $this->client->withProxy($ip, $port);
    }
}