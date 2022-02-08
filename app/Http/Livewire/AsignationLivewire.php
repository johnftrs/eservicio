<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Asignation;
use App\Models\Ticket;
use App\Models\Client;
use App\Models\Lot;
use Carbon\Carbon;
use Auth;

class AsignationLivewire extends Component {
	public $modal = false;
	public $delete = false;
	public $page = false;
	public $accion = 'store';
	public $mensaje = '';
	public $show_vales = '';
	public $client;
	public $lotes;
	public $cantidad;
	public $me = 'MTIC';
	public $po = 'ASIG';
	public $modelo_id, $client_id, $desde, $hasta, $inicio, $fin, $fecha, $detalle, $lot_id;
	public $office_id;

	public function render() {
		$this->office_id = Auth::user()->people->office_id;
		return view(
			'admin.asignation.index',[
				'asignations' => Asignation::get(),
				'clients' => Client::where('office_id',$this->office_id)->get(),
			])->layout('layouts.app',['me'=>$this->me,'po'=>$this->po]);
	}
	public function asignados() {
		$this->validate([
			'client_id' => 'required',
		]);
		$this->client = Client::find($this->client_id);
		if ($this->desde == null) {
			$this->desde = Carbon::now()->subYear()->format('Y-m-d');
		}
		if ($this->hasta == null) {
			$this->hasta = Carbon::now()->addYear()->format('Y-m-d');
		}
		$this->page = true;
	}
	public function create() {
		$this->lotes = Lot::where('office_id',$this->office_id)->get();
		$this->accion = 'store';
		$this->fecha = Carbon::now()->format('Y-m-d');
		$this->modal = true;
	}
	public function change_lote_cli() {
		$this->inicio = null;
		$this->fin = null;
		$this->detalle = null;
		$this->cantidad = null;
		$this->show_vales = null;
		if ($this->lot_id) {
			$this->lote = Lot::find($this->lot_id);
			$this->show_vales = null;
			$this->show_vales = '<div class="form-group"><label>Vales disponibles: </label></div>';
			for ($i = $this->lote->inicio; $i <= $this->lote->fin; $i++) {
				if(count(Asignation::where('inicio','<=',$i)->where('fin','>=',$i)->where('lot_id',$this->lote->id)->get())>0){
					$this->show_vales .= '<span class="rojo">'.$i.'</span> - ';
				} else {
					if ($this->inicio == null) {
						$this->inicio = $i;
					}
					$this->show_vales .= '<b>'.$i.'</b> - ';
				}
			}
		}
	}
	public function change_fin() {
		if ($this->inicio != null) {
			$this->cantidad = $this->fin - $this->inicio + 1;
		} else {
			$this->cantidad = 'No quedan Vales Disponibles';
		}
	}
	public function store() {
		$lot = Lot::find($this->lot_id);
		$this->validate([
			'lot_id' => 'required',
			'inicio' => 'required',
			'fin' => 'required',
			'client_id' => 'required',
			'fecha' => 'required',
		]);
		$asig = Asignation::create([
			'lot_id' => $this->lot_id,
			'inicio' => $this->inicio,
			'fin' => $this->fin,
			'detalle' => $this->detalle,
			'fecha' => $this->fecha,
			'client_id' => $this->client_id,
			'lot_id' => $lot->id,
		]);
		foreach ($lot->tickets as $key => $ticket) {
			if ($ticket->codigo >= $this->inicio && $ticket->codigo <= $this->fin) {
				if ($ticket->asignation_id == null) {
					$ticket->update([
						'asignation_id' => $asig->id,
						'user_id' => Auth::id(),
					]);
				}
			}
		}
		$this->client = Client::find($this->client_id);
		$this->limpiar();
		$this->mensaje='Vales editados exitosamente';
	}
	public function edit($id) {
		$asignation = Asignation::find($id);
		$this->modelo_id = $asignation->id;
		$this->nombre = $asignation->nombre;
		$this->cuenta = $asignation->cuenta;
		$this->moneda = $asignation->moneda;
		$this->monto = $asignation->monto;

		$this->accion = 'edit';
		$this->modal = true;
	}
	public function update() {
		$asignation = Asignation::find($this->modelo_id);
		$this->validate([
			'nombre' => 'required',
		]);
		$asignation->update([
			'nombre' => $this->nombre,
			'cuenta' => $this->cuenta,
			'moneda' => $this->moneda,
			'monto' => $this->monto,
		]);
		$this->limpiar();
		$this->mensaje='Sucursal editada exitosamente';
	}
	public function select($id) {
		$this->modelo_id = $id;
		$this->delete = true;
	}
	public function destroy() {
		Asignation::destroy($this->modelo_id);
		$this->delete_id = null;
		$this->delete = false;
		$this->mensaje='Sucursal eliminada exitosamente';
	}
	public function limpiar() {
		$this->inicio = null;
		$this->fin = null;
		$this->detalle = null;
		$this->cantidad = null;
		$this->fecha = null;
		$this->show_vales = null;

		$this->modal = false;
		$this->delete = false;
	}
	public function close_page() {
		$this->page = false;
		$this->client_id = null;
		$this->desde = null;
		$this->hasta = null;
	}
}
