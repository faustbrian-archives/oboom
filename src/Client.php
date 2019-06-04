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

namespace Plients\Oboom;

use Plients\Http\Http;

class Client
{
    /**
     * @var string
     */
    public $token;

    /**
     * Create a new client instance.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Create a new API service instance.
     *
     * @param string $name
     *
     * @return \Plients\Oboom\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri('http://www.oboom.com/1/');

        $class = "Plients\\Oboom\\API\\{$name}";

        return new $class($client);
    }
}
