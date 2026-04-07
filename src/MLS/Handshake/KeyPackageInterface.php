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

namespace MLS\Handshake;

use MLS\Credentials\CredentialInterface;

interface KeyPackageInterface
{
    public function getProtocolVersion(): int;

    public function getCipherSuite(): int;

    public function getInitKey(): string;

    public function getCredential(): CredentialInterface;

    public function getExtensions(): array;

    public function verify(): bool;
}
