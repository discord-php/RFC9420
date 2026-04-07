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

class KeyPackageBundle implements KeyPackageBundleInterface
{
    /** @var KeyPackageInterface[] */
    protected array $keyPackages = [];
    /** @var array<string,mixed> */
    protected array $associatedSecrets = [];
    /** @var array */
    protected array $extensions = [];

    /** @param KeyPackageInterface[] $keyPackages */
    public function __construct(array $keyPackages = [], array $associatedSecrets = [], array $extensions = [])
    {
        $this->keyPackages = $keyPackages;
        $this->associatedSecrets = $associatedSecrets;
        $this->extensions = $extensions;
    }

    /** @return KeyPackageInterface[] */
    public function getKeyPackages(): array
    {
        return $this->keyPackages;
    }

    /** @return array<string,mixed> */
    public function getAssociatedSecrets(): array
    {
        return $this->associatedSecrets ?? [];
    }

    /** @return array */
    public function getExtensions(): array
    {
        return $this->extensions ?? [];
    }

    public function verifyAll(): bool
    {
        foreach ($this->getKeyPackages() as $kp) {
            if (! $kp->verify()) {
                return false;
            }
        }

        return true;
    }

    public function serialize(): string
    {
        // Minimal stable serialization for testing; concrete implementations should use real encodings
        return json_encode([
            'count' => count($this->keyPackages),
        ]);
    }
}
