<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepairRequestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepairRequestsTable Test Case
 */
class RepairRequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepairRequestsTable
     */
    protected $RepairRequests;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.RepairRequests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RepairRequests') ? [] : ['className' => RepairRequestsTable::class];
        $this->RepairRequests = $this->getTableLocator()->get('RepairRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RepairRequests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RepairRequestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
