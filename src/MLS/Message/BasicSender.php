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

class BasicSender implements SenderInterface
{
    protected int $type;
    protected ?int $leafIndex;
    protected ?int $senderIndex;

    public function __construct(int $type = self::TYPE_MEMBER, ?int $leafIndex = null, ?int $senderIndex = null)
    {
        $this->type = $type;
        $this->leafIndex = $leafIndex;
        $this->senderIndex = $senderIndex;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getLeafIndex(): ?int
    {
        return $this->leafIndex;
    }

    public function getSenderIndex(): ?int
    {
        return $this->senderIndex;
    }
}
