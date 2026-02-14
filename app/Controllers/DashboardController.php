<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function ObtenerUsuario()
    {
       $session = session();
       $usuario = $session->get('usuario');
       $clave = $session->get('clave');
         if($usuario){
              return view('Usuarios/Dashboard', ['usuario' => $usuario]);
         } else {
              return redirect()->to(base_url('/Dashboard'))->with('error', 'Debes iniciar sesión para acceder al dashboard');
         }
    }
}
