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

namespace MLS\Tree;

interface TreeInterface
{
    public function getLeafCount(): int;

    public function getRootHash(): string;

    public function getLeaf(int $index): ?LeafNodeInterface;

    public function setLeaf(int $index, LeafNodeInterface $leaf): void;

    public function getParent(int $index): ?ParentNodeInterface;

    /**
     * Compute the path for a leaf index.
     *
     * @param int $leafIndex
     * @return \MLS\Commit\UpdatePathNodeInterface[]
     */
    public function computePath(int $leafIndex): array;
}
