@extends('layouts.header')

@section("cssPage")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('main')
    <div class="grafica_masVen">
        <canvas id="myChart"></canvas>
    </div>
@endsection
    

@section('jsPage')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/moduloReporte.js"></script>
    
@endsection