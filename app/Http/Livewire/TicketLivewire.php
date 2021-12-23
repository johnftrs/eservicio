<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Hosepipe;
use App\Models\Location;
use Carbon\Carbon;
use Auth;

class TicketLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $actiModal = false;
	public $accion = 'store';
	public $mensaje = '';
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
		$this->mensaje='Ticket creado exitosamente';
	}
	public function activar() {
		$this->actiModal = true;
	}
	public function usar() {
		$this->validate([
			'codigo' => 'required',
			'driver_id' => 'required',
			'vehicle_id' => 'required',
			'hosepipe_id' => 'required',
		]);
		$ticket = Ticket::find($this->codigo);
		if (isset($ticket->id)) {
			if ($ticket->estado == 'Activo') {
				$ticket->update([
					'codigo' => $this->codigo,
					'estado' => 'Usado',
					'fecha_uso' => Carbon::now(),
					'driver_id' => $this->driver_id,
					'vehicle_id' => $this->vehicle_id,
					'hosepipe_id' => $this->hosepipe_id,
					'user_id' => Auth::id(),
				]);
				$this->mensaje = 'Ticket '.$this->codigo.' Activado Exitosamente';
			} else {
				$this->mensaje = 'El ticket '.$this->codigo.' no está habilitado';
			}
		} else {
			$this->mensaje = 'El ticket '.$this->codigo.' no existe';
		}
		$this->limpiar();
		$this->mensaje='Ticket recibido exitosamente';
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
		$this->mensaje='Ticket editado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Ticket::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Ticket eliminado exitosamente';
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
