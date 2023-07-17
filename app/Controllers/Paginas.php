<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;



class Pages extends BaseController
{
     public function index()
     {
          return view('welcome_message');
     }
     public function view(string $page = 'home')
     {
          if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
               throw new PageNotFoundException($page);
          }
          $categories = model(CategoryModel::class);
          $data = [
               'title' => ucfirst($page),
               'categories' => $categories->getCategories()
          ];




          return view('templates/header', $data) . view('pages/' . $page, $data) . view('templates/footer');

     }
}