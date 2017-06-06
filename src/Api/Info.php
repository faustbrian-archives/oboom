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

class Info extends AbstractApi
{
    protected $endpoint = 'api';

    public function info($items)
    {
        $this->setFormParameters(compact('items'));

        return $this->post('info');
    }

    public function tree($revision = null)
    {
        $this->setFormParameters(compact('revision'));

        return $this->post('tree');
    }

    public function listing($item)
    {
        $this->setFormParameters(compact('item'));

        return $this->post('ls');
    }

    public function diskUsage()
    {
        return $this->post('du');
    }
}
