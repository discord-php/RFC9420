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

namespace MLS\Handshake;

interface KeyPackageBundleInterface
{
    /**
     * @return KeyPackageInterface[]
     */
    public function getKeyPackages(): array;

    /**
     * Any PSKs or other associated secrets carried alongside the bundle.
     * @return array<string,mixed>
     */
    public function getAssociatedSecrets(): array;

    /**
     * Any extensions attached to the bundle.
     * @return array
     */
    public function getExtensions(): array;

    /**
     * Verify integrity/signatures for all contained KeyPackages.
     */
    public function verifyAll(): bool;

    /**
     * Serialize the bundle for transport.
     */
    public function serialize(): string;
}
