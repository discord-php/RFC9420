<?php

declare(strict_types=1);

namespace MLS\Enums;

/**
 * KDF identifiers referenced by MLS cipher suites (RFC 9420 Table 7)
 */
final class KDF
{
    public const HKDF_SHA256 = 0x0001;
    public const HKDF_SHA384 = 0x0002;
    public const HKDF_SHA512 = 0x0003;

    protected const NAME_MAP = [
        self::HKDF_SHA256 => 'HKDF-SHA256',
        self::HKDF_SHA384 => 'HKDF-SHA384',
        self::HKDF_SHA512 => 'HKDF-SHA512',
    ];

    public function __construct()
    {
    }

    public static function nameOf(int $value): ?string
    {
        return self::NAME_MAP[$value] ?? null;
    }
}
