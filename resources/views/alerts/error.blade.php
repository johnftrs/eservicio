@if($mensaje!='')
<div class="alert success-soft " wire:poll.4000ms="$set('mensaje','')">
	<button type="button" class="close_alert" wire:click="$set('mensaje','')"><span>&times;</span></button>
	{{$mensaje}}
</div>
@endif