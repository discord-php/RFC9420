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

namespace MLS\Tree;

use MLS\Credentials\CredentialInterface;

class LeafNode implements LeafNodeInterface
{
    protected string $identity;
    protected ?CredentialInterface $credential;
    protected ?string $publicKey;

    public function __construct(string $identity, ?CredentialInterface $credential = null, ?string $publicKey = null)
    {
        $this->identity = $identity;
        $this->credential = $credential;
        $this->publicKey = $publicKey;
    }

    public function getIdentity(): string
    {
        return $this->identity;
    }

    public function getCredential(): ?CredentialInterface
    {
        return $this->credential;
    }

    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }
}
