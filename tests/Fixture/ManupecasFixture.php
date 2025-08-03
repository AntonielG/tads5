<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ManupecasFixture
 */
class ManupecasFixture extends TestFixture
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
                'ativo' => 'L',
                'created' => '2025-04-22 21:18:53',
                'modified' => '2025-04-22 21:18:53',
                'manutencao_id' => 1,
                'peca_id' => 1,
            ],
        ];
        parent::init();
    }
}
