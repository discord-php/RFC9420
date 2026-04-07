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

use MLS\Enums\CipherSuite;
use MLS\Enums\EpochSecrets;
use PHPUnit\Framework\TestCase;

final class RFCEnumsTest extends TestCase
{
    public function testCipherSuitesComponentsMatchRFC(): void
    {
        $suites = [
            CipherSuite::MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519 => [
                'kem' => 0x0020,
                'kdf' => 0x0001,
                'aead' => 0x0001,
                'hash' => 'SHA256',
                'signature' => 'ed25519',
            ],
            CipherSuite::MLS_128_DHKEMP256_AES128GCM_SHA256_P256 => [
                'kem' => 0x0010,
                'kdf' => 0x0001,
                'aead' => 0x0001,
                'hash' => 'SHA256',
                'signature' => 'ecdsa_secp256r1_sha256',
            ],
            CipherSuite::MLS_128_DHKEMX25519_CHACHA20POLY1305_SHA256_Ed25519 => [
                'kem' => 0x0020,
                'kdf' => 0x0001,
                'aead' => 0x0003,
                'hash' => 'SHA256',
                'signature' => 'ed25519',
            ],
            CipherSuite::MLS_256_DHKEMX448_AES256GCM_SHA512_Ed448 => [
                'kem' => 0x0021,
                'kdf' => 0x0003,
                'aead' => 0x0002,
                'hash' => 'SHA512',
                'signature' => 'ed448',
            ],
            CipherSuite::MLS_256_DHKEMP521_AES256GCM_SHA512_P521 => [
                'kem' => 0x0012,
                'kdf' => 0x0003,
                'aead' => 0x0002,
                'hash' => 'SHA512',
                'signature' => 'ecdsa_secp521r1_sha512',
            ],
            CipherSuite::MLS_256_DHKEMX448_CHACHA20POLY1305_SHA512_Ed448 => [
                'kem' => 0x0021,
                'kdf' => 0x0003,
                'aead' => 0x0003,
                'hash' => 'SHA512',
                'signature' => 'ed448',
            ],
            CipherSuite::MLS_256_DHKEMP384_AES256GCM_SHA384_P384 => [
                'kem' => 0x0011,
                'kdf' => 0x0002,
                'aead' => 0x0002,
                'hash' => 'SHA384',
                'signature' => 'ecdsa_secp384r1_sha384',
            ],
        ];

        foreach ($suites as $value => $expected) {
            $components = CipherSuite::componentsOf($value);
            $this->assertIsArray($components, "Components for cipher suite {$value} should be present");
            $this->assertSame($expected['kem'], $components['kem']);
            $this->assertSame($expected['kdf'], $components['kdf']);
            $this->assertSame($expected['aead'], $components['aead']);
            $this->assertSame($expected['hash'], $components['hash']);
            $this->assertSame($expected['signature'], $components['signature']);
        }
    }

    public function testEpochSecretsTable4(): void
    {
        $labels = EpochSecrets::labels();

        $expected = [
            'sender data',
            'encryption',
            'exporter',
            'external',
            'confirm',
            'membership',
            'resumption',
            'authentication',
        ];

        foreach ($expected as $label) {
            $this->assertContains($label, $labels, "EpochSecrets must contain label {$label}");
            $this->assertNotNull(EpochSecrets::secretNameOf($label), "Secret name for {$label} should be defined");
            $this->assertNotNull(EpochSecrets::purposeOf($label), "Purpose for {$label} should be defined");
        }
    }
}
