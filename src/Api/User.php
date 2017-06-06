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
use BrianFaust\Oboom\Utils\PasswordHash;

class User extends AbstractApi
{
    protected $endpoint = 'www';

    public function login($username, $password)
    {
        $this->setProperty('endpoint', 'www');

        $this->setFormParameters([
            'auth' => $username,
            'pass' => (new PasswordHash())->pbkdf2('sha1', $password, strrev($password), 1000, 16),
            'source' => '/#app',
        ]);

        return $this->post('login');
    }

    public function loginAsGuest()
    {
        $this->setFormParameters(['source' => '/#app']);

        return $this->post('guestsession');
    }

    public function createTicket($item, $challenge, $response)
    {
        $this->setFormParameters([
            'source' => '/#app',
            'recaptcha_challenge_field' => $challenge,
            'recaptcha_response_field' => $response,
            'download_id' => $item,
        ]);

        return $this->post('dl/ticket');
    }
}
