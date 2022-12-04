<?php
/**
 * @author      Sebastiano Degan <sebdeg87@gmail.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\RedirectUriValidators;

use League\Uri\Exceptions\SyntaxError;
use League\Uri\Uri;

class RedirectUriValidator implements RedirectUriValidatorInterface
{
    private array $allowedRedirectUris;

    /**
     * New validator instance for the given uri
     */
    public function __construct(string|array $allowedRedirectUri)
    {
        if (\is_string($allowedRedirectUri)) {
            $this->allowedRedirectUris = [$allowedRedirectUri];
        } elseif (\is_array($allowedRedirectUri)) {
            $this->allowedRedirectUris = $allowedRedirectUri;
        } else {
            $this->allowedRedirectUris = [];
        }
    }

    /**
     * {@inheritDoc}
     */
    public function validateRedirectUri(string $redirectUri): bool
    {
        if ($this->isLoopbackUri($redirectUri)) {
            return $this->matchUriExcludingPort($redirectUri);
        }

        return $this->matchExactUri($redirectUri);
    }

    /**
     * According to section 7.3 of rfc8252, loopback uris are:
     *   - "http://127.0.0.1:{port}/{path}" for IPv4
     *   - "http://[::1]:{port}/{path}" for IPv6
     */
    private function isLoopbackUri(string $redirectUri): bool
    {
        try {
            $uri = Uri::createFromString($redirectUri);
        } catch (SyntaxError $e) {
            return false;
        }

        return $uri->getScheme() === 'http'
            && (\in_array($uri->getHost(), ['127.0.0.1', '[::1]'], true));
    }

    /**
     * Find an exact match among allowed uris
     */
    private function matchExactUri(string $redirectUri): bool
    {
        return \in_array($redirectUri, $this->allowedRedirectUris, true);
    }

    /**
     * Find a match among allowed uris, allowing for different port numbers
     */
    private function matchUriExcludingPort(string $redirectUri): bool
    {
        $parsedUrl = $this->parseUrlAndRemovePort($redirectUri);

        foreach ($this->allowedRedirectUris as $allowedRedirectUri) {
            if ($parsedUrl === $this->parseUrlAndRemovePort($allowedRedirectUri)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Parse an url like \parse_url, excluding the port
     */
    private function parseUrlAndRemovePort(string $url): string
    {
        $uri = Uri::createFromString($url);

        return (string) $uri->withPort(null);
    }
}
