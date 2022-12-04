<?php
/**
 * @author      Lukáš Unger <lookymsc@gmail.com>
 * @copyright   Copyright (c) Lukáš Unger
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\CodeChallengeVerifiers;

class S256Verifier implements CodeChallengeVerifierInterface
{
    /**
     * Return code challenge method.
     */
    public function getMethod(): string
    {
        return 'S256';
    }

    /**
     * Verify the code challenge.
     */
    public function verifyCodeChallenge(string $codeVerifier, string $codeChallenge): bool
    {
        return \hash_equals(
            \strtr(\rtrim(\base64_encode(\hash('sha256', $codeVerifier, true)), '='), '+/', '-_'),
            $codeChallenge
        );
    }
}
