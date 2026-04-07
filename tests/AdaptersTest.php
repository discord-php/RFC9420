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

use MLS\Crypto\BasicKeySchedule;
use MLS\Crypto\BasicHPKE;
use MLS\Crypto\BasicCipherSuite;
use MLS\Group\BasicGroup;
use MLS\Group\BasicGroupContext;
use MLS\Credentials\BasicCredential;
use MLS\Handshake\BasicKeyPackage;
use MLS\Proposal\ProposalList;
use PHPUnit\Framework\TestCase;

final class AdaptersTest extends TestCase
{
    public function testKeyScheduleAndHpkeAdapters(): void
    {
        $ks = new BasicKeySchedule();
        $suite = new BasicCipherSuite();
        $ks->init(['psk1'], $suite);
        $secrets = $ks->deriveEpochSecrets('epoch');
        $this->assertArrayHasKey('sender_data', $secrets);

        $hpke = new BasicHPKE();
        $kp = $hpke->deriveKeyPair(32);
        $this->assertArrayHasKey('sk', $kp);
        $sealed = $hpke->seal($kp['pk'], 'hello');
        $this->assertNotEmpty($sealed);
        [$encPart, $ctPart] = explode('|', $sealed, 2);
        $pt = $hpke->open($encPart, $ctPart, '');
        $this->assertEquals('hello', $pt);
    }

    public function testBasicGroupFlow(): void
    {
        $cred = new BasicCredential('basic', 'gina', 'pk');
        $kp = new BasicKeyPackage(1, new BasicCipherSuite(), 'ikm', $cred);
        $bundle = new \MLS\Handshake\KeyPackageBundle([$kp]);

        $group = new BasicGroup('g1', new BasicGroupContext('g1', 0, '', 'cth'));
        $this->assertEmpty($group->getMembers());
        $proposal = $group->addMember('henry');
        $plist = new ProposalList([$proposal]);
        $commit = $group->commit($plist);
        $this->assertEquals(0, $group->getEpoch());
        $group->applyCommit($commit);
        $this->assertEquals(1, $group->getEpoch());
        $this->assertContains('henry', $group->getMembers());
    }
}
