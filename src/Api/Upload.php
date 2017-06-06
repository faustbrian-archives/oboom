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

class Upload extends AbstractApi
{
    protected $endpoint = 'upload';

    public function import($items, $target, $new_name, $name_policy = 'fail', $revision = null)
    {
        $this->setFormParameters(compact('items', 'target', 'new_name', 'name_policy', 'revision'));

        return $this->post('import');
    }

    public function touch($name, $parent, $name_policy = 'fail', $revision = null)
    {
        $this->setFormParameters(compact('name', 'parent', 'name_policy', 'revision'));

        return $this->post('touch');
    }

    public function dupe($sha1, $size, $name, $parent, $name_policy, $revision)
    {
        $this->setFormParameters(compact('sha1', 'size', 'name', 'parent', 'name_policy', 'revision'));

        return $this->post('dupe');
    }

    public function file($token, $file, $parent, $name_policy = 'fail')
    {
        $this->setQuery(compact('token', 'parent'));
        $this->setFormParameters(compact('name_policy'));
        $this->setMultipart('file', fopen($file, 'r'));

        return $this->post('ul');
    }
}
