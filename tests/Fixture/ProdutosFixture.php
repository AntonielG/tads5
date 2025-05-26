<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdutosFixture
 */
class ProdutosFixture extends TestFixture
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
                'descricao' => 'Lorem ipsum dolor sit amet',
                'categoria_id' => 1,
                'ativo' => 'L',
                'created' => '2025-04-08 22:05:02',
                'modified' => '2025-04-08 22:05:02',
            ],
        ];
        parent::init();
    }
}
