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

namespace MLS;

use MLS\Crypto\CipherSuiteInterface;
use MLS\Group\GroupInterface;

interface MLSInterface
{
    public function createGroup(string $groupId, CipherSuiteInterface $ciphers): GroupInterface;

    public function loadGroup(string $groupId): ?GroupInterface;

    public function listGroups(): array;
}
