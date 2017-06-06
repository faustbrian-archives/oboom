<?php

/*
 * This file is part of OBOOM PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Oboom;

use BrianFaust\Unified\AbstractHttpClient;
use BrianFaust\Oboom\Request\Modifiers\ApiKeyModifier;

class HttpClient extends AbstractHttpClient
{
    protected $endpoint;

    protected $options = [
        'base_uri' => 'http://www.oboom.com/1/',
        'headers' => [
           'User-Agent' => 'BrianFaust/Oboom',
        ],
    ];

    protected $requestModifiers = [ApiKeyModifier::class];

    protected function buildRequestUri($baseUri, $path)
    {
        return sprintf('http://%s.oboom.com/1/%s', $this->getProperty('endpoint'), $path);
    }
}
