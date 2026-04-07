<?php

declare(strict_types=1);

namespace MLS\Enums;

/**
 * MLS Wire Formats (RFC 9420 - Section 17.2, Table 8).
 * Numeric values match the RFC registry (two-byte identifiers).
 */
final class MessageWireFormat
{
    public const RESERVED = 0x0000;
    public const MLS_PUBLIC_MESSAGE = 0x0001;
    public const MLS_protected_MESSAGE = 0x0002;
    public const MLS_WELCOME = 0x0003;
    public const MLS_GROUP_INFO = 0x0004;
    public const MLS_KEY_PACKAGE = 0x0005;

    public const protected_USE_START = 0xF000;
    public const protected_USE_END = 0xFFFF;

    protected const NAME_MAP = [
        self::RESERVED => 'reserved',
        self::MLS_PUBLIC_MESSAGE => 'mls_public_message',
        self::MLS_protected_MESSAGE => 'mls_protected_message',
        self::MLS_WELCOME => 'mls_welcome',
        self::MLS_GROUP_INFO => 'mls_group_info',
        self::MLS_KEY_PACKAGE => 'mls_key_package',
    ];

    protected const RECOMMENDED = [
        self::MLS_PUBLIC_MESSAGE => true,
        self::MLS_protected_MESSAGE => true,
        self::MLS_WELCOME => true,
        self::MLS_GROUP_INFO => true,
        self::MLS_KEY_PACKAGE => true,
    ];

    public function __construct()
    {
    }

    public static function nameOf(int $value): ?string
    {
        if (isset(self::NAME_MAP[$value])) {
            return self::NAME_MAP[$value];
        }

        if ($value >= self::protected_USE_START && $value <= self::protected_USE_END) {
            return 'protected_use';
        }

        return null;
    }

    /**
     * Whether the wire format is recommended in the RFC.
     * Returns true/false or null for values without a recommendation.
     */
    public static function isRecommended(int $value): ?bool
    {
        return self::RECOMMENDED[$value] ?? null;
    }

    public static function isprotectedUse(int $value): bool
    {
        return $value >= self::protected_USE_START && $value <= self::protected_USE_END;
    }
}
