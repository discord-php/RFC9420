<?php

declare(strict_types=1);

namespace MLS\Enums;

/**
 * MLS Proposal Types (RFC 9420 - Section 17.4, Table 10).
 * Numeric values match the RFC registry (two-byte identifiers).
 * Helper maps provide name and metadata (recommended, external, path required).
 */
final class ProposalType
{
    public const RESERVED = 0x0000;
    public const ADD = 0x0001;
    public const UPDATE = 0x0002;
    public const REMOVE = 0x0003;
    public const PRE_SHARED_KEY = 0x0004; // psk
    public const REINIT = 0x0005;
    public const EXTERNAL_INIT = 0x0006;
    public const GROUP_CONTEXT_EXTENSIONS = 0x0007;

    // GREASE values from RFC 9420
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

    // Private use range
    public const PRIVATE_USE_START = 0xF000;
    public const PRIVATE_USE_END = 0xFFFF;

    protected const NAME_MAP = [
        self::RESERVED => 'reserved',
        self::ADD => 'add',
        self::UPDATE => 'update',
        self::REMOVE => 'remove',
        self::PRE_SHARED_KEY => 'psk',
        self::REINIT => 'reinit',
        self::EXTERNAL_INIT => 'external_init',
        self::GROUP_CONTEXT_EXTENSIONS => 'group_context_extensions',
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

    /**
     * Metadata per proposal type: [recommended(bool), external(?bool), pathRequired(?bool)]
     * Where "?bool" can be null when RFC marks '-' (not applicable/unspecified).
     */
    private const META = [
        self::RESERVED => [false, null, null],
        self::ADD => [true, true, false],
        self::UPDATE => [true, false, true],
        self::REMOVE => [true, true, true],
        self::PRE_SHARED_KEY => [true, true, false],
        self::REINIT => [true, true, false],
        self::EXTERNAL_INIT => [true, false, true],
        self::GROUP_CONTEXT_EXTENSIONS => [true, true, true],
        self::GREASE_0A0A => [true, null, null],
        self::GREASE_1A1A => [true, null, null],
        self::GREASE_2A2A => [true, null, null],
        self::GREASE_3A3A => [true, null, null],
        self::GREASE_4A4A => [true, null, null],
        self::GREASE_5A5A => [true, null, null],
        self::GREASE_6A6A => [true, null, null],
        self::GREASE_7A7A => [true, null, null],
        self::GREASE_8A8A => [true, null, null],
        self::GREASE_9A9A => [true, null, null],
        self::GREASE_AAAA => [true, null, null],
        self::GREASE_BABA => [true, null, null],
        self::GREASE_CACA => [true, null, null],
        self::GREASE_DADA => [true, null, null],
        self::GREASE_EAEA => [true, null, null],
    ];

    public function __construct()
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

    /**
     * Whether the proposal type is recommended (per RFC table).
     */
    public static function isRecommended(int $type): bool
    {
        return isset(self::META[$type]) ? (bool) self::META[$type][0] : false;
    }

    /**
     * Whether this proposal type may be sent by an external sender.
     * Returns true/false or null when not applicable/unspecified.
     */
    public static function isExternal(int $type): ?bool
    {
        return self::META[$type][1] ?? null;
    }

    /**
     * Whether a Commit covering this proposal type must have a path.
     * Returns true/false or null when not applicable/unspecified.
     */
    public static function requiresPath(int $type): ?bool
    {
        return self::META[$type][2] ?? null;
    }

    public static function isPrivateUse(int $type): bool
    {
        return $type >= self::PRIVATE_USE_START && $type <= self::PRIVATE_USE_END;
    }
}
