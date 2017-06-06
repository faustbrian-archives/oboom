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

class TokenModifier extends AbstractModifier
{
    public function apply()
    {
        $apiKey = $this->httpClient->getConfig('apiKey');

        $this->httpClient->addQuery('token', $apiKey);

        return $this->httpClient;
    }
}
