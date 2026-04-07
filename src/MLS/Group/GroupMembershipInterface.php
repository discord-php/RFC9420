<?php

declare(strict_types=1);

namespace MLS\Group;

interface GroupMembershipInterface
{
    /**
     * Add members to the group. Returns an array of proposal objects or identifiers to be committed.
     *
     * @param array $keyPackages Array of KeyPackageInterface or raw key package representations
     * @return array<int,mixed>
     */
    public function addMembers(array $keyPackages): array;

    /**
     * Remove members by identity or index. Returns proposals or identifiers.
     *
     * @param array $identifiers
     * @return array<int,mixed>
     */
    public function removeMembers(array $identifiers): array;
}
