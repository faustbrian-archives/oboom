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

class User extends AbstractAPI
{
    protected $endpoint = 'www';

    public function login(string $username, string $password): HttpResponse
    {
        return $this->post('login', [
            'auth'   => $username,
            'pass'   => hash_pbkdf2('sha1', $password, strrev($password), 1000, 32),
            'source' => '/#app',
        ]);
    }

    public function loginAsGuest(): HttpResponse
    {
        return $this->post('guestsession', ['source' => '/#app']);
    }

    public function createTicket(string $item, string $challenge, string $response): HttpResponse
    {
        return $this->post('dl/ticket', [
            'source'                    => '/#app',
            'recaptcha_challenge_field' => $challenge,
            'recaptcha_response_field'  => $response,
            'download_id'               => $item,
        ]);
    }
}
