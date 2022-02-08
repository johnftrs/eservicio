<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Factor;
use App\Models\Mensuration;
use App\Models\Report;
use App\Models\Ticket;
use Carbon\Carbon;
use Auth;
use PDF;

class ControlBoxLivewire extends Component {
	public $modal = array('active'=>false,'title'=>'','accion'=>'store','url_pdf'=>'');
	public $mensaje = '';
    public $me = 'MLEC';
    public $po = 'RCNTR';
	public $fecha, $fecha2;

	public function render() {
		$office_id = Auth::user()->people->office_id;
		return view(
			'admin.pdf.cuadro_de_control',[
				'factor' => null,
			])->layout('layouts.app',['me'=>$this->me, 'po'=>$this->po,'tickets' => Ticket::get()]);
	}
	public function openModalPDF($date=null,$date2=null) {
		if ($date!=null) {
			$this->fecha=$date;
			$this->fecha2=$date2;
		} else {
			$date=$this->fecha;
			$date2=$this->fecha2;
		}
		$this->validate([
			'fecha' => 'required',
			'fecha2' => 'required',
		]);
		$this->modal['accion'] = 'pdf';
		$this->modal['active'] = true;
		$this->modal['title'] = 'Suministro de Gas Natural';
		$this->modal['url_pdf'] = 'admin/pdf/cuadro_de_control/'.$date.'/'.$date2;
		$of_id = Auth::user()->people->office_id;
		$factor = Factor::where('office_id',Auth::user()->people->office_id)->orderBy('fecha_inicial','desc')->first();
		$mensurations = Mensuration::where('office_id',$of_id)->whereBetween('fecha',[$date,$date2])->orderBy('fecha','asc')->get();
		$reports = Report::orderBy('fecha')->where('office_id',$of_id)->whereBetween('fecha',[$date,$date2])->orderBy('fecha','asc')->get();
		$pdf = PDF::loadView('pdf.cuadro_de_control', compact('factor','mensurations','reports','date','date2'));
		return $pdf->setPaper('letter', 'portrait')->stream('Reporte.pdf');
	}
	public function limpiar() {
		$this->modal['active'] = false;
		$this->modal['title'] = '';
		$this->modal['url_pdf'] = '';
		$this->modal['accion'] = '';
	}
}