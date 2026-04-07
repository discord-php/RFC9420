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

namespace MLS\Crypto;

class BasicCipherSuite implements CipherSuiteInterface
{
    protected int $id;

    public function __construct(int $id = 1)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getHpkeKemId(): int
    {
        return 32;
    }

    public function getHpkeKdfId(): int
    {
        return 1;
    }

    public function getHpkeAeadId(): int
    {
        return 1;
    }

    public function getHashLength(): int
    {
        return 32;
    }
}
