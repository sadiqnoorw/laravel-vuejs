  @extends('layouts.app')

@section('content')
<div class="container">

    <menu-container :items="{{json_encode($menus)}}" resto-id="{{$restoId}}"></menu-container>
    
</div>

@endsection
