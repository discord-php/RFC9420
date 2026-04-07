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

namespace MLS\Proposal;

use MLS\Message\SenderInterface;

class BasicProposal implements ProposalInterface
{
    protected string $type;
    protected SenderInterface $sender;
    protected array $proposal;

    public function __construct(string $type, SenderInterface $sender, array $proposal = [])
    {
        $this->type = $type;
        $this->sender = $sender;
        $this->proposal = $proposal;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getSender(): SenderInterface
    {
        return $this->sender;
    }

    public function getProposal(): array
    {
        return $this->proposal;
    }
}
