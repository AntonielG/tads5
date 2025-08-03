<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FornecedorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FornecedorsTable Test Case
 */
class FornecedorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FornecedorsTable
     */
    protected $Fornecedors;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Fornecedors',
        'app.Servicos',
        'app.Manutencaos',
        'app.Pecas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fornecedors') ? [] : ['className' => FornecedorsTable::class];
        $this->Fornecedors = $this->getTableLocator()->get('Fornecedors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Fornecedors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FornecedorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FornecedorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
