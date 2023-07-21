@extends('layouts.website')

@section('header')

<div class="container-fluid header"></div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs" style="
    padding: 40px 0 0;
">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Contactos</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Contactos</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

@endsection

@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg" style="
    padding: 0 0 40px 0;
">
    <div class="container">

        <div class="row mt-5 justify-content-center">

            <div class="col-lg-10">

                <div class="info-wrap">
                    <div class="row">
                        <div class="col-lg-4 info">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Endereço:</h4>
                            <p>Av. De Roma 56, 1ºesq 1700-167<br>Lisboa, Portugal</p>
                        </div>

                        <div class="col-lg-4 info mt-4 mt-lg-0">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>daniel.goncalves@oceanpro.pt</p>
                        </div>

                        <div class="col-lg-4 info mt-4 mt-lg-0">
                            <i class="bi bi-phone"></i>
                            <h4>Telefone:</h4>
                            <p>+351 910 164 648</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->

<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3111.666056571795!2d-9.143778223602517!3d38.74842475547972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1933a940dfe6c3%3A0xea500e45aaea04e8!2sAv.%20de%20Roma%2056%2C%201700-167%20Lisboa!5e0!3m2!1sen!2spt!4v1688999877674!5m2!1sen!2spt"
    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <div class="card">
                <form action="/forms/contact" method="post">
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
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mensagem</label>
                            <textarea name="message" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group ">
                            <div>
                                <input type="checkbox" name="privacy" id="privacy" value="1" required="">
                                <label class="required" for="privacy" style="font-weight: 400">Concordo que os meus
                                    dados estejam a ser coletados e enviados.</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-theme">Enviar</button>
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