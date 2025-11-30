<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Contact;
use Authorization\IdentityInterface;
use App\Model\Entity\User;

/**
 * Contact policy
 */
class ContactPolicy
{
    /**
     * Check if $user can add Contact
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Contact $contact
     * @return bool
     */



    /**
     * Apply scope to the index query
     *
     * @param \Authorization\IdentityInterface $user
     * @param \Cake\ORM\Query $query
     * @return \Cake\ORM\Query
     */
    public function scopeIndex(IdentityInterface $user, \Cake\ORM\Query $query)
    {
        // Allow all admins, managers, and employees to see all contacts
        if (in_array($user->roles, [User::ROLE_ADMIN, User::ROLE_MANAGER, User::ROLE_EMPLOYEE])) {
            return $query;
        }

        // Default: deny access by returning no results
        return $query->where(['1' => 0]);
    }


    public function canAdd(IdentityInterface $user, Contact $contact)
    {
        return in_array($user -> roles, [User::ROLE_ADMIN]);
    }

    /**
     * Check if $user can edit Contact
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Contact $contact
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Contact $contact)
    {
        return in_array($user -> roles, [User::ROLE_ADMIN, User::ROLE_MANAGER]);
    }

    /**
     * Check if $user can delete Contact
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Contact $contact
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Contact $contact)
    {
        return in_array($user -> roles, [User::ROLE_ADMIN, User::ROLE_MANAGER]);
    }

    /**
     * Check if $user can view Contact
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Contact $contact
     * @return bool
     */
    public function canView(IdentityInterface $user, Contact $contact)
    {
        return in_array($user -> roles, [User::ROLE_ADMIN, User::ROLE_MANAGER, User::ROLE_EMPLOYEE]);
    }

    public function canIndex(IdentityInterface $user, Contact $contact)
    {
        return in_array($user -> roles, [User::ROLE_ADMIN, User::ROLE_MANAGER, User::ROLE_EMPLOYEE]);
    }

}
