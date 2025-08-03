<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutenticacaosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AutenticacaosTable Test Case
 */
class AutenticacaosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AutenticacaosTable
     */
    protected $Autenticacaos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Autenticacaos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Autenticacaos') ? [] : ['className' => AutenticacaosTable::class];
        $this->Autenticacaos = $this->getTableLocator()->get('Autenticacaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Autenticacaos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AutenticacaosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AutenticacaosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
