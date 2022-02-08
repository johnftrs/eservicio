<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;
use App\Models\Human;
use App\Models\Ticket;
use PDF;
use Auth;

class FrontLivewire extends Component {
	public $sucursal;

	public function render() {
		$office_id = Auth::user()->people->office_id;
		$this->sucursal = Auth::user()->people->office->nombre;
		return view(
			'admin.front.index',[
				'offices' => Office::get(),
			])->layout('layouts.app',['tickets' => Ticket::get()]);
	}
	public function cambio($office_id) {
		$people = Human::find(Auth::id());
		$people->office_id = $office_id;
		$people->update();
		return redirect(request()->header('Referer'));
	}
}