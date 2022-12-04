<?php
/**
 * Abstract authorization grant.
 *
 * @author      Julián Gutiérrez <juliangut@gmail.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\Grant;

abstract class AbstractAuthorizeGrant extends AbstractGrant
{
    public function makeRedirectUri(string $uri, array $params = [], string $queryDelimiter = '?'): string
    {
        $uri .= (\strstr($uri, $queryDelimiter) === false) ? $queryDelimiter : '&';

        return $uri . \http_build_query($params);
    }
}
