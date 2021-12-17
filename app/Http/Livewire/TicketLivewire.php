<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Hosepipe;
use App\Models\Location;
use Auth;

class TicketLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $actiModal = false;
	public $accion = 'store';
	public $me = 'MTIC';
	public $modelo_id, $codigo, $codigo_fin, $monto, $estado, $tipo, $fecha_uso, $driver_id, $vehicle_id, $hosepipe_id, $turn_id;
	public function render() {
		return view(
			'admin.ticket.index',[
				'locations' => Location::get(),
				'tickets' => Ticket::get(),
				'drivers' => Driver::get(),
				'vehicles' => Vehicle::get(),
				'hosepipes' => Hosepipe::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	protected $rules = [
		'codigo' => 'required',
		'monto' => 'required',
		'estado' => 'required',
	];
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		if ($this->codigo_fin == null) {
			$this->codigo_fin = $this->codigo;
		}
		$this->validate();
		for ($i=intval($this->codigo); $i <= intval($this->codigo_fin); $i++) {
			Ticket::create([
				'codigo' => $i,
				'monto' => $this->monto,
				'estado' => $this->estado,
				'tipo' => '',
				'user_id' => Auth::id(),
			]); 
		}
		$this->limpiar();
	}
	public function activar() {
		$this->actiModal = true;
	}
	public function usar() {

		$this->validate();
		Ticket::create([
			'codigo' => $this->codigo,
			'estado' => 'Usado',
			'tipo' => '',
			'user_id' => Auth::id(),
		]);
		$this->limpiar();
	}
	public function edit($id) {
		$ticket = Ticket::find($id);
		$this->modelo_id = $ticket->id;
		$this->codigo = $ticket->codigo;
		$this->monto = $ticket->monto;
		$this->estado = $ticket->estado;
		$this->tipo = $ticket->tipo;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$ticket = Ticket::find($this->modelo_id);
		$this->validate();
		$ticket->update([
			'codigo' => $this->codigo,
			'monto' => $this->monto,
			'estado' => $this->estado,
			'tipo' => $this->tipo,
			'user_id' => Auth::id(),
		]);
		$this->limpiar();
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Ticket::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
	}
	public function limpiar() {
		$this->nombre = '';
		$this->codigo = '';
		$this->codigo_fin = '';
		$this->monto = '';
		$this->estado = '';
		$this->tipo = '';
		$this->fecha_uso = '';
		$this->driver_id = '';
		$this->vehicle_id = '';
		$this->hosepipe_id = '';
		$this->turn_id = '';

		$this->modal = false;
		$this->delete = false;
		$this->actiModal = false;
	}
}
