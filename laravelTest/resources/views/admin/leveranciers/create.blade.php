@extends('template')

@section('content')
<form action="{{ action('Leveranciers\LeveranciersController@store') }}" method="POST">
	@csrf
	@InputTextBox('supplier_name')
	@ButtonSubmit('Create')
</form>

<p>{{ $getById }}</p>
@endsection

