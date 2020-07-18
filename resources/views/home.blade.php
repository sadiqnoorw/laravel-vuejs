@extends('layouts.app')

@section('content')
<div class="container">

    <restos-group :restos="{{json_encode($restos)}}"></restos-group>

    <menu-container :items="{{json_encode($menus)}}" resto-id="{{$restoId}}"></menu-container>
</div>

@endsection
