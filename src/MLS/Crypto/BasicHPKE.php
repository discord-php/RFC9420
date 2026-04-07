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

namespace MLS\Crypto;

class BasicHPKE implements HPKEInterface
{
    public function deriveKeyPair(int $kemId): array
    {
        // Minimal deterministic key pair for testing
        $sk = hash('sha256', 'sk|'.$kemId);
        $pk = hash('sha256', 'pk|'.$kemId);

        return ['sk' => $sk, 'pk' => $pk];
    }

    public function seal(string $recipientPublicKey, string $plaintext, string $info = ''): string
    {
        // Not a real HPKE seal; create a simple envelope for examples/tests
        $enc = base64_encode('enc:'.$recipientPublicKey.':'.$info);
        $ct = base64_encode($plaintext);

        return $enc.'|'.$ct;
    }

    public function open(string $enc, string $ciphertext, string $info = ''): string
    {
        // Match the simple envelope used in seal()
        $parts = explode('|', $enc.'|'.$ciphertext);
        if (count($parts) < 2) {
            return '';
        }

        $ct = $parts[count($parts) - 1];

        return base64_decode($ct) ?: '';
    }
}
