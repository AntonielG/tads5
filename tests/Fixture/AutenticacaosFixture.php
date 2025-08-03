<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AutenticacaosFixture
 */
class AutenticacaosFixture extends TestFixture
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
                'hash' => 'Lorem ipsum dolor sit amet',
                'expira' => '2025-05-06',
                'ativo' => 'L',
                'created' => '2025-05-06 19:57:46',
                'modified' => '2025-05-06 19:57:46',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
