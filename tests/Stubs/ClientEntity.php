<?php

namespace LeagueTests\Stubs;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

class ClientEntity implements ClientEntityInterface
{
    use EntityTrait, ClientTrait;

    public function setRedirectUri(array|string $uri)
    {
        $this->redirectUri = $uri;
    }

    public function setConfidential(): void
    {
        $this->isConfidential = true;
    }
}
