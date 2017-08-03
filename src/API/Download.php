<?php

declare(strict_types=1);

/*
 * This file is part of OBOOM PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Oboom\API;

use BrianFaust\Http\HttpResponse;

class Download extends AbstractAPI
{
    protected $endpoint = 'api';

    public function prepare(string $item, array $parameters = []): HttpResponse
    {
        return $this->client->post('dl', compact('item') + $parameters);
    }

    public function start(string $ticket, string $start): HttpResponse
    {
        return $this->client->post('dlh', compact('ticket', 'start'));
    }

    public function thumb(string $item, bool $redirect = false): HttpResponse
    {
        return $this->client->post('dupe', compact('item', 'redirect'));
    }
}
