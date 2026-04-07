<?php

declare(strict_types=1);

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
