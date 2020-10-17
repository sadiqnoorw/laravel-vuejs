@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row mb-3">
		<div class="col-md-12">
			<h2> Manage orders for {{ $resto->name }} </h2>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			@if ($orders->count() > 0)
			<div class="mb-3 float-right">
				<a href="{{route('resto.orders.add', $resto->id)}}" class="btn btn-primary">Add Order </a>
			</div>
			<manage-orders
				:orders="{{json_encode($orders)}}"
			></manage-orders>
			{{ $orders->render() }}
			@else
				<p> You don't have any orders yet. </p>
			@endif
			 
		</div>
	</div>
</div>

@endsection