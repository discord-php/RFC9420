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

use MLS\Proposal\ProposalList;
use MLS\Proposal\BasicProposal;
use MLS\Message\BasicSender;
use PHPUnit\Framework\TestCase;

final class ProposalListTest extends TestCase
{
    public function testAddAndCountProposals(): void
    {
        $sender = new BasicSender();
        $proposal = new BasicProposal('add', $sender, ['identity' => 'alice']);
        $list = new ProposalList();
        $this->assertEquals(0, $list->count());
        $list->addProposal($proposal);
        $this->assertEquals(1, $list->count());
        $this->assertSame($proposal, $list->getProposals()[0]);
    }
}
