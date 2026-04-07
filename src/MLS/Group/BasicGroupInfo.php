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

namespace MLS\Group;

use MLS\Credentials\CredentialInterface;
use MLS\Tree\TreeInterface;

class BasicGroupInfo implements GroupInfoInterface
{
    protected string $groupId;
    protected int $epoch;
    protected ?TreeInterface $tree;
    protected string $confirmedTranscriptHash;
    protected array $extensions;
    protected CredentialInterface $signer;

    /** @param \MLS\Extensions\ExtensionInterface[] $extensions */
    public function __construct(string $groupId, int $epoch, ?TreeInterface $tree, string $cth, array $extensions, CredentialInterface $signer)
    {
        $this->groupId = $groupId;
        $this->epoch = $epoch;
        $this->tree = $tree;
        $this->confirmedTranscriptHash = $cth;
        $this->extensions = $extensions;
        $this->signer = $signer;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getEpoch(): int
    {
        return $this->epoch;
    }

    public function getTree(): ?TreeInterface
    {
        return $this->tree;
    }

    public function getConfirmedTranscriptHash(): string
    {
        return $this->confirmedTranscriptHash;
    }

    public function getExtensions(): array
    {
        return $this->extensions;
    }

    public function getSigner(): CredentialInterface
    {
        return $this->signer;
    }

    public function verifySignature(string $signature): bool
    {
        // Delegates to signer for verification where appropriate; stubbed for now.
        return $this->signer->verifySignature($this->confirmedTranscriptHash, $signature);
    }
}
