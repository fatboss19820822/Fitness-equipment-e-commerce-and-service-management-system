<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Order;
use Authorization\IdentityInterface;
use App\Model\Entity\User;

/**
 * Order policy
 */
class OrderPolicy
{
    /**
     * Apply scope to the index query
     */
    public function scopeIndex(IdentityInterface $user, \Cake\ORM\Query $query)
    {
        // Example: Allow all roles to see all orders
        if (in_array($user->roles, [User::ROLE_ADMIN, User::ROLE_MANAGER, User::ROLE_EMPLOYEE])) {
            return $query;
        }

        // Default: deny access
        return $query->where(['1' => 0]);
    }

    /**
     * Check if user can add an order
     */
    public function canAdd(IdentityInterface $user, Order $order)
    {
        return in_array($user->roles, [User::ROLE_ADMIN, User::ROLE_EMPLOYEE]);
    }

    /**
     * Check if user can edit an order
     */
    public function canEdit(IdentityInterface $user, Order $order)
    {
        return in_array($user->roles, [User::ROLE_ADMIN, User::ROLE_MANAGER]);
    }

    /**
     * Check if user can delete an order
     */
    public function canDelete(IdentityInterface $user, Order $order)
    {
        return in_array($user->roles, [User::ROLE_ADMIN]);
    }

    /**
     * Check if user can view an order
     */
    public function canView(IdentityInterface $user, Order $order)
    {
        return in_array($user->roles, [User::ROLE_ADMIN, User::ROLE_MANAGER, User::ROLE_EMPLOYEE]);
    }

    /**
     * Optional: Check if user can index all orders (redundant if using scopeIndex)
     */
    public function canIndex(IdentityInterface $user, Contact $contact)
    {
        return in_array($user -> roles, [User::ROLE_ADMIN, User::ROLE_MANAGER, User::ROLE_EMPLOYEE]);
    }

    public function canComplete(IdentityInterface $user, Contact $contact)
    {
        return in_array($user -> roles, [User::ROLE_ADMIN, User::ROLE_MANAGER, User::ROLE_EMPLOYEE]);
    }
}
