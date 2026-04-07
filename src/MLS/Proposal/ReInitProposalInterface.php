<?php

declare(strict_types=1);

namespace MLS\Proposal;

use MLS\Group\GroupInfoInterface;

interface ReInitProposalInterface extends ProposalInterface
{
    public function getNewGroupInfo(): GroupInfoInterface;
}
