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

use PHPUnit\Framework\TestCase;

final class MLSInterfacesTest extends TestCase
{
    public function testCoreInterfacesExistAndContainMethods(): void
    {
        $expectations = [
            'MLS\\MLSInterface' => ['createGroup', 'loadGroup', 'listGroups'],
            'MLS\\Group\\GroupInterface' => ['getGroupId', 'getEpoch', 'commit', 'applyCommit'],
            'MLS\\Group\\GroupContextInterface' => ['getGroupId', 'getEpoch', 'getTreeHash'],
            'MLS\\Tree\\TreeInterface' => ['getLeafCount', 'getRootHash', 'computePath'],
            'MLS\\Tree\\LeafNodeInterface' => ['getIdentity', 'getCredential', 'getPublicKey'],
            'MLS\\Credentials\\CredentialInterface' => ['getCredentialType', 'getIdentity', 'getPublicKey', 'verifySignature'],
            'MLS\\Crypto\\CipherSuiteInterface' => ['getId', 'getHpkeKemId', 'getHashLength'],
            'MLS\\Crypto\\KeyScheduleInterface' => ['init', 'deriveWelcomeSecret', 'deriveEpochSecrets', 'exportSecret'],
            'MLS\\Message\\MLSPlaintextInterface' => ['getGroupId', 'getEpoch', 'getSender', 'getContent', 'verify'],
            'MLS\\Message\\MLSCiphertextInterface' => ['getWireFormat', 'getEncryptedContent', 'decrypt'],
            'MLS\\Proposal\\ProposalInterface' => ['getType', 'getSender', 'getProposal'],
            'MLS\\Commit\\CommitInterface' => ['getSender', 'getProposals', 'getSignature'],
        ];

        foreach ($expectations as $interface => $methods) {
            $this->assertTrue(interface_exists($interface, true), "Interface {$interface} should exist");
            $ref = new ReflectionClass($interface);

            foreach ($methods as $method) {
                $this->assertTrue($ref->hasMethod($method), "Interface {$interface} must declare method {$method}");
            }
        }
    }
}
