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

        // Specific type assertions introduced by recent API changes
        $ksRef = new ReflectionClass('MLS\\Crypto\\KeyScheduleInterface');
        $this->assertTrue($ksRef->hasMethod('init'), 'KeyScheduleInterface must declare init');
        $init = $ksRef->getMethod('init');
        $params = $init->getParameters();
        $this->assertGreaterThanOrEqual(1, count($params), 'init must have at least one parameter');
        $this->assertTrue($params[0]->hasType(), 'init first parameter must be typed');
        $this->assertEquals('array', $params[0]->getType()->getName(), 'KeyScheduleInterface::init first parameter should be typed as array');

        $senderTargets = [
            'MLS\\Message\\MLSPlaintextInterface',
            'MLS\\Proposal\\ProposalInterface',
            'MLS\\Commit\\CommitInterface',
        ];

        foreach ($senderTargets as $iface) {
            $this->assertTrue(interface_exists($iface, true), "Interface {$iface} should exist for sender checks");
            $r = new ReflectionClass($iface);
            $this->assertTrue($r->hasMethod('getSender'), "Interface {$iface} must declare method getSender");
            $m = $r->getMethod('getSender');
            $this->assertTrue($m->hasReturnType(), "getSender on {$iface} should have a return type");
            $this->assertEquals('MLS\\Message\\SenderInterface', $m->getReturnType()->getName(), "getSender on {$iface} must return MLS\\Message\\SenderInterface");
        }
    }
}
