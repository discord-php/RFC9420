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

use MLS\Proposal\ProposalListInterface;

interface CommitCreatorInterface
{
    /**
     * Create a Commit from a (validated) proposal list.
     *
     * @param ProposalListInterface $proposals
     * @param array|null            $path      optional path information
     */
    public function createCommit(ProposalListInterface $proposals, ?array $path = null): CommitInterface;
}
