<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Dispenser;
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
	public $ticket_id = null, $codigo, $serie, $monto, $driver_id, $vehicle_id, $dispenser_id;
	public function render() {
		if ($this->ticket_id != null) {
			$this->codigo = Ticket::find($this->ticket_id)->codigo;
			$this->serie = Ticket::find($this->ticket_id)->serie;
		}
		return view(
			'admin.ticket.activador',[
				'tickets' => Ticket::where('office_id',Auth::user()->people->office_id)->get(),
				'drivers' => Driver::join('clients', 'clients.id', '=', 'drivers.client_id')->select('drivers.*')->where('clients.office_id',Auth::user()->people->office_id)->get(),
				'vehicles' => Vehicle::join('clients', 'clients.id', '=', 'vehicles.client_id')->select('vehicles.*')->where('clients.office_id',Auth::user()->people->office_id)->get(),
				'dispensers' => Dispenser::where('office_id',Auth::user()->people->office_id)->get(),
			])->layout('layouts.app',['me'=>$this->me]);
	}
	public function store() {
		$this->validate([
			'monto' => 'required',
			'driver_id' => 'required',
			'vehicle_id' => 'required',
			'dispenser_id' => 'required',
		]);
		$ticket = Ticket::find($this->ticket_id);
		if ($ticket->estado == 'Activo') {
			$ticket->update([
				'estado' => 'Usado',
				'fecha_uso' => Carbon::now(),
				'monto' => $this->monto,
				'driver_id' => $this->driver_id,
				'vehicle_id' => $this->vehicle_id,
				'dispenser_id' => $this->dispenser_id,
				'user_id' => Auth::id(),
			]);
			$this->mensaje = 'Ticket '.$this->codigo.$this->serie.' Activado Exitosamente';
		} else {
			$this->mensaje = 'El ticket '.$this->codigo.$this->serie.' no está habilitado o ya esta usado';
		}
		$this->limpiar();
	}
	public function limpiar() {
		$this->monto = null;
		$this->driver_id = null;
		$this->vehicle_id = null;
		$this->dispenser_id = null;
	}
}