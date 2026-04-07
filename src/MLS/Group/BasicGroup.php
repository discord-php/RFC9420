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

use MLS\Proposal\ProposalListInterface;
use MLS\Proposal\BasicProposal;
use MLS\Message\BasicSender;
use MLS\Commit\BasicCommit;
use MLS\Commit\CommitInterface;
use MLS\Crypto\BasicCipherSuite;
use MLS\Crypto\CipherSuiteInterface;
use MLS\Message\MLSMessageInterface;
use MLS\Proposal\ProposalInterface;

class BasicGroup implements GroupInterface
{
    protected string $groupId;
    protected int $epoch = 0;
    protected BasicGroupContext $context;
    protected array $members = [];
    protected BasicCipherSuite $suite;

    public function __construct(string $groupId, ?BasicGroupContext $context = null)
    {
        $this->groupId = $groupId;
        $this->context = $context ?? new BasicGroupContext($groupId, 0, '', '');
        $this->suite = new BasicCipherSuite();
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getEpoch(): int
    {
        return $this->epoch;
    }

    public function getContext(): GroupContextInterface
    {
        return $this->context;
    }

    public function addMember(string $identity): ProposalInterface
    {
        $p = new BasicProposal('add', new BasicSender(BasicSender::TYPE_NEW_MEMBER_PROPOSAL), ['identity' => $identity]);

        return $p;
    }

    public function removeMember(string $identity): ProposalInterface
    {
        $p = new BasicProposal('remove', new BasicSender(BasicSender::TYPE_NEW_MEMBER_PROPOSAL), ['identity' => $identity]);

        return $p;
    }

    public function commit(ProposalListInterface $proposals): CommitInterface
    {
        $commit = new BasicCommit(new BasicSender(BasicSender::TYPE_NEW_MEMBER_COMMIT), $proposals->getProposals());

        return $commit;
    }

    public function applyCommit(CommitInterface $commit): void
    {
        foreach ($commit->getProposals() as $proposal) {
            $type = $proposal->getType();
            $data = $proposal->getProposal();
            $identity = $data['identity'] ?? null;

            if ($type === 'add' && $identity !== null) {
                if (! in_array($identity, $this->members, true)) {
                    $this->members[] = $identity;
                }
            }

            if ($type === 'remove' && $identity !== null) {
                $this->members = array_values(array_filter($this->members, fn ($m) => $m !== $identity));
            }
        }

        $this->epoch++;
    }

    public function handleMessage(MLSMessageInterface $message): void
    {
        // Not yet implemented for examples/test
    }

    public function getCipherSuite(): CipherSuiteInterface
    {
        return $this->suite;
    }

    public function getMembers(): array
    {
        return $this->members;
    }
}
