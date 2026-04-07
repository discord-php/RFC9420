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

interface SenderInterface
{
    public const TYPE_MEMBER = 1;
    public const TYPE_EXTERNAL = 2;
    public const TYPE_NEW_MEMBER_PROPOSAL = 3;
    public const TYPE_NEW_MEMBER_COMMIT = 4;

    public function getType(): int;

    public function getLeafIndex(): ?int;

    public function getSenderIndex(): ?int;
}
