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
                <li>Sobre nós</li>
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
                <p>{{ $page->description }}</p>
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

@endsection

<script>
    console.log({!! $page !!})
</script>