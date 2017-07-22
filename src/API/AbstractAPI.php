<?php

/*
 * This file is part of OBOOM PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\OBOOM\API;

use BrianFaust\Http\HttpResponse;
use BrianFaust\Http\PendingHttpRequest;

abstract class AbstractAPI
{
    /**
     * @var \BrianFaust\Http\PendingHttpRequest
     */
    protected $client;

    /**
     * Create a new API class instance.
     *
     * @param \BrianFaust\Http\PendingHttpRequest $client
     */
    public function __construct(PendingHttpRequest $client)
    {
        $this->client = $client;
    }

    public function post(string $method, array $parameters): HttpResponse
    {
        return $this
            ->client
            ->withBaseUri("http://{$this->endpoint}.oboom.com/1/")
            ->post($method, ['token' => $this->token] + $parameters);
    }
}