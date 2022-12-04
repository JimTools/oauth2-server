<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\Repositories;

use League\OAuth2\Server\Entities\AuthCodeEntityInterface;
use League\OAuth2\Server\Exception\UniqueTokenIdentifierConstraintViolationException;

/**
 * Auth code storage interface.
 */
interface AuthCodeRepositoryInterface extends RepositoryInterface
{
    /**
     * Creates a new AuthCode
     */
    public function getNewAuthCode(): AuthCodeEntityInterface;

    /**
     * Persists a new auth code to permanent storage.
     *
     * @throws UniqueTokenIdentifierConstraintViolationException
     */
    public function persistNewAuthCode(AuthCodeEntityInterface $authCodeEntity): void;

    /**
     * Revoke an auth code.
     */
    public function revokeAuthCode(string $codeId): void;

    /**
     * Check if the auth code has been revoked.
     */
    public function isAuthCodeRevoked(string $codeId): bool;
}
