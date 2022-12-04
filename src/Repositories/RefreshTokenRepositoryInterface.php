<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\Repositories;

use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Exception\UniqueTokenIdentifierConstraintViolationException;

/**
 * Refresh token interface.
 */
interface RefreshTokenRepositoryInterface extends RepositoryInterface
{
    /**
     * Creates a new refresh token
     */
    public function getNewRefreshToken(): ?RefreshTokenEntityInterface;

    /**
     * Create a new refresh token_name.
     *
     * @throws UniqueTokenIdentifierConstraintViolationException
     */
    public function persistNewRefreshToken(RefreshTokenEntityInterface $refreshTokenEntity): void;

    /**
     * Revoke the refresh token.
     */
    public function revokeRefreshToken(string $tokenId): void;

    /**
     * Check if the refresh token has been revoked.
     */
    public function isRefreshTokenRevoked(string $tokenId): bool;
}
