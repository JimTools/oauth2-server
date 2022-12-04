<?php
/**
 * OAuth 2.0 Response Type Interface.
 *
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\ResponseTypes;

use Defuse\Crypto\Key;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use Psr\Http\Message\ResponseInterface;

interface ResponseTypeInterface
{
    public function setAccessToken(AccessTokenEntityInterface $accessToken): void;

    public function setRefreshToken(RefreshTokenEntityInterface $refreshToken): void;

    public function generateHttpResponse(ResponseInterface $response): ResponseInterface;

    /**
     * Set the encryption key
     */
    public function setEncryptionKey(Key|string $key = null);
}
