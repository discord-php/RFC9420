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
 * Hash algorithms referenced in MLS cipher suites (Table 7).
 */
final class HashAlgorithm
{
    public const SHA256 = 'SHA256';
    public const SHA384 = 'SHA384';
    public const SHA512 = 'SHA512';

    protected const NAME_MAP = [
        self::SHA256 => 'SHA-256',
        self::SHA384 => 'SHA-384',
        self::SHA512 => 'SHA-512',
    ];

    public function __construct()
    {
    }

    public static function nameOf(string $value): ?string
    {
        return self::NAME_MAP[$value] ?? null;
    }
}
