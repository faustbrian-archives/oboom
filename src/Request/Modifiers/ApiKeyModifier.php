<?php

/*
 * This file is part of OBOOM PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Oboom\Request\Modifiers;

use BrianFaust\Contracts\HttpClient;
use BrianFaust\Modifiers\AbstractModifier;
use Http\Message\Authentication\QueryParam;
use Http\Client\Common\Plugin\AuthenticationPlugin;

class ApiKeyModifier extends AbstractModifier
{
    public function apply()
    {
        $httpClient = $this->httpClient;

        $authentication = new QueryParam(['api_key' => $httpClient->getConfig('apiKey')]);

        $httpClient->addPlugin(new AuthenticationPlugin($authentication));

        return $httpClient;
    }
}
