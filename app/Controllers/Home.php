<?php

namespace App\Controllers;

use App\Models\ModeloCategoria;
use App\Models\ModeloNoticias;


class Home extends BaseController
{
    public function index()
    {
        $modeloNoticias = model(ModeloNoticias::class);

        $modeloCategoria = model(ModeloCategoria::class);





        $data = [
            'titulo' => 'home',
            'noticias' => $modeloNoticias->getNoticiasComCategorias(),
            'categorias' => $modeloCategoria->getCategorias(),
        ];

        return view('templates/header', $data) . view('home') . view('templates/footer');
    }
}