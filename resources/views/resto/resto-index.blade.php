@extends('layouts.app')

@section('content')
<div class="container">

    <restos-group :restos="{{json_encode($restos)}}"></restos-group>

</div>

@endsection