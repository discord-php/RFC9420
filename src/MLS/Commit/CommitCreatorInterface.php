<?php

declare(strict_types=1);

namespace MLS\Commit;

use MLS\Proposal\ProposalListInterface;

interface CommitCreatorInterface
{
    /**
     * Create a Commit from a (validated) proposal list.
     *
     * @param ProposalListInterface $proposals
     * @param array|null $path optional path information
     */
    public function createCommit(ProposalListInterface $proposals, ?array $path = null): CommitInterface;
}
