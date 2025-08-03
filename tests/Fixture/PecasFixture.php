<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PecasFixture
 */
class PecasFixture extends TestFixture
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
                'valor' => 1.5,
                'garantia' => 1,
                'numntfiscal' => 1,
                'ativo' => 'L',
                'created' => '2025-04-22 21:47:48',
                'modified' => '2025-04-22 21:47:48',
                'fornecedor_id' => 1,
            ],
        ];
        parent::init();
    }
}
