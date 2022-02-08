<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bank;
use App\Models\Ticket;
use Auth;

class BankLivewire extends Component {
    public $modal = false;
    public $delete = false;
    public $accion = 'store';
    public $mensaje = '';
    public $me = 'MBAN';
    public $modelo_id, $nombre, $cuenta, $moneda, $monto;
    
    public function render() {
        $office_id = Auth::user()->people->office_id;
        return view(
            'admin.bank.index',[
                'banks' => Bank::where('office_id',$office_id)->get(),
            ])->layout('layouts.app',['me'=>$this->me,'tickets' => Ticket::get()]);
    }
    public function create() {
        $this->accion = 'store';
        $this->modal = true;
    }
    public function store() {
        $this->validate([
            'nombre' => 'required',
        ]);
        Bank::create([
            'nombre' => $this->nombre,
            'cuenta' => $this->cuenta,
            'moneda' => $this->moneda,
            'monto' => $this->monto,
        ]);
        $this->limpiar();
        $this->mensaje='Sucursal creada exitosamente';
    }
    public function edit($id) {
        $bank = Bank::find($id);
        $this->modelo_id = $bank->id;
        $this->nombre = $bank->nombre;
        $this->cuenta = $bank->cuenta;
        $this->moneda = $bank->moneda;
        $this->monto = $bank->monto;

        $this->accion = 'edit';
        $this->modal = true;
    }
    public function update() {
        $bank = Bank::find($this->modelo_id);
        $this->validate([
            'nombre' => 'required',
        ]);
        $bank->update([
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
        Bank::destroy($this->modelo_id);
        $this->delete_id = null;
        $this->delete = false;
        $this->mensaje='Sucursal eliminada exitosamente';
    }
    public function limpiar() {
        $this->nombre = null;
        $this->cuenta = null;
        $this->moneda = null;
        $this->monto = null;

        $this->modal = false;
        $this->delete = false;
    }
}
