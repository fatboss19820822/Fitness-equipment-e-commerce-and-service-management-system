<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;

/**
 * RepairRequestsTable policy
 */
class RepairRequestsTablePolicy
{
    /**
     * Check if the user can access the repair requests index (list view).
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \Cake\ORM\Query $query The query.
     * @return bool
     */
    public function scopeIndex(IdentityInterface $user, $query)
    {
        // Allow all authenticated users to see the list
        return $query;
    }
}
