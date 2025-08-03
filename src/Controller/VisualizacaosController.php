<?php

namespace App\Controller;

use App\Controller\AppController;
class VisualizacaosController extends AppController
{

    public function visualManutencao() {
        $response = null;
        $statusCode = 200;

        if ($this->request->is('post')) {
            $manutencaos = $this->fetchTable('Manutencaos');
            if(empty($this->request->getData()['id'])) {
                $sql = "SELECT m.numntfiscal AS NF,m.valor, m.data,f.nome AS Fornecedor,f.cnpj, f.telefone,v.modelo AS Modelo,v.placa,fab.abreviado AS Abreviação FROM fornecedors f JOIN manutencaos m ON f.id = m.fornecedor_id JOIN veiculos v ON m.veiculo_id = v.id JOIN fabricantes fab ON v.fabricante_id = fab.id";
                $response = $GLOBALS['connection']->execute($sql)->fetchAll('assoc');
            } else {
                $id = $this->request->getData('id');
                $sql = "SELECT m.numntfiscal AS NF,m.valor, m.data,f.nome AS Fornecedor,f.cnpj, f.telefone,v.modelo AS Modelo,v.placa,fab.abreviado AS Abreviação FROM fornecedors f JOIN manutencaos m ON f.id = m.fornecedor_id JOIN veiculos v ON m.veiculo_id = v.id JOIN fabricantes fab ON v.fabricante_id = fab.id WHERE m.id = :id";
                $response = $GLOBALS['connection']->execute($sql, ['id' => $id])->fetchAll('assoc');
            }
            return $this->response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withStatus($statusCode)
                ->withType('application/json')
                ->withStringBody(json_encode($response));
        }
    }
}
