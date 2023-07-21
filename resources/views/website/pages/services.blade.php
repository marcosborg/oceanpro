@extends('layouts.website')

@section('header')

<div class="container-fluid header"></div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Sobre Nós</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Serviços</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

@endsection

@section('content')

<div class="container">
    <div class="row">
        @foreach ($services as $service)
        <div class="col-md-6 col-sm-6">
            <div class="card mb-4"">
                <img class=" card-img-top" style="background-image: url('{{ $service->image->getUrl() }}')">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->title }}</h5>
                    <p class="card-text">{{ $service->text }}</p>
                    <a href="@if ($service->id == 1)
                    /services/mergulho-profissional
                    @elseif ($service->id == 2)
                    /services/inspecao-e-reabilitacao
                    @elseif ($service->id == 3)
                    /services/dragagens-e-drenagens
                    @else
                    /services/manutencao-de-ambientes-industriais
                    @endif" class="btn btn-theme">Ler mais</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('styles')
<style>
    .card-img-top {
        height: 30vh;
        background-position: center;
        background-size: cover;
    }
</style>
@endsection

@section('scripts')
<script>
    console.log({!! $services !!})
</script>
@endsection