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

class Remote extends AbstractApi
{
    protected $endpoint = 'api';

    public function availablePlugins()
    {
        return $this->post('remote/plugin/ls');
    }

    public function getAccounts()
    {
        return $this->post('remote/account/ls');
    }

    public function createAccount($name, $plugin_name, $data)
    {
        $this->setFormParameters(compact('name', 'plugin_name', 'data'));

        return $this->post('remote/account/add');
    }

    public function modifyAccount($id, $name, $plugin_name, $data, $state)
    {
        $this->setFormParameters(compact('id', 'name', 'plugin_name', 'data', 'state'));

        return $this->post('remote/account/modify');
    }

    public function deleteAccount($accounts)
    {
        $this->setFormParameters(compact('accounts'));

        return $this->post('remote/accounts/rm');
    }

    public function createUploadJob($urls, $parent, $name_policy = 'fail')
    {
        $this->setFormParameters(compact('urls', 'parent', 'name_policy'));

        return $this->post('remote/add');
    }

    public function deleteUploadJob($remotes)
    {
        $this->setFormParameters(compact('remotes'));

        return $this->post('remote/ls');
    }

    public function createFolder()
    {
        return $this->post('remote/ls');
    }
}
