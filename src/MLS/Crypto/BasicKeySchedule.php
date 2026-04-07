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

class BasicKeySchedule implements KeyScheduleInterface
{
    protected array $psks = [];
    protected CipherSuiteInterface $suite;

    public function init(array $psks, CipherSuiteInterface $suite): void
    {
        $this->psks = $psks;
        $this->suite = $suite;
    }

    public function deriveWelcomeSecret(string $epochSecret): string
    {
        return $this->hkdf('welcome', $epochSecret, 32);
    }

    public function deriveEpochSecrets(string $epochSecret): array
    {
        $labels = ['sender_data', 'encryption', 'exporter', 'external', 'confirm', 'membership', 'resumption', 'authentication'];
        $out = [];
        foreach ($labels as $label) {
            $out[$label] = $this->hkdf($label, $epochSecret, 32);
        }

        return $out;
    }

    public function exportSecret(string $label, int $length): string
    {
        return $this->hkdf($label, implode('|', $this->psks), $length);
    }

    protected function hkdf(string $label, string $ikm, int $length = 32): string
    {
        // Use SHA-256 HKDF via built-in helper if available
        if (function_exists('hash_hkdf')) {
            return hash_hkdf('sha256', $ikm, $length, $label);
        }

        // Fallback: derive with hash_hmac iteratively
        $salt = '';
        $prk = hash_hmac('sha256', $ikm, $salt, true);
        $t = '';
        $okm = '';
        $counter = 1;
        while (strlen($okm) < $length) {
            $t = hash_hmac('sha256', $t.$label.chr($counter), $prk, true);
            $okm .= $t;
            $counter++;
        }

        return substr(bin2hex($okm), 0, $length * 2);
    }
}
