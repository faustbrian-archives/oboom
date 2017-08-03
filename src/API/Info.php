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

class Info extends AbstractAPI
{
    protected $endpoint = 'api';

    public function info(string $items): HttpResponse
    {
        return $this->post('info', compact('items'));
    }

    public function tree(string $revision = null): HttpResponse
    {
        return $this->post('tree', compact('revision'));
    }

    public function listing(string $item): HttpResponse
    {
        return $this->post('ls', compact('item'));
    }

    public function diskUsage(): HttpResponse
    {
        return $this->post('du');
    }
}
