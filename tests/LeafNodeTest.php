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

use MLS\Tree\LeafNode;
use MLS\Credentials\BasicCredential;
use PHPUnit\Framework\TestCase;

final class LeafNodeTest extends TestCase
{
    public function testLeafNodeAccessors(): void
    {
        $cred = new BasicCredential('basic', 'frank', 'pk');
        $leaf = new LeafNode('frank', $cred, 'pubkey');

        $this->assertEquals('frank', $leaf->getIdentity());
        $this->assertSame($cred, $leaf->getCredential());
        $this->assertEquals('pubkey', $leaf->getPublicKey());
    }
}
