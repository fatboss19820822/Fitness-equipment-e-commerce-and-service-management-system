<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\RepairRequest;
use Authorization\IdentityInterface;

class RepairRequestPolicy
{
    public function canView(IdentityInterface $user, RepairRequest $request)
    {
        return true; // Or add user role checks
    }

    public function canEdit(IdentityInterface $user, RepairRequest $request)
    {
        return true;
    }

    public function canDelete(IdentityInterface $user, RepairRequest $request)
    {
        return true;
    }

    public function canAdd(?IdentityInterface $user, RepairRequest $request)
    {
        return true; // If guests are allowed to add
    }
}
