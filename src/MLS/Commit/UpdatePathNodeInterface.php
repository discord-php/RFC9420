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

interface UpdatePathNodeInterface
{
    /**
     * Public key for this path node (serialized public key bytes).
     */
    public function getPublicKey(): string;

    /**
     * Encrypted path secret for this node (serialized bytes).
     */
    public function getEncryptedPathSecret(): string;
}
