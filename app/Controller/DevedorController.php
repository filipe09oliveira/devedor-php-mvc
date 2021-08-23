<?php

namespace App\Controller;

use App\Http\Request;
use App\Utils\View;
use App\Model\Entity\Devedor as EntityDevedor;
use WilliamCosta\DatabaseManager\Pagination;

class DevedorController extends Page
{
    /**
     * Método responsável por obter a renderização dos intens de devedor para página
     *
     * @param Request $request
     * @return string
     */
    private static function getDevedorItems($request, &$obPagination)
    {
        /** Devedores */
        $itens = '';

        /** Quantidade total de registro */
        $quantidadetotal = EntityDevedor::getDevedores(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        /** Página atutal */
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;

        /** Instancia de paginação */
        $obPagination = new Pagination($quantidadetotal, $paginaAtual, 10);

        /** Resultados da página */
        $results = EntityDevedor::getDevedores('user_id = '.$_SESSION['usuario']['id'], 'id DESC', $obPagination->getLimit());

        /** Renderiza o item */
        while ($devedor = $results->fetchObject(EntityDevedor::class)) {
            $itens .= View::render('/modules/devedor/item', [
                'id' => $devedor->id,
                'nome' => $devedor->nome,
                'identificacao' => $devedor->identificacao,
                'data_nascimento' => $devedor->data_nascimento,
                'titulo' => $devedor->titulo,
                'endereco' => $devedor->endereco,
                'valor' => $devedor->valor,
                'data_vencimento' => $devedor->data_vencimento,
                'created' => date('d/mY H:i:s', strtotime($devedor->created)),
                'updated' => date('d/mY H:i:s', strtotime($devedor->updated)),
            ]);
        }

        /** Retorna os devedor */
        return $itens;
    }


    /**
     * Método responsável por renderizar a view de listagem de devedor
     * @param Request $request
     * @return string
     */
    public static function getDevedores($request)
    {
        /** Conteúdo da HOME */
        $content = View::render('/modules/devedor/index', [
            'itens' => self::getDevedorItems($request, $obPagination),
            'pagination' => parent::getPagination($request, $obPagination),
            'status' => self::getStatus($request),
        ]);

        /** Retorna a página completa */
        return parent::getPanel('Devedor - PHP MVC', $content, 'devedor');
    }

    /**
     * Método reponsável por retornar o formulário de cadastro de um novo devedor
     * @param Request $request
     * @return string
     */
    public function getCreateDevedor($request)
    {
        dd("aqui");
        /** Conteúdo do form de cadastro de devedores */
        $content = View::render('/modules/devedor/form', [
            'title' => 'Cadastrar devedor',
            'nome' => '',
            'identificacao' => '',
            'data_nascimento' => '',
            'endereco' => '',
            'titulo' => '',
            'valor' => '',
            'data_vencimento' => '',
            'user_id' => '',
            'mensagem' => '',
            'status' => ''
        ]);

        /** Retorna a página completa */
        return parent::getPanel('Cadastrar Devedor - PHP MVC', $content, 'devedor');
    }


    /**
     * Método reponsável por cadastrar um novo devedor
     * @param Request $request
     * @return string
     */
    public function setCreateDevedor($request)
    {
        /** POST VARS */
        $post = $request->getPostVars();

        /** Nova instancia de devedor */
        $devedor = new EntityDevedor();
        $devedor->nome = $post['nome'] ?? '';
        $devedor->identificacao = $post['identificacao'] ?? '';
        $devedor->data_nascimento = $post['data_nascimento'] ?? '';
        $devedor->titulo = $post['titulo'] ?? '';
        $devedor->endereco = $post['endereco'] ?? '';
        $devedor->valor = $post['valor'] ?? '';
        $devedor->data_vencimento = $post['data_vencimento'] ?? '';
        $devedor->user_id = $_SESSION['usuario']['id'] ?? '';
        $devedor->create();

        /** redireciona o usuário */
        $request->getRouter()->redirect('/devedor');
    }

    /**
     * Método reponsável por restornar mensagem de status
     * @param Request $request
     * @return string
     */
    private static function getStatus($request)
    {
        /** Query Params */
        $queryParams = $request->getQueryParams();
        if (!isset($queryParams['status'])) return '';

        switch ($queryParams['status']) {
            case 'created':
                return Alert::getSuccess('Devedor criado com sucesso!');
                break;
            case 'updated':
                return Alert::getSuccess('Devedor atualizado com sucesso!');
                break;
            case 'deleted':
                return Alert::getSuccess('Devedor excluido com sucesso!');
                break;
        }
    }


    /**
     * Método reponsável por retornar o formulário de edição de um devedor
     * @param Request $request
     * @param integer $id
     * @return string
     */
    public function getEditDevedor($request, $id)
    {
        /** Obtém o devedor do banco de dados */
        $devedor = EntityDevedor::getDevedorById($id);

        /** Valida a instancia */
        if (!$devedor instanceof EntityDevedor) {
            $request->getRouter()->redirect('/devedor');
        }

        /** Conteúdo do form de edit de devedor */
        $content = View::render('/modules/devedor/form', [
            'title' => 'Editar devedor',
            'nome' => $devedor->nome,
            'identificacao' => $devedor->identificacao,
            'data_nascimento' => $devedor->data_nascimento,
            'titulo' => $devedor->titulo,
            'endereco' => $devedor->endereco,
            'valor' => $devedor->valor,
            'data_vencimento' => $devedor->data_vencimento,
            'user_id' => $devedor->user_id,
            'status' => self::getStatus($request),

        ]);

        /** Retorna a página completa */
        return parent::getPanel('Editar Devedor - PHP MVC', $content, 'devedor');
    }


    /**
     * Método reponsável por salvar a atualização de um devedor
     * @param Request $request
     * @param integer $id
     * @return string
     */
    public function setEditDevedor($request, $id)
    {
        /** Obtém o devedor do banco de dados */
        $devedor = EntityDevedor::getDevedorById($id);

        /** Valida a instancia */
        if (!$devedor instanceof EntityDevedor) {
            $request->getRouter()->redirect('/devedor');
        }

        /** POST VARS */
        $post = $request->getPostVars();

        /** Atualiza a instância */
        $devedor->nome = $post['nome'] ?? $devedor->nome;
        $devedor->identificacao = $post['identificacao'] ?? $devedor->identificacao;
        $devedor->titulo = $post['titulo'] ?? $devedor->titulo;
        $devedor->endereco = $post['endereco'] ?? $devedor->endereco;
        $devedor->valor = $post['valor'] ?? $devedor->valor;
        $devedor->data_vencimento = $post['data_vencimento'] ?? $devedor->data_vencimento;
        $devedor->data_nascimento = $post['data_nascimento'] ?? $devedor->data_nascimento;
        $devedor->user_id = $_SESSION['usuario']['id'];

        $devedor->update();

        /** redireciona o usuário */
        $request->getRouter()->redirect('/devedor');
    }


    /**
     * Método reponsável por deletar um devedor
     * @param Request $request
     * @param integer $id
     * @return string
     */
    public function getDeleteDevedor($request, $id)
    {
        /** Obtém o devedor do banco de dados */
        $devedor = EntityDevedor::getDevedorById($id);

        /** Valida a instancia */
        if (!$devedor instanceof EntityDevedor) {
            $request->getRouter()->redirect('/devedor');
        }

        /** Conteúdo do form de edit de devedor */
        $content = View::render('/modules/devedor/delete', [
            'nome' => $devedor->nome,
            'identificacao' => $devedor->identificacao,
        ]);

        /** Retorna a página completa */
        return parent::getPanel('Excluir Devedor - PHP MVC', $content, 'devedor');
    }

    /**
     * Método reponsável por deletar um devedor
     * @param Request $request
     * @param integer $id
     * @return string
     */
    public function setDeleteDevedor($request, $id)
    {
        /** Obtém o devedor do banco de dados */
        $devedor = EntityDevedor::getDevedorById($id);

        /** Valida a instancia */
        if (!$devedor instanceof EntityDevedor) {
            $request->getRouter()->redirect('/devedor');
        }

        /** Exclui o devedor */
        $devedor->deletar();

        /** redireciona o usuário */
        $request->getRouter()->redirect('/devedor');
    }
}