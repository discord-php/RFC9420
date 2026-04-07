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

interface ProposalListValidatorInterface
{
    /**
     * Validate a proposal list according to group state and RFC rules.
     *
     * @param  ProposalListInterface $list
     * @return bool                  true when valid
     */
    public function validate(ProposalListInterface $list): bool;

    /**
     * Return validation errors if any.
     *
     * @return array<int,string>
     */
    public function getErrors(): array;
}
