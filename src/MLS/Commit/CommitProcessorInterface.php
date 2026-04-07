<?php

declare(strict_types=1);

namespace MLS\Commit;

interface CommitProcessorInterface
{
    /**
     * Process an incoming Commit and apply changes to group state.
     *
     * @param CommitInterface $commit
     * @return array<int,mixed> results or updated state details
     */
    public function processCommit(CommitInterface $commit): array;
}
