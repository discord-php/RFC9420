<?php

declare(strict_types=1);

namespace MLS\Enums;

/**
 * MLS Cipher Suites (RFC 9420 - Section 17.1, Tables 6 & 7)
 */
final class CipherSuite
{
    public const RESERVED = 0x0000;

    public const MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519 = 0x0001;
    public const MLS_128_DHKEMP256_AES128GCM_SHA256_P256 = 0x0002;
    public const MLS_128_DHKEMX25519_CHACHA20POLY1305_SHA256_Ed25519 = 0x0003;
    public const MLS_256_DHKEMX448_AES256GCM_SHA512_Ed448 = 0x0004;
    public const MLS_256_DHKEMP521_AES256GCM_SHA512_P521 = 0x0005;
    public const MLS_256_DHKEMX448_CHACHA20POLY1305_SHA512_Ed448 = 0x0006;
    public const MLS_256_DHKEMP384_AES256GCM_SHA384_P384 = 0x0007;

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

    protected const NAME_MAP = [
        self::RESERVED => 'reserved',
        self::MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519 => 'MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519',
        self::MLS_128_DHKEMP256_AES128GCM_SHA256_P256 => 'MLS_128_DHKEMP256_AES128GCM_SHA256_P256',
        self::MLS_128_DHKEMX25519_CHACHA20POLY1305_SHA256_Ed25519 => 'MLS_128_DHKEMX25519_CHACHA20POLY1305_SHA256_Ed25519',
        self::MLS_256_DHKEMX448_AES256GCM_SHA512_Ed448 => 'MLS_256_DHKEMX448_AES256GCM_SHA512_Ed448',
        self::MLS_256_DHKEMP521_AES256GCM_SHA512_P521 => 'MLS_256_DHKEMP521_AES256GCM_SHA512_P521',
        self::MLS_256_DHKEMX448_CHACHA20POLY1305_SHA512_Ed448 => 'MLS_256_DHKEMX448_CHACHA20POLY1305_SHA512_Ed448',
        self::MLS_256_DHKEMP384_AES256GCM_SHA384_P384 => 'MLS_256_DHKEMP384_AES256GCM_SHA384_P384',
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

    // Recommended flags per registry (true = recommended)
    protected const RECOMMENDED = [
        self::MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519 => true,
        self::MLS_128_DHKEMP256_AES128GCM_SHA256_P256 => true,
        self::MLS_128_DHKEMX25519_CHACHA20POLY1305_SHA256_Ed25519 => true,
        self::MLS_256_DHKEMX448_AES256GCM_SHA512_Ed448 => true,
        self::MLS_256_DHKEMP521_AES256GCM_SHA512_P521 => true,
        self::MLS_256_DHKEMX448_CHACHA20POLY1305_SHA512_Ed448 => true,
        self::MLS_256_DHKEMP384_AES256GCM_SHA384_P384 => true,
        self::GREASE_0A0A => true,
        self::GREASE_1A1A => true,
        self::GREASE_2A2A => true,
        self::GREASE_3A3A => true,
        self::GREASE_4A4A => true,
        self::GREASE_5A5A => true,
        self::GREASE_6A6A => true,
        self::GREASE_7A7A => true,
        self::GREASE_8A8A => true,
        self::GREASE_9A9A => true,
        self::GREASE_AAAA => true,
        self::GREASE_BABA => true,
        self::GREASE_CACA => true,
        self::GREASE_DADA => true,
        self::GREASE_EAEA => true,
    ];

    // Component mapping per cipher suite (Table 7)
    protected const COMPONENTS = [
        self::MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519 => [
            'kem' => 0x0020,
            'kdf' => 0x0001,
            'aead' => 0x0001,
            'hash' => 'SHA256',
            'signature' => 'ed25519',
        ],
        self::MLS_128_DHKEMP256_AES128GCM_SHA256_P256 => [
            'kem' => 0x0010,
            'kdf' => 0x0001,
            'aead' => 0x0001,
            'hash' => 'SHA256',
            'signature' => 'ecdsa_secp256r1_sha256',
        ],
        self::MLS_128_DHKEMX25519_CHACHA20POLY1305_SHA256_Ed25519 => [
            'kem' => 0x0020,
            'kdf' => 0x0001,
            'aead' => 0x0003,
            'hash' => 'SHA256',
            'signature' => 'ed25519',
        ],
        self::MLS_256_DHKEMX448_AES256GCM_SHA512_Ed448 => [
            'kem' => 0x0021,
            'kdf' => 0x0003,
            'aead' => 0x0002,
            'hash' => 'SHA512',
            'signature' => 'ed448',
        ],
        self::MLS_256_DHKEMP521_AES256GCM_SHA512_P521 => [
            'kem' => 0x0012,
            'kdf' => 0x0003,
            'aead' => 0x0002,
            'hash' => 'SHA512',
            'signature' => 'ecdsa_secp521r1_sha512',
        ],
        self::MLS_256_DHKEMX448_CHACHA20POLY1305_SHA512_Ed448 => [
            'kem' => 0x0021,
            'kdf' => 0x0003,
            'aead' => 0x0003,
            'hash' => 'SHA512',
            'signature' => 'ed448',
        ],
        self::MLS_256_DHKEMP384_AES256GCM_SHA384_P384 => [
            'kem' => 0x0011,
            'kdf' => 0x0002,
            'aead' => 0x0002,
            'hash' => 'SHA384',
            'signature' => 'ecdsa_secp384r1_sha384',
        ],
    ];

    public function __construct()
    {
    }

    public static function nameOf(int $value): ?string
    {
        if (isset(self::NAME_MAP[$value])) {
            return self::NAME_MAP[$value];
        }

        if ($value >= self::PRIVATE_USE_START && $value <= self::PRIVATE_USE_END) {
            return 'private_use';
        }

        return null;
    }

    public static function isRecommended(int $value): ?bool
    {
        return self::RECOMMENDED[$value] ?? null;
    }

    public static function isPrivateUse(int $value): bool
    {
        return $value >= self::PRIVATE_USE_START && $value <= self::PRIVATE_USE_END;
    }

    public static function componentsOf(int $value): ?array
    {
        return self::COMPONENTS[$value] ?? null;
    }

    public static function kemOf(int $value): ?int
    {
        return isset(self::COMPONENTS[$value]) ? self::COMPONENTS[$value]['kem'] : null;
    }

    public static function kdfOf(int $value): ?int
    {
        return isset(self::COMPONENTS[$value]) ? self::COMPONENTS[$value]['kdf'] : null;
    }

    public static function aeadOf(int $value): ?int
    {
        return isset(self::COMPONENTS[$value]) ? self::COMPONENTS[$value]['aead'] : null;
    }

    public static function hashOf(int $value): ?string
    {
        return isset(self::COMPONENTS[$value]) ? self::COMPONENTS[$value]['hash'] : null;
    }

    public static function signatureOf(int $value): ?string
    {
        return isset(self::COMPONENTS[$value]) ? self::COMPONENTS[$value]['signature'] : null;
    }
}
