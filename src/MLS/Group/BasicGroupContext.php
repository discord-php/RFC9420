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

namespace MLS\Group;

class BasicGroupContext implements GroupContextInterface
{
    protected string $groupId;
    protected int $epoch;
    protected string $treeHash;
    protected string $cth;
    protected array $extensions;

    public function __construct(string $groupId, int $epoch, string $treeHash, string $cth, array $extensions = [])
    {
        $this->groupId = $groupId;
        $this->epoch = $epoch;
        $this->treeHash = $treeHash;
        $this->cth = $cth;
        $this->extensions = $extensions;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getEpoch(): int
    {
        return $this->epoch;
    }

    public function getTreeHash(): string
    {
        return $this->treeHash;
    }

    public function getConfirmedTranscriptHash(): string
    {
        return $this->cth;
    }

    public function getExtensions(): array
    {
        return $this->extensions;
    }
}
