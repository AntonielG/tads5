<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposTable Test Case
 */
class TiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposTable
     */
    protected $Tipos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tipos',
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
        $config = $this->getTableLocator()->exists('Tipos') ? [] : ['className' => TiposTable::class];
        $this->Tipos = $this->getTableLocator()->get('Tipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TiposTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
