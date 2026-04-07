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

namespace MLS\Message;

use MLS\Credentials\CredentialInterface;

interface MLSPlaintextInterface
{
    public function getGroupId(): string;

    public function getEpoch(): int;

    public function getSender(): string;

    public function getAuthenticatedData(): ?string;

    public function getContent(): mixed;

    public function getSignature(): string;

    public function verify(CredentialInterface $cred): bool;
}
