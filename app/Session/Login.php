<?php

namespace App\Session;

use App\Model\Entity\User;

class Login
{

    /**
     * Método responsável por iniciar a sessão
     */
    private static function init()
    {
        /** Verifica se a sessão não está ativa */
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Método reponsável por criar o login do usuário
     * @param User $user
     * @return boolean
     */
    public static function login($user)
    {
        /** Inicia a sessão */
        self::init();

        /** Define a sessão do usuário */
        $_SESSION['usuario'] = [
            'id' => $user->id,
            'nome' => $user->nome,
            'email' => $user->email,
        ];
        return true;
    }

    /**
     * Método reponsável por verificar se o usuário está logado
     * @return boolean
     */
    public static function isLogged()
    {
        /** Inicia a sessão */
        self::init();

        /** Retorna a verificação */
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Método responsável por executar logout do usuário
     * @return boolean
     */
    public static function logout()
    {
        /** Inicia a sessão */
        self::init();

        /** Deslogo usuário */
        unset($_SESSION['usuario']);

        return true;
    }
}
