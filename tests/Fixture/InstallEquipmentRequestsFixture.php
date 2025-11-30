<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InstallEquipmentRequestsFixture
 */
class InstallEquipmentRequestsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'full_name' => 'Lorem ipsum dolor sit amet',
                'company_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'brand_name' => 'Lorem ipsum dolor sit amet',
                'equipment_category' => 'Lorem ipsum dolor sit amet',
                'equipment_type' => 'Lorem ipsum dolor sit amet',
                'preferred_datetime' => '2025-05-09 08:37:53',
                'created' => '2025-05-09 08:37:53',
                'modified' => '2025-05-09 08:37:53',
            ],
        ];
        parent::init();
    }
}
