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

use MLS\Credentials\CredentialInterface;
use MLS\Crypto\CipherSuiteInterface;

class BasicKeyPackage implements KeyPackageInterface
{
    protected int $version;
    protected CipherSuiteInterface $suite;
    protected string $initKey;
    protected CredentialInterface $credential;
    protected array $extensions;

    public function __construct(int $version, CipherSuiteInterface $suite, string $initKey, CredentialInterface $credential, array $extensions = [])
    {
        $this->version = $version;
        $this->suite = $suite;
        $this->initKey = $initKey;
        $this->credential = $credential;
        $this->extensions = $extensions;
    }

    public function getProtocolVersion(): int
    {
        return $this->version;
    }

    public function getCipherSuite(): CipherSuiteInterface
    {
        return $this->suite;
    }

    public function getInitKey(): string
    {
        return $this->initKey;
    }

    public function getCredential(): CredentialInterface
    {
        return $this->credential;
    }

    public function getExtensions(): array
    {
        return $this->extensions;
    }

    public function verify(): bool
    {
        // Minimal stub: assume credential verifies signature of KeyPackage
        return true;
    }
}
