<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Datasource\EntityInterface;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\ORM\Exception\PersistenceFailedException;
use Cake\View\Exception\MissingTemplateException;
use mysql_xdevapi\Exception;
use function PHPUnit\Framework\isEmpty;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/5/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // $this->Authentication->allowUnauthenticated(['login']);
    }

    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function getUsers()
    {
        $response = null;
        $statusCode = 200;

        if ($this->request->is("post") && !empty($this->request->getData("id")[0])) {
            $sql = "SELECT *
                      FROM USERS
                     WHERE ID = :id";

            $id = $this->request->getData("id")[0];
            $filtro = ["id" => $id];
        }
        else {
            $sql = "SELECT *
                      FROM USERS
                     ORDER BY NOME ASC";
            $filtro = [];
        }

        $response = $GLOBALS["connection"]->execute($sql, $filtro)->fetchAll("assoc");

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    private function gerarHash(): string
    {
        // $hash = password_hash($this->request->getData("email"), PASSWORD_DEFAULT);
        // Gerar hash combinando a senha do usuário com a data atual
        $hash = $this->request->getData("email") . date("YmdHis");
        return hash("sha256", $hash);
    }

    private function obterDataExpiracao(): string
    {
        return date("Y-m-d", strtotime("+4 days"));
    }

    private function gerarAutenticacao($resultado): EntityInterface
    {
        $autenticacao = $this->Autenticacaos->newEmptyEntity();
        $autenticacao["autenticacao"] = $this->gerarHash();
        $autenticacao["user_id"] = $resultado->getData()["id"];
        $autenticacao["expiracao"] = $this->obterDataExpiracao();

        return $autenticacao;
    }

    private function gerarResposta($codigo, $mensagem): Response
    {
        return $this->response
            ->withHeader("Access-Control-Allow-Origin", "+")
            ->withStatus($codigo)
            ->withType("aplication/json")
            ->withStringBody(json_encode($mensagem));
    }

    public function login()
    {
        $response = null;
        $statusCode = 200;

        $this->loadComponent("Authentication.Authentication");
        $this->Authentication->logout();
        $result = $this->Authentication->getResult();

        if (!$result || !$result->isValid())
        {
            return $this->response
                ->withHeader("Access-Control-Allow-Origin", "+")
                ->withStatus(400)
                ->withType("aplication/json")
                ->withStringBody(json_encode("E-mail ou senha inválidos."));
        }

        $user_id = $result->getData()["id"];

        try
        {
            /*
            $registros = $this->Autenticacaos->find()
                ->select(['id'])
                ->where(["user_id" => $user_id])
                ->all()
                ->toList();
             */

            $salvar["user_id"] = $user_id;
            $salvar["autenticacao"] = $this->gerarHash();
            $salvar["expiracao"] = $this->obterDataExpiracao();

            $retorno = $this->Autenticacaos->find()
                ->select(["id"])
                ->where(["user_id" => $user_id])
                ->limit(1)
                ->first();

            if ($retorno)
            {
                $autenticacao_id = $retorno["id"];
                $autenticacao = $this->Autenticacaos->get($autenticacao_id, contain: []);
            }
            else
            {
                $autenticacao = $this->Autenticacaos->newEmptyEntity();
            }

            $autenticacao = $this->Autenticacaos->patchEntity($autenticacao, $salvar);
            $this->Autenticacaos->saveOrFail($autenticacao);

            $response["mensagem"] = "Login realizado com sucesso";
            $response["hash"] = $autenticacao["autenticacao"];
        }
        catch (PersistenceFailedException $e)
        {
            $statusCode = 400;
            $response = $e->getAttributes();
        }

        return $this->response
            ->withHeader("Access-Control-Allow-Origin", "+")
            ->withStatus($statusCode)
            ->withType("aplication/json")
            ->withStringBody(json_encode($response));
    }

    public function logout()
    {
        $this->Authentication->logout();
        //return $this->redirect(['controller' => 'Pages', 'action' => 'login']);
    }
}
