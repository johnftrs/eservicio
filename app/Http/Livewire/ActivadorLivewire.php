<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Hosepipe;
use App\Models\Location;
use Auth;
use Carbon\Carbon;

class ActivadorLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $actiModal = false;
	public $accion = 'store';
	public $mensaje = '';
	public $me = 'MTIC';
	public $codigo, $driver_id, $vehicle_id, $hosepipe_id;
	public function render() {
		return view(
			'admin.ticket.activador',[
				'tickets' => Ticket::get(),
				'drivers' => Driver::get(),
				'vehicles' => Vehicle::get(),
				'hosepipes' => Hosepipe::get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	public function store() {
		$this->validate([
			'codigo' => 'required',
			'driver_id' => 'required',
			'vehicle_id' => 'required',
			'hosepipe_id' => 'required',
		]);
		$ticket = Ticket::find($this->codigo);
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
		$this->limpiar();
	}
	public function limpiar() {
		$this->driver_id = null;
		$this->vehicle_id = null;
		$this->hosepipe_id = null;
	}
}