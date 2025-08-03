<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VeiculosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VeiculosTable Test Case
 */
class VeiculosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VeiculosTable
     */
    protected $Veiculos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Veiculos',
        'app.Fabricantes',
        'app.Tipos',
        'app.Manutencaos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Veiculos') ? [] : ['className' => VeiculosTable::class];
        $this->Veiculos = $this->getTableLocator()->get('Veiculos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Veiculos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VeiculosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VeiculosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
