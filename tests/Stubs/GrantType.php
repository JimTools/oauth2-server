<?php

declare(strict_types=1);

namespace LeagueTests\Stubs;

use DateInterval;
use Defuse\Crypto\Key;
use Laminas\Diactoros\Response;
use League\Event\EmitterInterface;
use League\OAuth2\Server\CryptKey;
use League\OAuth2\Server\Grant\GrantTypeInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use League\OAuth2\Server\Repositories\ScopeRepositoryInterface;
use League\OAuth2\Server\RequestTypes\AuthorizationRequest;
use League\OAuth2\Server\ResponseTypes\ResponseTypeInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GrantType implements GrantTypeInterface
{
    private EmitterInterface $emitter;

    public function setEmitter(EmitterInterface $emitter = null): GrantType
    {
        $this->emitter = $emitter;

        return $this;
    }

    public function getEmitter(): EmitterInterface
    {
        return $this->emitter;
    }

    public function setRefreshTokenTTL(DateInterval $refreshTokenTTL): void
    {
    }

    public function getIdentifier(): string
    {
        return 'grant_type_identifier';
    }

    public function respondToAccessTokenRequest(
        ServerRequestInterface $request,
        ResponseTypeInterface $responseType,
        DateInterval $accessTokenTTL
    ): ResponseTypeInterface {
        return $responseType;
    }

    public function canRespondToAuthorizationRequest(ServerRequestInterface $request): bool
    {
        return true;
    }

    public function validateAuthorizationRequest(ServerRequestInterface $request): AuthorizationRequest
    {
        $authRequest = new AuthorizationRequest();
        $authRequest->setGrantTypeId(self::class);

        return $authRequest;
    }

    public function completeAuthorizationRequest(AuthorizationRequest $authorizationRequest): ResponseTypeInterface
    {
        return new Response();
    }

    public function canRespondToAccessTokenRequest(ServerRequestInterface $request): bool
    {
        return true;
    }

    public function setClientRepository(ClientRepositoryInterface $clientRepository): void
    {
    }

    public function setAccessTokenRepository(AccessTokenRepositoryInterface $accessTokenRepository): void
    {
    }

    public function setScopeRepository(ScopeRepositoryInterface $scopeRepository): void
    {
    }

    public function setDefaultScope(string $scope): void
    {
    }

    public function setPrivateKey(CryptKey $privatePrivateKey): void
    {
    }

    public function setEncryptionKey(Key|string $key = null): void
    {
    }
}
