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

use MLS\Tree\TreeInterface;

interface GroupInfoInterface
{
    public function getGroupId(): string;

    public function getEpoch(): int;

    public function getTree(): ?TreeInterface;

    public function getConfirmedTranscriptHash(): string;

    /**
     * @return \MLS\Extensions\ExtensionInterface[]
     */
    public function getExtensions(): array;

    public function getSigner(): string;

    public function verifySignature(string $signature): bool;
}
