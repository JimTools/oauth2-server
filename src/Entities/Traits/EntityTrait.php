<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\Entities\Traits;

trait EntityTrait
{
    protected mixed $identifier;

    public function getIdentifier(): mixed
    {
        return $this->identifier;
    }

    public function setIdentifier(mixed $identifier): void
    {
        $this->identifier = $identifier;
    }
}
