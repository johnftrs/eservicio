<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Turn;
use App\Models\Report;
use App\Models\Dispenser;
use App\Models\Ticket;
use App\Models\Accounting;
use Carbon\Carbon;
use Auth;
use PDF;

class MovfechasLivewire extends Component {
    public $modal = array('active'=>false,'title'=>'','accion'=>'store','url_pdf'=>'');
    public $mensaje = '';
    public $me = 'MREP';
    public $po = 'RMPF';
    public $turn_id='TODOS', $fecha, $fecha2;

    public function render() {
        return view(
            'admin.pdf.movimiento_por_fechas',[
                'turns' => Turn::where('office_id',Auth::user()->people->office_id)->orderBy('id','asc')->get(),
            ])->layout('layouts.app',['me'=>$this->me, 'po'=>$this->po]);
    }
    public function openModalPDF($id=null,$date=null,$date2=null) {
        if ($id!=null) {
            $this->turn_id=$id;
            $this->fecha=$date;
            $this->fecha2=$date2;
        } else {
            $date=$this->fecha;
            $date2=$this->fecha2;
        }
        $this->validate([
            'fecha' => 'required',
            'fecha2' => 'required',
            'turn_id' => 'required',
        ]);
        $this->modal['accion'] = 'pdf';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Imprimir Reporte';
        $this->modal['url_pdf'] = 'admin/pdf/movimiento_por_fechas/'.$this->turn_id.'/'.$date.'/'.$date2;
        $of_id = Auth::user()->people->office_id;
        if ($this->turn_id=='TODOS') {
            $reports = Report::where('office_id',$of_id)->whereBetween('fecha',[$date,$date2])->get();
            $turno = 'TODOS';
            $accountings = Accounting::join('reports','accountings.report_id','=','reports.id')->select('accountings.*')->orderBy('accountings.id')->where('reports.office_id',$of_id)->whereBetween('reports.fecha',[$date,$date2])->get();
            $tickets = Ticket::where('office_id',$of_id)->whereBetween('fecha_uso',[$date,$date2])->get();
        } else {
            $reports = Report::where('office_id',$of_id)->whereBetween('fecha',[$date,$date2])->where('turn_id',$this->turn_id)->get();
            $turno = Turn::find($this->turn_id)->nombre;
            $accountings = Accounting::join('reports','accountings.report_id','=','reports.id')->select('accountings.*')->orderBy('accountings.id')->where('reports.office_id',$of_id)->whereBetween('reports.fecha',[$date,$date2])->where('reports.turn_id',$this->turn_id)->get();
            $tickets = Ticket::where('turn_id',$this->turn_id)->where('office_id',$of_id)->whereBetween('fecha_uso',[$date,$date2])->get();
        }
        $dispensers = Dispenser::where('office_id',$of_id)->orderBy('id','asc')->get();
        $pdf = PDF::loadView('pdf.movimiento_por_fechas', compact('reports','turno','date','date2','dispensers','tickets','accountings'));
        return $pdf->setPaper('letter', 'portrait')->stream('Reporte.pdf');
    }
    public function limpiar() {
        $this->modal['active'] = false;
        $this->modal['title'] = '';
        $this->modal['url_pdf'] = '';
        $this->modal['accion'] = '';
    }
}