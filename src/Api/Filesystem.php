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

class Filesystem extends AbstractApi
{
    protected $endpoint = 'api';

    public function createFolder($parent, $name, $name_policy = 'fail', $revision = null)
    {
        $this->setFormParameters(compact('parent', 'name', 'name_policy', 'revision'));

        return $this->post('mkdir');
    }

    public function copy($items, $target, $new_name, $name_policy = 'fail', $revision = null)
    {
        $this->setFormParameters(compact('items', 'target', 'new_name', 'name_policy', 'revision'));

        return $this->post('cp');
    }

    public function move($items, $target, $new_name, $name_policy = 'fail', $revision = null)
    {
        $this->setFormParameters(compact('items', 'target', 'new_name', 'name_policy', 'revision'));

        return $this->post('mv');
    }

    public function delete($items, $recursive, $move_to_trash = false, $revision = null)
    {
        $this->setFormParameters(compact('items', 'recursive', 'move_to_trash', 'revision'));

        return $this->post('rm');
    }
}
