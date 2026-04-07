<?php

declare(strict_types=1);

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
