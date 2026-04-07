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

namespace MLS\Group;

use MLS\Commit\CommitInterface;
use MLS\Crypto\CipherSuiteInterface;
use MLS\Message\MLSMessageInterface;
use MLS\Proposal\ProposalInterface;

interface GroupInterface
{
    public function getGroupId(): string;

    public function getEpoch(): int;

    public function getContext(): GroupContextInterface;

    public function addMember(string $identity): ProposalInterface;

    public function removeMember(string $identity): ProposalInterface;

    public function commit(array $proposals): CommitInterface;

    public function applyCommit(CommitInterface $commit): void;

    public function handleMessage(MLSMessageInterface $message): void;

    public function getCipherSuite(): CipherSuiteInterface;
}
