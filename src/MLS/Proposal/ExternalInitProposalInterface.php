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

interface ExternalInitProposalInterface extends ProposalInterface
{
    /**
     * External init proposals carry data needed to initialize a group from external context.
     * Return raw payload; implementation-specific parsing is expected.
     *
     * @return mixed
     */
    public function getExternalInitPayload(): mixed;
}
