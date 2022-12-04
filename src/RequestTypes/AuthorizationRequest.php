<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\RequestTypes;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Entities\UserEntityInterface;

class AuthorizationRequest
{
    /**
     * The grant type identifier
     */
    protected string $grantTypeId;

    /**
     * The client identifier
     */
    protected ClientEntityInterface $client;

    /**
     * The user identifier
     */
    protected UserEntityInterface $user;

    /**
     * An array of scope identifiers
     *
     * @var ScopeEntityInterface[]
     */
    protected array $scopes = [];

    /**
     * Has the user authorized the authorization request
     */
    protected bool $authorizationApproved = false;

    /**
     * The redirect URI used in the request
     */
    protected ?string $redirectUri;

    /**
     * The state parameter on the authorization request
     */
    protected ?string $state;

    /**
     * The code challenge (if provided)
     */
    protected string $codeChallenge;

    /**
     * The code challenge method (if provided)
     */
    protected string $codeChallengeMethod;

    /**
     * @return string
     */
    public function getGrantTypeId()
    {
        return $this->grantTypeId;
    }

    /**
     * @param string $grantTypeId
     */
    public function setGrantTypeId($grantTypeId)
    {
        $this->grantTypeId = $grantTypeId;
    }

    /**
     * @return ClientEntityInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param ClientEntityInterface $client
     */
    public function setClient(ClientEntityInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return UserEntityInterface|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserEntityInterface $user
     */
    public function setUser(UserEntityInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return ScopeEntityInterface[]
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param ScopeEntityInterface[] $scopes
     */
    public function setScopes(array $scopes)
    {
        $this->scopes = $scopes;
    }

    /**
     * @return bool
     */
    public function isAuthorizationApproved()
    {
        return $this->authorizationApproved;
    }

    /**
     * @param bool $authorizationApproved
     */
    public function setAuthorizationApproved($authorizationApproved)
    {
        $this->authorizationApproved = $authorizationApproved;
    }

    /**
     * @return string|null
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @param string|null $redirectUri
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return string|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCodeChallenge()
    {
        return $this->codeChallenge;
    }

    /**
     * @param string $codeChallenge
     */
    public function setCodeChallenge($codeChallenge)
    {
        $this->codeChallenge = $codeChallenge;
    }

    /**
     * @return string
     */
    public function getCodeChallengeMethod()
    {
        return $this->codeChallengeMethod;
    }

    /**
     * @param string $codeChallengeMethod
     */
    public function setCodeChallengeMethod($codeChallengeMethod)
    {
        $this->codeChallengeMethod = $codeChallengeMethod;
    }
}
