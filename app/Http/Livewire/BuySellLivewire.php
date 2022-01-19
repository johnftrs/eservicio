<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BuySell;
use App\Models\Bank;
use App\Models\Tank;
use PDF;
use Auth;

class BuySellLivewire extends Component {
    public $modal = false;
    public $delete = false;
    public $accion = 'store';
    public $mensaje = '';
    public $me = 'MCOM';
    public $modelo_id, $fecha_descarga, $fecha_compra, $hora_descarga, $cantidad, $nro_compra, $factura, $papeleria, $adicional, $debito_banco, $vehiculo, $chofer, $responsable, $observaciones, $tipo, $bank_id, $tank_id;
    public function render() {
        return view(
            'admin.buysell.index',[
                'banks' => Bank::get(),
                'tanks' => Tank::where('office_id',Auth::user()->people->office_id)->get(),
                'buysells' => BuySell::orderBy('id','desc')->get(),
            ])->layout('layouts.app',['me'=>$this->me]);
    }
    public function create() {
        $this->accion = 'store';
        $this->modal = true;
    }
    public function store() {
        $this->validate([
            'cantidad' => 'required',
            'fecha_compra' => 'required',
            'debito_banco' => 'required',
            'bank_id' => 'required',
            'tank_id' => 'required',
        ]);
        BuySell::create([
            'fecha_descarga' => $this->fecha_descarga,
            'fecha_compra' => $this->fecha_compra,
            'hora_descarga' => $this->hora_descarga,
            'cantidad' => $this->cantidad,
            'nro_compra' => $this->nro_compra,
            'factura' => $this->factura,
            'papeleria' => $this->papeleria,
            'adicional' => $this->adicional,
            'debito_banco' => $this->debito_banco,
            'vehiculo' => $this->vehiculo,
            'chofer' => $this->chofer,
            'responsable' => $this->responsable,
            'observaciones' => $this->observaciones,
            'tipo' => 'Compra',
            'bank_id' => $this->bank_id,
            'tank_id' => $this->tank_id,
        ]);
        $tank = Tank::find($this->tank_id);
        $tank->actual += $this->cantidad;
        $tank->update();
        $bank = Bank::find($this->bank_id);
        $bank->monto -= $this->debito_banco;
        $bank->update();
        $this->limpiar();
        $this->mensaje='Compra creada exitosamente';
    }
    public function edit($id) {
        $buysell = BuySell::find($id);
        $this->modelo_id = $buysell->id;
        $this->fecha_descarga = $buysell->fecha_descarga;
        $this->fecha_compra = $buysell->fecha_compra;
        $this->hora_descarga = $buysell->hora_descarga;
        $this->cantidad = $buysell->cantidad;
        $this->nro_compra = $buysell->nro_compra;
        $this->factura = $buysell->factura;
        $this->papeleria = $buysell->papeleria;
        $this->adicional = $buysell->adicional;
        $this->debito_banco = $buysell->debito_banco;
        $this->vehiculo = $buysell->vehiculo;
        $this->chofer = $buysell->chofer;
        $this->responsable = $buysell->responsable;
        $this->observaciones = $buysell->observaciones;
        $this->bank_id = $buysell->bank_id;
        $this->tank_id = $buysell->tank_id;

        $this->accion = 'edit';
        $this->modal = true;
    }
    public function update() {
        $buysell = BuySell::find($this->modelo_id);
        $this->validate([
            'cantidad' => 'required',
            'fecha_compra' => 'required',
            'debito_banco' => 'required',
            'bank_id' => 'required',
            'tank_id' => 'required',
        ]);
        $buysell->update([
            'fecha_descarga' => $this->fecha_descarga,
            'fecha_compra' => $this->fecha_compra,
            'hora_descarga' => $this->hora_descarga,
            'cantidad' => $this->cantidad,
            'nro_compra' => $this->nro_compra,
            'factura' => $this->factura,
            'papeleria' => $this->papeleria,
            'adicional' => $this->adicional,
            'debito_banco' => $this->debito_banco,
            'vehiculo' => $this->vehiculo,
            'chofer' => $this->chofer,
            'responsable' => $this->responsable,
            'observaciones' => $this->observaciones,
            'bank_id' => $this->bank_id,
            'tank_id' => $this->tank_id,
        ]);
        $this->limpiar();
        $this->mensaje='Compra editada exitosamente';
    }
    public function select($id) {
        $this->modelo_id = $id;
        $this->delete = true;
    }
    public function destroy() {
        BuySell::destroy($this->modelo_id);
        $this->delete_id = null;
        $this->delete = false;
        $this->mensaje='Compra eliminada exitosamente';
    }
    public function limpiar() {
        $this->fecha_descarga = null;
        $this->fecha_compra = null;
        $this->hora_descarga = null;
        $this->cantidad = null;
        $this->nro_compra = null;
        $this->factura = null;
        $this->papeleria = null;
        $this->adicional = null;
        $this->debito_banco = null;
        $this->vehiculo = null;
        $this->chofer = null;
        $this->responsable = null;
        $this->observaciones = null;
        $this->bank_id = null;
        $this->tank_id = null;

        $this->modal = false;
        $this->delete = false;
    }
    public function openModalPDF($report_id) {
        $this->modal['accion'] = 'pdf';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Imprimir Arqueo #'.$report_id;
        $this->modal['url_pdf'] = 'admin/ARQUEO-PDF/'.$report_id;
        $report = Report::find($report_id);
        $pdf = PDF::loadView('pdf.arqueo', compact('report'));
        return $pdf->setPaper('letter', 'portrait')->stream('Arqueo.pdf');
    }
}
