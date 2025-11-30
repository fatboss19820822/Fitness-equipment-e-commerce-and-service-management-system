<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstallEquipmentRequestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstallEquipmentRequestsTable Test Case
 */
class InstallEquipmentRequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InstallEquipmentRequestsTable
     */
    protected $InstallEquipmentRequests;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.InstallEquipmentRequests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('InstallEquipmentRequests') ? [] : ['className' => InstallEquipmentRequestsTable::class];
        $this->InstallEquipmentRequests = $this->getTableLocator()->get('InstallEquipmentRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InstallEquipmentRequests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InstallEquipmentRequestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
