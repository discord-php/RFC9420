<?php

declare(strict_types=1);

namespace MLS\Enums;

/**
 * MLS Credential Types (RFC 9420 - Section 17.5, Table 11).
 */
final class CredentialType
{
    public const RESERVED = 0x0000;
    public const BASIC = 0x0001;
    public const X509 = 0x0002;

    // GREASE values
    public const GREASE_0A0A = 0x0A0A;
    public const GREASE_1A1A = 0x1A1A;
    public const GREASE_2A2A = 0x2A2A;
    public const GREASE_3A3A = 0x3A3A;
    public const GREASE_4A4A = 0x4A4A;
    public const GREASE_5A5A = 0x5A5A;
    public const GREASE_6A6A = 0x6A6A;
    public const GREASE_7A7A = 0x7A7A;
    public const GREASE_8A8A = 0x8A8A;
    public const GREASE_9A9A = 0x9A9A;
    public const GREASE_AAAA = 0xAAAA;
    public const GREASE_BABA = 0xBABA;
    public const GREASE_CACA = 0xCACA;
    public const GREASE_DADA = 0xDADA;
    public const GREASE_EAEA = 0xEAEA;

    public const PRIVATE_USE_START = 0xF000;
    public const PRIVATE_USE_END = 0xFFFF;

    private const NAME_MAP = [
        self::RESERVED => 'reserved',
        self::BASIC => 'basic',
        self::X509 => 'x509',
        self::GREASE_0A0A => 'grease_0a0a',
        self::GREASE_1A1A => 'grease_1a1a',
        self::GREASE_2A2A => 'grease_2a2a',
        self::GREASE_3A3A => 'grease_3a3a',
        self::GREASE_4A4A => 'grease_4a4a',
        self::GREASE_5A5A => 'grease_5a5a',
        self::GREASE_6A6A => 'grease_6a6a',
        self::GREASE_7A7A => 'grease_7a7a',
        self::GREASE_8A8A => 'grease_8a8a',
        self::GREASE_9A9A => 'grease_9a9a',
        self::GREASE_AAAA => 'grease_aaaa',
        self::GREASE_BABA => 'grease_baba',
        self::GREASE_CACA => 'grease_caca',
        self::GREASE_DADA => 'grease_dada',
        self::GREASE_EAEA => 'grease_eaea',
    ];

    private const RECOMMENDED = [
        self::BASIC => true,
        self::X509 => true,
    ];

    private function __construct()
    {
    }

    public static function nameOf(int $type): ?string
    {
        if (isset(self::NAME_MAP[$type])) {
            return self::NAME_MAP[$type];
        }

        if ($type >= self::PRIVATE_USE_START && $type <= self::PRIVATE_USE_END) {
            return 'private_use';
        }

        return null;
    }

    public static function isRecommended(int $type): ?bool
    {
        return self::RECOMMENDED[$type] ?? null;
    }

    public static function isPrivateUse(int $type): bool
    {
        return $type >= self::PRIVATE_USE_START && $type <= self::PRIVATE_USE_END;
    }
}
