<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PdfLivewire extends Component {
    public $modal = array('active'=>false,'title'=>'','accion'=>'store','url_pdf'=>'');
    public $mensaje = '';
    public $me = 'RMOVD';
    public $po = 'RMOVD';
    public function render()
    {
        return view('livewire.pdf-livewire');
    }
    public function movimiento_diario() {
        $this->mensaje = 'pdf';
        return view('admin.pdf.movimiento_diario');
        $this->modal['accion'] = 'pdf';
        $this->modal['active'] = true;
        $this->modal['title'] = 'Imprimir Arqueo #'.$report_id;
        $this->modal['url_pdf'] = 'admin/ARQUEO-PDF/'.$report_id;
        $report = Report::find($report_id);
        $pdf = PDF::loadView('pdf.arqueo', compact('report'));
        return $pdf->setPaper('letter', 'portrait')->stream('Arqueo.pdf');
    }
}
