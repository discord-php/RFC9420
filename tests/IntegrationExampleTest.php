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

use MLS\Handshake\KeyPackageBundle;
use MLS\Proposal\ProposalList;
use MLS\Proposal\BasicProposal;
use MLS\Message\BasicSender;
use MLS\Crypto\BasicCipherSuite;
use MLS\Credentials\BasicCredential;
use MLS\Handshake\BasicKeyPackage;
use PHPUnit\Framework\TestCase;

final class IntegrationExampleTest extends TestCase
{
    public function testWireDtoObjectsTogether(): void
    {
        $cred = new BasicCredential('basic', 'dave', 'pub');
        $kp = new BasicKeyPackage(1, new BasicCipherSuite(), 'ikm', $cred);
        $bundle = new KeyPackageBundle([$kp]);

        $sender = new BasicSender(BasicSender::TYPE_NEW_MEMBER_PROPOSAL, null, null);
        $proposal = new BasicProposal('add', $sender, ['keypackage' => $kp->getInitKey()]);
        $plist = new ProposalList([$proposal]);

        $this->assertEquals(1, $bundle->getKeyPackages()[0]->getProtocolVersion());
        $this->assertEquals(1, $plist->count());
    }
}
