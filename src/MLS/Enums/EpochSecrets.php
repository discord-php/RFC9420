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
 * Epoch-derived secrets (RFC 9420 - Table 4).
 */
final class EpochSecrets
{
    public const SENDER_DATA = 'sender data';
    public const ENCRYPTION = 'encryption';
    public const EXPORTER = 'exporter';
    public const EXTERNAL = 'external';
    public const CONFIRM = 'confirm';
    public const MEMBERSHIP = 'membership';
    public const RESUMPTION = 'resumption';
    public const AUTHENTICATION = 'authentication';

    protected const SECRET_NAME = [
        self::SENDER_DATA => 'sender_data',
        self::ENCRYPTION => 'encryption_secret',
        self::EXPORTER => 'exporter_secret',
        self::EXTERNAL => 'external_secret',
        self::CONFIRM => 'confirmation_key',
        self::MEMBERSHIP => 'membership_key',
        self::RESUMPTION => 'resumption_psk',
        self::AUTHENTICATION => 'epoch_authenticator',
    ];

    protected const PURPOSE = [
        self::SENDER_DATA => 'Deriving keys to encrypt sender data',
        self::ENCRYPTION => 'Deriving message encryption keys (via the secret tree)',
        self::EXPORTER => 'Deriving exported secrets',
        self::EXTERNAL => 'Deriving the external init key',
        self::CONFIRM => 'Computing the confirmation MAC for an epoch',
        self::MEMBERSHIP => 'Computing the membership MAC for a PublicMessage',
        self::RESUMPTION => 'Proving membership in this epoch (via a PSK injected later)',
        self::AUTHENTICATION => 'Confirming that two clients have the same view of the group',
    ];

    public function __construct()
    {
    }

    /**
     * Return all labels as defined in Table 4.
     *
     * @return string[]
     */
    public static function labels(): array
    {
        return array_keys(self::SECRET_NAME);
    }

    public static function secretNameOf(string $label): ?string
    {
        return self::SECRET_NAME[$label] ?? null;
    }

    public static function purposeOf(string $label): ?string
    {
        return self::PURPOSE[$label] ?? null;
    }
}
