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

namespace MLS\Commit;

use MLS\Message\SenderInterface;

class BasicCommit implements CommitInterface
{
    private SenderInterface $sender;
    /** @var \MLS\Proposal\ProposalInterface[] */
    private array $proposals;
    private ?UpdatePathInterface $path;

    /** @param \MLS\Proposal\ProposalInterface[] $proposals */
    public function __construct(SenderInterface $sender, array $proposals = [], ?UpdatePathInterface $path = null)
    {
        $this->sender = $sender;
        $this->proposals = $proposals;
        $this->path = $path;
    }

    public function getSender(): SenderInterface
    {
        return $this->sender;
    }

    public function getProposals(): array
    {
        return $this->proposals;
    }

    public function getPath(): ?UpdatePathInterface
    {
        return $this->path;
    }

    public function getSignature(): string
    {
        return '';
    }
}
