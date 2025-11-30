<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RepairRequestsFixture
 */
class RepairRequestsFixture extends TestFixture
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
                'customer_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'suburb' => 'Lorem ipsum dolor sit amet',
                'brand_name' => 'Lorem ipsum dolor sit amet',
                'equipment_category' => 'Lorem ipsum dolor sit amet',
                'equipment_type' => 'Lorem ipsum dolor sit amet',
                'equipment' => 'Lorem ipsum dolor sit amet',
                'preferred_datetime' => '2025-05-09 09:06:43',
                'created' => '2025-05-09 09:06:43',
                'modified' => '2025-05-09 09:06:43',
            ],
        ];
        parent::init();
    }
}
