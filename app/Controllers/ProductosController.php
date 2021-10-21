<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;

class ProductosController extends Controller
{

	protected $producto;

	public function index()
	{
		$this->producto = new Producto();
		$items['productos'] = $this->producto->orderBy('id', 'ASC')->findAll();
		$items['cant'] = $this->producto->countAll(false);

		$section = view('productos/listar', $items);
		$data['title'] = 'Listar | Stock de productos';
		return $this->load_template($section, $data);
	}
	protected function load_template($section, $data)
	{
		$datos['head'] = view('template/head', $data);
		$datos['section'] = $section;
		$datos['footer'] = view('template/footer');

		return view('template/template', $datos);
	}
	public function crear()
	{
		$section = view('productos/crear');
		$data['title'] = 'Registrar | Stock de productos';
		return $this->load_template($section, $data);
	}
	public function save()
	{
		$this->producto = new Producto();

		$validation = $this->validate([
			'id' => 'required',
			'peso' => 'required|integer',
			'name' => 'required|min_length[3]',
			'image' => 'uploaded[image]', 'mime_in[image,image/jpg,image/jpeg,image/png]', 'max_size[image,1024]'
		]);

		if (!$validation) {
			$session = session();
			$session->setFlashdata('mensaje', 'Revise la información');
			return redirect()->back()->withInput();
		}

		if ($image = $this->request->getFile('image')) {
			$newName = $image->getRandomName();
			$image->move('./public/uploads/', $newName);
			$datos = [
				'id' => $this->request->getVar('id'),
				'name' => $this->request->getVar('name'),
				'color' => $this->request->getVar('color'),
				'peso' => $this->request->getVar('peso'),
				'image' => $newName
			];

			$this->producto->insert($datos);
		}
		return redirect()->to(base_url('/'));
	}
	public function delete($id = null)
	{

		$this->producto = new Producto();
		$datosproducto = $this->producto->where('id', $id)->first();

		// Borrar fisicamente el archivo del directorio
		$ruta = ('./public/uploads/' . $datosproducto['image']);
		unlink($ruta);

		// Eliminar en la base de datos
		$this->producto->where('id', $id)->delete($id);

		return redirect()->to(base_url('/'));
	}

	public function edit($id = null)
	{
		$this->producto = new Producto();
		$datos['producto'] = $this->producto->where('id', $id)->first();
		$section = view('productos/editar', $datos);
		$data['title'] = 'Editar | Stock de productos';

		return $this->load_template($section, $data);
	}

	public function update()
	{
		$this->producto = new Producto();
		$id = $this->request->getVar('id');

		$validation = $this->validate([
			'name' => 'required|min_length[3]',
			'image' =>
			'uploaded[image]',
			'mime_in[image,image/jpg,image/jpeg,image/png]',
			'max_size[image,1024]'
		]);

		if ($validation) {
			if ($image = $this->request->getFile('image')) {

				$datosproducto = $this->producto->where('id', $id)->first();
				$ruta = ('./public/uploads/' . $datosproducto['image']);
				unlink($ruta);

				$newName = $image->getRandomName();
				$image->move('./public/uploads/', $newName);
				$datos = [
					'name' => $this->request->getVar('name'),
					'color' => $this->request->getVar('color'),
					'peso' => $this->request->getVar('peso'),
					'image' => $newName
				];

				$this->producto->update($id, $datos);
			}
		} else {
			$session = session();
			$session->setFlashdata('mensaje', 'Revise la información');
			return redirect()->back()->withInput();
		}


		return redirect()->to(base_url('/'));
	}
}
