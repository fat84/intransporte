@extends('layouts.app')
@section('nombre_pagina')
    FacturaS
@endsection

@section('content')
    @if($message=Session::has('message'))
        <script>
            $(document).ready(function () {
                swal(
                    'En hora buena!',
                    '{{Session::get('message')}}',
                    'success'
                )
            });
        </script>
    @endif
@stop
@section('scripts')
@stop