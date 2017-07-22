<?php

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

class Filesystem extends AbstractAPI
{
    protected $endpoint = 'api';

    public function createFolder($parent, $name, $name_policy = 'fail', $revision = null): HttpResponse
    {
        return $this->client->post('mkdir', compact('parent', 'name', 'name_policy', 'revision'));
    }

    public function copy($items, $target, $new_name, $name_policy = 'fail', $revision = null): HttpResponse
    {
        return $this->client->post('cp', compact('items', 'target', 'new_name', 'name_policy', 'revision'));
    }

    public function move($items, $target, $new_name, $name_policy = 'fail', $revision = null): HttpResponse
    {
        return $this->client->post('mv', compact('items', 'target', 'new_name', 'name_policy', 'revision'));
    }

    public function delete($items, $recursive, $move_to_trash = false, $revision = null): HttpResponse
    {
        return $this->client->post('rm', compact('items', 'recursive', 'move_to_trash', 'revision'));
    }
}
