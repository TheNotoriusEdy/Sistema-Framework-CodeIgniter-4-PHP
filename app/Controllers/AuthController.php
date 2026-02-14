<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function registro()
    {
        return view('Usuarios/Login');
    }

    public function InsertarUsuario()
    {
        //1- Definimos las variables para almacenar los datos del formulario
        $usuario = $this->request->getPost('nombre_usuario');
        $apellido = $this->request->getPost('apellido_usuario');
        $email = $this->request->getPost('correo');
        $clave = $this->request->getPost('clave');
        //2- Encriptamos la contraseña
        $clavehash = password_hash($clave, PASSWORD_DEFAULT);

        //3- Creamos modelo para SupaBase

        $model = new UsuarioModel();

        $data = [
            'nombre_usuario' => $usuario,
            'apellido_usuario' => $apellido,
            'correo' => $email,
            'clave' => $clavehash
        ];

        if($model->insert($data)){
            return redirect()->to(base_url('/dashboard?registro=exitoso'));
        } else {
            return redirect()->back()->with('error', 'Error al registrar el usuario');
        }
    }

    public function login()
    {
        $usuario = $this->request->getPost('usuario');
        $clave = $this->request->getPost('clave');
        $model = new UsuarioModel();
        $user = $model->where('correo', $usuario)
                    ->orWhere('nombre_usuario', $usuario)
                    ->first();
        
        if($user){
            if(password_verify($clave, $user['clave'])){
                session()->set('usuario', $user);
                return redirect()->to(base_url('/dashboard'));
            } else {
                return redirect()->back()->with('error', 'Contraseña incorrecta');
            }
        } else {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }
    }
}
