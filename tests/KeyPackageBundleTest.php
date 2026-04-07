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
use MLS\Handshake\BasicKeyPackage;
use MLS\Crypto\BasicCipherSuite;
use MLS\Credentials\BasicCredential;
use PHPUnit\Framework\TestCase;

final class KeyPackageBundleTest extends TestCase
{
    public function testBundleVerifyAndSerialize(): void
    {
        $cred = new BasicCredential('basic', 'bob', 'pubkey');
        $kp = new BasicKeyPackage(1, new BasicCipherSuite(), 'init', $cred);
        $bundle = new KeyPackageBundle([$kp]);
        $this->assertCount(1, $bundle->getKeyPackages());
        $this->assertTrue($bundle->verifyAll());
        $this->assertStringContainsString('count', $bundle->serialize());
    }
}
