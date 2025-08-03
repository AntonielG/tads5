<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FabricantesFixture
 */
class FabricantesFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'abreviado' => 'Lorem ipsum dolo',
                'ativo' => 'L',
                'created' => '2025-04-22 21:18:33',
                'modified' => '2025-04-22 21:18:33',
            ],
        ];
        parent::init();
    }
}
