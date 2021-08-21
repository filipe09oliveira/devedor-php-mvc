<?php

namespace App\Controller;

use App\Utils\View;

class Alert
{
    /**
     * Método responsável por retornar uma mensagem de erro
     * @param string $message
     * @return string
     */
    public static function getError($message)
    {
        return View::render('alert/status', [
            'tipo' => 'danger',
            'mensagem' => $message
        ]);
    }

    /**
     * Método responsável por retornar uma mensagem de successo
     * @param string $message
     * @return string
     */
    public static function getSuccess($message)
    {
        return View::render('alert/status', [
            'tipo' => 'success',
            'mensagem' => $message
        ]);
    }

}