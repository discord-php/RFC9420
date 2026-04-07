<?php

declare(strict_types=1);

/*
 * This file is a part of the DiscordPHP-RFC9420 project.
 *
 * Copyright (c) 2026-present Valithor Obsidion <valithor@discordphp.org>
 *
 * This file is subject to the MIT license that is bundled
 * with this source code in the LICENSE.md file.
 */

namespace MLS\Credentials;

class BasicCredential implements CredentialInterface
{
    protected string $type;
    protected string $identity;
    protected string $publicKey;

    public function __construct(string $type, string $identity, string $publicKey)
    {
        $this->type = $type;
        $this->identity = $identity;
        $this->publicKey = $publicKey;
    }

    public function getCredentialType(): string
    {
        return $this->type;
    }

    public function getIdentity(): string
    {
        return $this->identity;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function verifySignature(string $message, string $signature): bool
    {
        // Minimal stub: concrete implementations should verify with the proper algorithm.
        return false;
    }

    public function __toString(): string
    {
        return $this->identity;
    }
}
