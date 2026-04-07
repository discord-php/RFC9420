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
 * MLS Signature Labels (RFC 9420 - Section 17.6).
 */
final class SignatureLabels
{
    public const FRAMED_CONTENT_TBS = 'FramedContentTBS';
    public const LEAF_NODE_TBS = 'LeafNodeTBS';
    public const KEY_PACKAGE_TBS = 'KeyPackageTBS';
    public const GROUP_INFO_TBS = 'GroupInfoTBS';

    protected const RECOMMENDED = [
        self::FRAMED_CONTENT_TBS => true,
        self::LEAF_NODE_TBS => true,
        self::KEY_PACKAGE_TBS => true,
        self::GROUP_INFO_TBS => true,
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
