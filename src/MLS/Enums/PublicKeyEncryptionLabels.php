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
 * MLS Public Key Encryption Labels (RFC 9420 - Section 17.7).
 */
final class PublicKeyEncryptionLabels
{
    public const UPDATE_PATH_NODE = 'UpdatePathNode';
    public const WELCOME = 'Welcome';

    protected const RECOMMENDED = [
        self::UPDATE_PATH_NODE => true,
        self::WELCOME => true,
    ];

    public function __construct()
    {
    }

    public static function list(): array
    {
        return array_keys(self::RECOMMENDED);
    }

    public static function isRecommended(string $label): bool
    {
        return isset(self::RECOMMENDED[$label]) && self::RECOMMENDED[$label] === true;
    }
}
