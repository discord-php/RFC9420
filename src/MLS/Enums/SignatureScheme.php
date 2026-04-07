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

namespace MLS\Enums;

/**
 * Signature scheme identifiers referenced by MLS cipher suites (Table 7).
 */
final class SignatureScheme
{
    public const ED25519 = 'ed25519';
    public const ECDSA_SECP256R1_SHA256 = 'ecdsa_secp256r1_sha256';
    public const ED448 = 'ed448';
    public const ECDSA_SECP521R1_SHA512 = 'ecdsa_secp521r1_sha512';
    public const ECDSA_SECP384R1_SHA384 = 'ecdsa_secp384r1_sha384';

    protected const RECOMMENDED = [
        self::ED25519 => true,
        self::ECDSA_SECP256R1_SHA256 => true,
        self::ED448 => true,
        self::ECDSA_SECP521R1_SHA512 => true,
        self::ECDSA_SECP384R1_SHA384 => true,
    ];

    public function __construct()
    {
    }

    public static function list(): array
    {
        return array_keys(self::RECOMMENDED);
    }

    public static function isRecommended(string $scheme): bool
    {
        return isset(self::RECOMMENDED[$scheme]) && self::RECOMMENDED[$scheme] === true;
    }
}
