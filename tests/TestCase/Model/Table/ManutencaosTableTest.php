<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManutencaosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManutencaosTable Test Case
 */
class ManutencaosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ManutencaosTable
     */
    protected $Manutencaos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Manutencaos',
        'app.Fornecedors',
        'app.Veiculos',
        'app.Manupecas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Manutencaos') ? [] : ['className' => ManutencaosTable::class];
        $this->Manutencaos = $this->getTableLocator()->get('Manutencaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Manutencaos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ManutencaosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ManutencaosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
