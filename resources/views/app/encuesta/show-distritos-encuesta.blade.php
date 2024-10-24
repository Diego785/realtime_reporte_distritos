@extends('layouts.main')

@section('content')
    @livewire('show-distritos-encuesta',  ['encuesta' => $encuesta])
@endsection