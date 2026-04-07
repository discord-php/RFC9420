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

use MLS\Handshake\KeyPackageBundleInterface;

interface GroupMembershipInterface
{
    /**
     * Add members to the group. Accepts a KeyPackage bundle.
     *
     * @param  \MLS\Handshake\KeyPackageBundleInterface $bundle
     * @return array<int,mixed>
     */
    public function addMembers(KeyPackageBundleInterface $bundle): array;

    /**
     * Remove members by identity or index. Returns proposals or identifiers.
     *
     * @param  array            $identifiers
     * @return array<int,mixed>
     */
    public function removeMembers(array $identifiers): array;
}
