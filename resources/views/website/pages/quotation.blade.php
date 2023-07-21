@extends('layouts.website')

@section('header')

<div class="container-fluid header"></div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Peça-nos uma cotação</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Peça-nos uma cotação</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <div class="card">
                <form action="/forms/quotation" method="post">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Primeiro nome</label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Último nome</label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Contacto telefónico</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Assunto</label>
                            <select name="subject_id" class="form-control" required>
                                <option selected disabled>Selecionar um</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mensagem</label>
                            <textarea name="message" rows="15" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-theme" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <img src="/website/assets/img/call.jpg" class="img-fluid">
        </div>
    </div>

</div>

@endsection

@section('styles')

@endsection