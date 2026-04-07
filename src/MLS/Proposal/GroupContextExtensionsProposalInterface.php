<?php

declare(strict_types=1);

namespace MLS\Proposal;

interface GroupContextExtensionsProposalInterface extends ProposalInterface
{
    /**
     * Return extensions to be merged into the GroupContext.
     *
     * @return array<int,mixed>
     */
    public function getGroupContextExtensions(): array;
}
