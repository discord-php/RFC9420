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

interface ExternalProposalInterface extends ProposalInterface
{
    /**
     * External proposals are proposals originating outside the group (e.g., sent by a third party).
     * Return the external payload for inspection.
     *
     * @return mixed
     */
    public function getExternalPayload(): mixed;
}
