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

namespace MLS\Welcome;

interface EncryptedGroupSecretsInterface
{
    /**
     * Returns the KeyPackage hash this encrypted secret is targeted to.
     */
    public function getKeyPackageHash(): string;

    /**
     * Returns the HPKE encapsulated ciphertext (enc) used to open the encrypted_group_secrets.
     */
    public function getHpkeEnc(): string;

    /**
     * Returns the encrypted_group_secrets ciphertext blob.
     */
    public function getEncryptedGroupSecrets(): string;

    /**
     * Attempt to decrypt using a provided HPKE receiver context/secret.
     * Implementations may return the plaintext or throw on failure.
     *
     * @param  string $receiverSecret binary secret or context identifier
     * @return string plaintext group secrets
     */
    public function open(string $receiverSecret): string;
}
