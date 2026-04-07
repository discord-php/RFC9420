<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MLSInterfacesExtendedTest extends TestCase
{
    public function testUpdatePathInterfacesAndTypes(): void
    {
        $this->assertTrue(interface_exists('MLS\\Commit\\UpdatePathInterface', true));
        $up = new ReflectionClass('MLS\\Commit\\UpdatePathInterface');
        $this->assertTrue($up->hasMethod('getLeafNode'));
        $this->assertTrue($up->hasMethod('getNodes'));

        $nodesDoc = $up->getMethod('getNodes')->getDocComment();
        $this->assertStringContainsString('UpdatePathNodeInterface', (string) $nodesDoc);

        $this->assertTrue(interface_exists('MLS\\Commit\\UpdatePathNodeInterface', true));
        $node = new ReflectionClass('MLS\\Commit\\UpdatePathNodeInterface');
        $this->assertTrue($node->hasMethod('getPublicKey'));
        $this->assertTrue($node->hasMethod('getEncryptedPathSecret'));
    }

    public function testWelcomeAndGroupSecrets(): void
    {
        $this->assertTrue(interface_exists('MLS\\Welcome\\WelcomeInterface', true));
        $w = new ReflectionClass('MLS\\Welcome\\WelcomeInterface');
        $this->assertTrue($w->hasMethod('getGroupInfo'));
        $this->assertTrue($w->hasMethod('getSecrets'));
        $this->assertTrue($w->hasMethod('getEncryptedGroupSecrets'));

        $secretsDoc = $w->getMethod('getSecrets')->getDocComment();
        $this->assertStringContainsString('GroupSecretsInterface', (string) $secretsDoc);

        $this->assertTrue(interface_exists('MLS\\Welcome\\EncryptedGroupSecretsInterface', true));
        $enc = new ReflectionClass('MLS\\Welcome\\EncryptedGroupSecretsInterface');
        $this->assertTrue($enc->hasMethod('getKeyPackageHash'));
        $this->assertTrue($enc->hasMethod('getHpkeEnc'));
        $this->assertTrue($enc->hasMethod('getEncryptedGroupSecrets'));
        $this->assertTrue($enc->hasMethod('open'));
    }

    public function testKeyPackageAndBundleSignatures(): void
    {
        $this->assertTrue(interface_exists('MLS\\Handshake\\KeyPackageInterface', true));
        $kp = new ReflectionClass('MLS\\Handshake\\KeyPackageInterface');
        $this->assertTrue($kp->hasMethod('getCipherSuite'));
        $csReturn = $kp->getMethod('getCipherSuite')->getReturnType();
        $this->assertNotNull($csReturn);
        $this->assertEquals('MLS\\Crypto\\CipherSuiteInterface', $csReturn->getName());

        $this->assertTrue(interface_exists('MLS\\Handshake\\KeyPackageBundleInterface', true));
        $bundle = new ReflectionClass('MLS\\Handshake\\KeyPackageBundleInterface');
        $this->assertTrue($bundle->hasMethod('getKeyPackages'));
        $kpDoc = $bundle->getMethod('getKeyPackages')->getDocComment();
        $this->assertStringContainsString('KeyPackageInterface', (string) $kpDoc);
    }

    public function testTreeComputePathDocblock(): void
    {
        $this->assertTrue(interface_exists('MLS\\Tree\\TreeInterface', true));
        $t = new ReflectionClass('MLS\\Tree\\TreeInterface');
        $this->assertTrue($t->hasMethod('computePath'));
        $doc = $t->getMethod('computePath')->getDocComment();
        $this->assertStringContainsString('UpdatePathNodeInterface', (string) $doc);
    }

    public function testGroupInfoExtensionsDoc(): void
    {
        $this->assertTrue(interface_exists('MLS\\Group\\GroupInfoInterface', true));
        $g = new ReflectionClass('MLS\\Group\\GroupInfoInterface');
        $this->assertTrue($g->hasMethod('getExtensions'));
        $doc = $g->getMethod('getExtensions')->getDocComment();
        $this->assertStringContainsString('ExtensionInterface', (string) $doc);
    }

    public function testGroupSecretsInterfaceShape(): void
    {
        $this->assertTrue(interface_exists('MLS\\Welcome\\GroupSecretsInterface', true));
        $gs = new ReflectionClass('MLS\\Welcome\\GroupSecretsInterface');
        $this->assertTrue($gs->hasMethod('getJoinerSecret'));
        $this->assertTrue($gs->hasMethod('getPathSecret'));
        $this->assertTrue($gs->hasMethod('getPsks'));
    }
}
