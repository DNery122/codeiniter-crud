<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Producto;

class ProductoController extends BaseController
{
    public function index()
    {
        $producto = new Producto();
        $datos['productos'] = $producto->orderBy('id','DESC')->findAll();
        $datos['header'] = view('templates/Header');
        $datos['footer'] = view('templates/Footer');
        return view('Productos/Listar', $datos);
    }
    public function crear()
    {
        $datos['header'] = view('templates/Header');
        $datos['footer'] = view('templates/Footer');
        return view('Productos/Crear', $datos);
    }
    public function guardar()
    {
        $producto = new Producto();
        $validacion = $this->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'imagen' => ['uploaded[imagen]']
        ]);
        if ($validacion) {
            $imagen = $this->request->getFile('imagen');
            $nombre = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nombre);
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'descripcion' => $this->request->getVar('descripcion'),
                'precio' => $this->request->getVar('precio'),
                'imagen' => 'http://localhost/CodeIgniter/CRUD/public/uploads/' . $nombre
            ];
            $producto->insert($datos);
            return $this->response->redirect(site_url('/'));
        }else{
            $session = session();
            $session->setFlashdata('mensaje','Revisa los campos con * son obligatorios');
            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('/crear')); 
        }
    }
    public function editar($id)
    {
        $producto = new Producto();
        $datos['header'] = view('templates/Header');
        $datos['footer'] = view('templates/Footer');
        $datos['producto'] = $producto->where('id', $id)->first();
        return view('Productos/Editar', $datos);
    }
    public function actualizar()
    {
        $producto = new Producto();
        $id = $this->request->getVar('id');
        $validacion = $this->validate([
            'imagen' => ['uploaded[imagen]']
        ]);
        if ($validacion) {
            $datos = $producto->where('id', $id)->first();
            $imagen = explode("/", $datos['imagen']);
            unlink('../public/uploads/' . $imagen[7]);


            $imagenNueva = $this->request->getFile('imagen');
            $nombre = $imagenNueva->getRandomName();
            $imagenNueva->move('../public/uploads/', $nombre);
            $datosNuevos = [
                'nombre' => $this->request->getVar('nombre'),
                'descripcion' => $this->request->getVar('descripcion'),
                'precio' => $this->request->getVar('precio'),
                'imagen' => 'http://localhost/CodeIgniter/CRUD/public/uploads/' . $nombre
            ];
        } else {
            $datosNuevos = [
                'nombre' => $this->request->getVar('nombre'),
                'descripcion' => $this->request->getVar('descripcion'),
                'precio' => $this->request->getVar('precio')
            ];
        }
        $producto->update($id, $datosNuevos);
        return $this->response->redirect(site_url('/'));
    }
    public function eliminar($id)
    {
        $producto = new Producto();
        $datos = $producto->where('id', $id)->first();
        if ($datos['id'] > 10) {
            $imagen = explode("/", $datos['imagen']);
            unlink('../public/uploads/' . $imagen[7]);
        }
        $producto->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/'));
    }
}
