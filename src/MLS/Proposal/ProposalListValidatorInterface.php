<?php

declare(strict_types=1);

namespace MLS\Proposal;

interface ProposalListValidatorInterface
{
    /**
     * Validate a proposal list according to group state and RFC rules.
     *
     * @param ProposalListInterface $list
     * @return bool true when valid
     */
    public function validate(ProposalListInterface $list): bool;

    /**
     * Return validation errors if any.
     *
     * @return array<int,string>
     */
    public function getErrors(): array;
}
