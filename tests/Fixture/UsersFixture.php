<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'cpf' => 'Lorem ipsum ',
                'password' => 'Lorem ipsum dolor sit amet',
                'nome' => 'Lorem ipsum dolor sit amet',
                'celular' => 'Lorem ipsum d',
                'dtnasc' => '2025-04-08',
                'email' => 'Lorem ipsum dolor sit amet',
                'ativo' => 'L',
                'created' => '2025-04-08 19:29:19',
                'modified' => '2025-04-08 19:29:19',
            ],
        ];
        parent::init();
    }
}
