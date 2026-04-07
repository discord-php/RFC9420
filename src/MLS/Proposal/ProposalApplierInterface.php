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

namespace MLS\Proposal;

interface ProposalApplierInterface
{
    /**
     * Apply a validated proposal list to group state and return any resulting actions (e.g., updates).
     *
     * @param  ProposalListInterface $list
     * @return array<int,mixed>
     */
    public function apply(ProposalListInterface $list): array;
}
