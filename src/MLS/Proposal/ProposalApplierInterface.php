<?php

declare(strict_types=1);

namespace MLS\Proposal;

interface ProposalApplierInterface
{
    /**
     * Apply a validated proposal list to group state and return any resulting actions (e.g., updates).
     *
     * @param ProposalListInterface $list
     * @return array<int,mixed>
     */
    public function apply(ProposalListInterface $list): array;
}
