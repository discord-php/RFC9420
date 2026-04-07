<?php

declare(strict_types=1);

namespace MLS\Proposal;

interface ProposalListInterface
{
    /** @return ProposalInterface[] */
    public function getProposals(): array;

    public function addProposal(ProposalInterface $proposal): void;

    public function count(): int;
}
