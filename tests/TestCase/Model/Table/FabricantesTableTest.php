<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FabricantesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FabricantesTable Test Case
 */
class FabricantesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FabricantesTable
     */
    protected $Fabricantes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Fabricantes',
        'app.Veiculos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fabricantes') ? [] : ['className' => FabricantesTable::class];
        $this->Fabricantes = $this->getTableLocator()->get('Fabricantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fabricantes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FabricantesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
