<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TiposFixture
 */
class TiposFixture extends TestFixture
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
                'tipo' => 'Lorem ipsum dolor sit amet',
                'ativo' => 'L',
                'created' => '2025-04-22 21:18:37',
                'modified' => '2025-04-22 21:18:37',
            ],
        ];
        parent::init();
    }
}
