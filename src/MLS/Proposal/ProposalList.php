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

class ProposalList implements ProposalListInterface
{
    /** @var ProposalInterface[] */
    protected array $proposals = [];

    /** @param ProposalInterface[] $proposals */
    public function __construct(array $proposals = [])
    {
        foreach ($proposals as $p) {
            $this->addProposal($p);
        }
    }

    /** @return ProposalInterface[] */
    public function getProposals(): array
    {
        return $this->proposals;
    }

    public function addProposal(ProposalInterface $proposal): void
    {
        $this->proposals[] = $proposal;
    }

    public function count(): int
    {
        return count($this->proposals);
    }
}
