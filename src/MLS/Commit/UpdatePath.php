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

namespace MLS\Commit;

use MLS\Tree\LeafNodeInterface;

class UpdatePath implements UpdatePathInterface
{
    protected LeafNodeInterface $leafNode;

    /** @var UpdatePathNodeInterface[] */
    protected array $nodes;

    /** @param UpdatePathNodeInterface[] $nodes */
    public function __construct(LeafNodeInterface $leafNode, array $nodes = [])
    {
        $this->leafNode = $leafNode;
        $this->nodes = $nodes;
    }

    public function getLeafNode(): LeafNodeInterface
    {
        return $this->leafNode;
    }

    /** @return UpdatePathNodeInterface[] */
    public function getNodes(): array
    {
        return $this->nodes;
    }
}
