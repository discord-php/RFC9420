<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MLS\Credentials\BasicCredential;
use MLS\Handshake\BasicKeyPackage;
use MLS\Crypto\BasicCipherSuite;
use MLS\Tree\LeafNode;
use MLS\Commit\UpdatePathNode;
use MLS\Commit\UpdatePath;
use MLS\Group\BasicGroupInfo;

// Create a basic credential and key package
$cred = new BasicCredential('basic', 'example-user', 'example-pub');
$kp = new BasicKeyPackage(1, new BasicCipherSuite(), 'initkey', $cred);

// Create a leaf node and an update path
$leaf = new LeafNode('example-user', $cred, $kp->getInitKey());
$node = new UpdatePathNode('node-pub', 'enc-secret');
$path = new UpdatePath($leaf, [$node]);

// Create a GroupInfo instance and print summary
$group = new BasicGroupInfo('group-1', 1, null, 'cth', [], $cred);

echo "Group: " . $group->getGroupId() . "\n";
echo "Leaf identity: " . $path->getLeafNode()->getIdentity() . "\n";
echo "Node public key: " . $path->getNodes()[0]->getPublicKey() . "\n";
