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

use MLS\Commit\UpdatePath;
use MLS\Commit\UpdatePathNode;
use MLS\Tree\LeafNode;
use MLS\Credentials\BasicCredential;
use PHPUnit\Framework\TestCase;

final class UpdatePathDtoTest extends TestCase
{
    public function testUpdatePathAndNodes(): void
    {
        $cred = new BasicCredential('basic', 'erin', 'pk');
        $leaf = new LeafNode('erin', $cred, 'pub');
        $node = new UpdatePathNode('pubkey', 'secret');
        $path = new UpdatePath($leaf, [$node]);

        $this->assertEquals('erin', $path->getLeafNode()->getIdentity());
        $this->assertCount(1, $path->getNodes());
        $this->assertEquals('pubkey', $path->getNodes()[0]->getPublicKey());
    }
}
