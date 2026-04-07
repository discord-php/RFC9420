<?php

declare(strict_types=1);

namespace MLS\Enums;

/**
 * HPKE KEM identifiers used by MLS (RFC 9420 Table 7)
 */
final class KEM
{
    public const DHKEM_P256 = 0x0010;
    public const DHKEM_P384 = 0x0011;
    public const DHKEM_P521 = 0x0012;
    public const DHKEM_X25519 = 0x0020;
    public const DHKEM_X448 = 0x0021;

    protected const NAME_MAP = [
        self::DHKEM_P256 => 'DHKEM(P-256)',
        self::DHKEM_P384 => 'DHKEM(P-384)',
        self::DHKEM_P521 => 'DHKEM(P-521)',
        self::DHKEM_X25519 => 'DHKEM(X25519)',
        self::DHKEM_X448 => 'DHKEM(X448)',
    ];

    public function __construct()
    {
    }

    public static function nameOf(int $value): ?string
    {
        return self::NAME_MAP[$value] ?? null;
    }
}
