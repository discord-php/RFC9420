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

use MLS\Message\SenderInterface;

interface CommitInterface
{
    public function getSender(): SenderInterface;

    public function getProposals(): array;

    public function getPath(): ?array;

    public function getSignature(): string;
}
