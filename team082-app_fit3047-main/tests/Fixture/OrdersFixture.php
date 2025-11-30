<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'total_amount' => 1.5,
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-04-12 16:22:50',
                'modified' => '2025-04-12 16:22:50',
            ],
        ];
        parent::init();
    }
}
