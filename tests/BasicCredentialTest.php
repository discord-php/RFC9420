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

use MLS\Credentials\BasicCredential;
use PHPUnit\Framework\TestCase;

final class BasicCredentialTest extends TestCase
{
    public function testCredentialToStringAndAccessors(): void
    {
        $c = new BasicCredential('basic', 'carol', 'pk');
        $this->assertEquals('basic', $c->getCredentialType());
        $this->assertEquals('carol', $c->getIdentity());
        $this->assertEquals('pk', $c->getPublicKey());
        $this->assertEquals('carol', (string) $c);
    }
}
