<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\InstallEquipmentRequest;
use Authorization\IdentityInterface;

class InstallEquipmentRequestPolicy
{
    public function canView(IdentityInterface $user, InstallEquipmentRequest $request)
    {
        return true;
    }

    public function canEdit(IdentityInterface $user, InstallEquipmentRequest $request)
    {
        return true;
    }

    public function canDelete(IdentityInterface $user, InstallEquipmentRequest $request)
    {
        return true;
    }

    public function canUpdateStatus(IdentityInterface $user, InstallEquipmentRequest $request)
    {
        return true; // TODO: Replace with proper admin check later
    }
}
