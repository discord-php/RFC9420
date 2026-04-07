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

namespace MLS\Commit;

class UpdatePathNode implements UpdatePathNodeInterface
{
    protected string $publicKey;
    protected string $encryptedPathSecret;

    public function __construct(string $publicKey, string $encryptedPathSecret)
    {
        $this->publicKey = $publicKey;
        $this->encryptedPathSecret = $encryptedPathSecret;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getEncryptedPathSecret(): string
    {
        return $this->encryptedPathSecret;
    }
}
