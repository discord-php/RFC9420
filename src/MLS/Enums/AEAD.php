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
 * AEAD identifiers referenced by MLS cipher suites (RFC 9420 Table 7).
 */
final class AEAD
{
    public const AES128_GCM = 0x0001;
    public const AES256_GCM = 0x0002;
    public const CHACHA20_POLY1305 = 0x0003;

    protected const NAME_MAP = [
        self::AES128_GCM => 'AES-128-GCM',
        self::AES256_GCM => 'AES-256-GCM',
        self::CHACHA20_POLY1305 => 'ChaCha20Poly1305',
    ];

    public function __construct()
    {
    }

    public static function nameOf(int $value): ?string
    {
        return self::NAME_MAP[$value] ?? null;
    }
}
