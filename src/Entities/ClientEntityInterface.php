<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\Entities;

interface ClientEntityInterface
{
    /**
     * Get the client's identifier.
     */
    public function getIdentifier(): string;

    /**
     * Get the client's name.
     */
    public function getName(): string;

    /**
     * Returns the registered redirect URI (as a string).
     *
     * Alternatively return an indexed array of redirect URIs.
     *
     * @return string|string[]
     */
    public function getRedirectUri(): array|string;

    /**
     * Returns true if the client is confidential.
     */
    public function isConfidential(): bool;
}
