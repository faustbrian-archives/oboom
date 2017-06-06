<?php

/*
 * This file is part of OBOOM PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Oboom\Api;

use BrianFaust\Unified\AbstractApi;

class Download extends AbstractApi
{
    protected $endpoint = 'api';

    public function prepare($item, $auth = null, $stream = false, $start = null, $redirect = false)
    {
        $this->setFormParameters(compact('item', 'auth', 'stream', 'start', 'redirect'));

        return $this->post('dl');
    }

    public function start($ticket, $start)
    {
        $this->setFormParameters(compact('ticket', 'start'));

        return $this->post('dlh');
    }

    public function thumb($item, $redirect = false)
    {
        $this->setFormParameters(compact('item', 'redirect'));

        return $this->post('dupe');
    }
}
