<?php

declare(strict_types=1);

/*
 * This file is part of OBOOM PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\Oboom\API;

use Plients\Http\HttpResponse;

class Remote extends AbstractAPI
{
    protected $endpoint = 'api';

    public function availablePlugins(): HttpResponse
    {
        return $this->post('remote/plugin/ls');
    }

    public function getAccounts(): HttpResponse
    {
        return $this->post('remote/account/ls');
    }

    public function createAccount($name, $plugin_name, $data): HttpResponse
    {
        return $this->post('remote/account/add', compact('name', 'plugin_name', 'data'));
    }

    public function modifyAccount($id, $name, $plugin_name, $data, $state): HttpResponse
    {
        return $this->post('remote/account/modify', compact('id', 'name', 'plugin_name', 'data', 'state'));
    }

    public function deleteAccount($accounts): HttpResponse
    {
        return $this->post('remote/accounts/rm', compact('accounts'));
    }

    public function createUploadJob($urls, $parent, $name_policy = 'fail'): HttpResponse
    {
        return $this->post('remote/add', compact('urls', 'parent', 'name_policy'));
    }

    public function deleteUploadJob($remotes): HttpResponse
    {
        return $this->post('remote/ls', compact('remotes'));
    }

    public function createFolder(): HttpResponse
    {
        return $this->post('remote/ls');
    }
}
