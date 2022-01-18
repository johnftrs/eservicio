<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Dispenser;
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
	public $modelo_id, $codigo, $serie, $codigo_fin, $monto, $estado='Activo', $fecha_uso, $detalle, $driver_id, $vehicle_id, $dispenser_id, $turn_id;
	public function render() {
		return view(
			'admin.ticket.index',[
				'tickets' => Ticket::where('office_id',Auth::user()->people->office_id)->get(),
				'drivers' => Driver::join('clients', 'clients.id', '=', 'drivers.client_id')->select('drivers.*')->where('clients.office_id',Auth::user()->people->office_id)->get(),
				'vehicles' => Vehicle::join('clients', 'clients.id', '=', 'vehicles.client_id')->select('vehicles.*')->where('clients.office_id',Auth::user()->people->office_id)->get(),
				'dispensers' => Dispenser::where('office_id',Auth::user()->people->office_id)->get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		if ($this->codigo_fin == null) {
			$this->codigo_fin = $this->codigo;
		}
		$this->validate([
			'codigo' => 'required',
			'estado' => 'required',
		]);
		for ($i=intval($this->codigo); $i <= intval($this->codigo_fin); $i++) {
			Ticket::create([
				'codigo' => $i,
				'serie' => $this->serie,
				'monto' => $this->monto,
				'estado' => $this->estado,
				'user_id' => Auth::id(),
				'office_id' => Auth::user()->people->office_id,
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
			'dispenser_id' => 'required',
			'turn_id' => 'required',
		]);
		$ticket = Ticket::find($this->codigo);
		if (isset($ticket->id)) {
			if ($ticket->estado == 'Activo') {
				$ticket->update([
					'codigo' => $this->codigo,
					'serie' => $this->serie,
					'monto' => $this->monto,
					'estado' => 'Usado',
					'fecha_uso' => Carbon::now(),
					'detalle' => $this->detalle,
					'driver_id' => $this->driver_id,
					'vehicle_id' => $this->vehicle_id,
					'dispenser_id' => $this->dispenser_id,
					'turn_id' => $this->turn_id,
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
		$this->serie = $ticket->serie;
		$this->detalle = $ticket->detalle;
		$this->monto = $ticket->monto;
		$this->estado = $ticket->estado;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$ticket = Ticket::find($this->modelo_id);
		$this->validate([
			'codigo' => 'required',
			'estado' => 'required',
		]);
		$ticket->update([
			'codigo' => $this->codigo,
			'serie' => $this->serie,
			'monto' => $this->monto,
			'estado' => $this->estado,
			'detalle' => $this->detalle,
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
		$this->nombre = null;
		$this->codigo = null;
		$this->codigo_fin = null;
		$this->serie = null;
		$this->monto = null;
		$this->estado = 'Activo';
		$this->fecha_uso = null;
		$this->driver_id = null;
		$this->vehicle_id = null;
		$this->dispenser_id = null;
		$this->turn_id = null;

		$this->modal = false;
		$this->delete = false;
		$this->actiModal = false;
	}
}
