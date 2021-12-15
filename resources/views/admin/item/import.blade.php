@extends('layouts.admin')
@section('content')
@include('alerts.request')
<script> document.title = "Importar Datos"</script>
<div class="card screen">
	<div class="card-body">
		<div class="flotantes">
			<div class="flex ">
				<div class="f24" style="margin-top:10px;">Importar Datos</div>
			</div>
		</div>
		<div class="table-responsive">
			<form action="{{url('/admin/import/import_post')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					{!! Form::label('Importar Excel') !!}
					{!! Form::file('excel',['class'=>'form-control','accept'=>'.xls,.xlsx']) !!}
				</div>
				<div class="col-2 nb">
					{!! Form::submit('Subir',['class'=>'btn primary col-4']) !!}
				</div>
			</form>
		</div>
	</div>
</div>
@endsection