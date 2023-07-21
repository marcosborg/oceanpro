@extends('layouts.website')

@section('header')

<div class="container-fluid header"></div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $page->title }}</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="/servicos">Serviços</a></li>
                <li>{{ $page->title }}</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="headline mb-4">
                <p>{{ $service->text }}</p>
            </div>
            {!! $page->text !!}
        </div>
        <div class="col-md-6 col-sm-12">
            <img src="{{ $page->image->getUrl() }}" class="img-fluid">
        </div>
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
    console.log({!! $page !!})
</script>
@endsection