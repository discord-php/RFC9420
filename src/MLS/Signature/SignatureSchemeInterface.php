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

namespace MLS\Signature;

interface SignatureSchemeInterface
{
    public function getId(): int;

    public function sign(string $message, string $privateKey): string;

    public function verify(string $message, string $signature, string $publicKey): bool;
}
