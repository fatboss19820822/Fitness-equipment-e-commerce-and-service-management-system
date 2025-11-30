<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use Cake\ORM\Query;

class InstallEquipmentRequestsTablePolicy
{
    /**
     * Scope for index queries — returns all by default
     */
    public function scopeIndex(IdentityInterface $user, Query $query)
    {
        // Example: Add filtering logic here if needed
        return $query;
    }

    /**
     * Allow listing install requests (index page)
     */
    public function canIndex(IdentityInterface $user)
    {
        return true; // Adjust if you want role-based control
    }

    /**
     * Allow creation of new install requests
     */
    public function canAdd(IdentityInterface $user)
    {
        return true;
    }

    /**
     * Allow admin to access 'view/edit/delete' from table-level check if needed
     */
    public function canView(IdentityInterface $user)
    {
        return true;
    }

    public function canEdit(IdentityInterface $user)
    {
        return true;
    }

    public function canDelete(IdentityInterface $user)
    {
        return true;
    }
}
