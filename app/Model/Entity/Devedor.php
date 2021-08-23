<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Devedor
{

    /**
     * ID
     *
     * @var integer
     */
    public $id;

    /**
     * NOME
     *
     * @var string
     */
    public $nome;

    /**
     * cpf/cnpj
     *
     * @var integer
     */
    public $identificacao;


    /**
     * data de nascimento
     *
     * @var date
     */
    public $data_nascimento;

    /**
     * endereço
     *
     * @var string
     */
    public $endereco;

    /**
     * titulo
     *
     * @var string
     */
    public $titulo;

    /**
     * valor
     *
     * @var float
     */
    public $valor;

    /**
     * data de vencimento
     *
     * @var date
     */
    public $data_vencimento;

    /**
     * id do usuário logado
     *
     * @var integer
     */
    public $user_id;

    /**
     * data atualização
     *
     * @var \DateTime
     */
    public $updated;

    /**
     * data atualização
     *
     * @var \DateTime
     */
    public $created;

    /**
     * Método reponsável por cadastrar a instancia atual no banco de dados
     *
     * @return boolean
     */
    public function create()
    {
        /** Define a data */
        $this->created = date('Y-m-d H:i:s');
        $this->updated = date('Y-m-d H:i:s');

        /** Inseri devedor no banco de dados */
        $this->id = (new Database('devedor'))->insert([
            'nome' => $this->nome,
            'identificacao' => $this->identificacao,
            'data_nascimento' => $this->data_nascimento,
            'titulo' => $this->titulo,
            'endereco' => $this->endereco,
            'valor' => $this->valor,
            'data_vencimento' => $this->data_vencimento,
            'user_id' => $this->user_id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);
        return true;
    }

    /**
     * Método reponsável por editar dados do banco com a instância atual
     *
     * @return boolean
     */
    public function update()
    {
        /** Define a data */
        $this->updated = date('Y-m-d H:i:s');

        /** Atualiza devedor no banco de dados */
        return (new Database('devedor'))->update('id = ' . $this->id, [
            'nome' => $this->nome,
            'identificacao' => $this->identificacao,
            'data_nascimento' => $this->data_nascimento,
            'titulo' => $this->titulo,
            'endereco' => $this->endereco,
            'valor' => $this->valor,
            'data_vencimento' => $this->data_vencimento,
            'user_id' => $this->user_id,
            'updated' => $this->updated,
        ]);
    }

    /**
     * Método reponsável por deletar um devedor do banco de dados
     *
     * @return boolean
     */
    public function deletar()
    {
        /** Exclui o devedor do banco de dados */
        return (new Database('devedor'))->delete('id = ' . $this->id);
    }

    /**
     * Método reponsável por retornar um devedor com base no seu id
     * @param integer $id
     * @return Devedor
     */
    public static function getDevedorById($id)
    {
        return self::getDevedores('id = ' . $id)->fetchObject(self::class);
    }

    /**
     * Método responsável por retornar Devedores
     *
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return \PDOStatement
     */
    public static function getDevedores($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('devedor'))->select($where, $order, $limit, $fields);
    }

}