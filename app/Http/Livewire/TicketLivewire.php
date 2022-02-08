<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Lot;
use App\Models\Asignation;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Dispenser;
use App\Models\Client;
use Carbon\Carbon;
use Auth;

class TicketLivewire extends Component
{
	public $modal = false;
	public $delete = false;
	public $accion = 'store';
	public $page = false;
	public $client;
	public $grupo;
	public $show_vales;
	public $lote;
	public $mensaje = '';
	public $me = 'MTIC';
	public $po = 'TIC';
	public $modelo_id, $codigo, $inicio, $fin, $serie, $monto, $office_id, $estado='Activo', $client_id, $detalle, $lot_id;
	
	public function render() {
		$office_id = Auth::user()->people->office_id;
		return view(
			'admin.ticket.index',[
				'lotes' => Lot::where('office_id',$office_id)->orderBy('id','desc')->get(),
				'asignations' => Asignation::get(),
				'tickets' => Ticket::get(),
				'clients' => Client::where('office_id',$office_id)->get(),
				'drivers' => Driver::join('clients', 'clients.id', '=', 'drivers.client_id')->select('drivers.*')->where('clients.office_id',$office_id)->get(),
				'vehicles' => Vehicle::join('clients', 'clients.id', '=', 'vehicles.client_id')->select('vehicles.*')->where('clients.office_id',$office_id)->get(),
				'dispensers' => Dispenser::where('office_id',$office_id)->get(),
			])->layout('layouts.app',['me'=>$this->me,'po'=>$this->po,'tickets' => Ticket::get()]);
	}
	public function create() {
		$this->accion = 'store';
		$this->modal = true;
	}
	public function store() {
		$this->validate([
			'inicio' => 'required',
			'fin' => 'required',
			'serie' => 'required',
			'estado' => 'required',
		]);
		$lot = Lot::create([
			'inicio' => $this->inicio,
			'fin' => $this->fin,
			'fecha' => Carbon::now(),
			'serie' => $this->serie,
			'office_id' => Auth::user()->people->office_id,
		]);
		if ($this->client_id != null) {
			$asig = Asignation::create([
				'inicio' => $this->inicio,
				'fin' => $this->fin,
				'fecha' => Carbon::now(),
				'client_id' => $this->client_id,
			]);
			$asig_id = $asig->id;
		} else { $asig_id = null; }
		for ($i=intval($this->inicio); $i <= intval($this->fin); $i++) {
			Ticket::create([
				'codigo' => $i,
				'monto' => $this->monto,
				'estado' => $this->estado,
				'user_id' => Auth::id(),
				'lot_id' => $lot->id,
				'asignation_id' => $asig_id,
			]); 
		}
		$this->limpiar();
		$this->mensaje='Vales creados exitosamente';
	}
	public function edit($id) {
		$lot = Lot::find($id);
		$this->modelo_id = $lot->id;
		$this->serie = $lot->serie;
		$this->detalle = $lot->tickets->first()->detalle;

		$this->accion = 'edit_lote';
		$this->modal = true;
	}
	public function update() {
		$lot = Lot::find($this->modelo_id);
		$this->validate([
			'serie' => 'required',
			'estado' => 'required',
		]);
		$lot->update([
			'serie' => $this->serie,
			'user_id' => Auth::id(),
		]);
		foreach ($lot->tickets as $key => $ticket) {
			$ticket->update([
				'detalle' => $this->detalle,
				'user_id' => Auth::id(),
			]);
		}
		$this->limpiar();
		$this->mensaje='Vales editados exitosamente';
	}
	public function vales($id) {
		$this->lote = Lot::find($id);
		$this->page = true;
	}
	public function edit_ticket($id) {
		$this->modelo_id = $id;
		$ticket = Ticket::find($id);
		$this->accion = 'edit_ticket';
		$this->codigo = $ticket->codigo;
		$this->monto = $ticket->monto;
		$this->estado = $ticket->estado;
		$this->detalle = $ticket->detalle;
		$this->modal = true;
	}
	public function update_ticket() {
		$ticket = Ticket::find($this->modelo_id);
		$this->validate([
			'codigo' => 'required',
			'estado' => 'required',
		]);
		$ticket->update([
			'codigo' => $this->codigo,
			'monto' => $this->monto ? $this->monto : null,
			'estado' => $this->estado,
			'detalle' => $this->detalle,
			'user_id' => Auth::id(),
		]);
		$this->limpiar();
		$this->mensaje='Vale editado exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Lot::destroy($this->modelo_id);
		$this->modelo_id = null;
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Vales eliminados exitosamente';
	}
	public function limpiar() {
		$this->show_vales = null;
		$this->lot_id = null;
		$this->modelo_id = null;
		$this->client = null;
		$this->client_id = null;
		$this->lote = null;
		$this->inicio = null;
		$this->fin = null;
		$this->codigo = null;
		$this->serie = null;
		$this->monto = null;
		$this->detalle = null;
		$this->estado = 'Activo';

		$this->modal = false;
		$this->delete = false;
	}
}
