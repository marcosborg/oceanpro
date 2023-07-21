<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <img src="{{ $feature->image->getUrl() }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 p-5">
                <h2>{{ $feature->title }}</h2>
                <h5 class="mt-5">
                    {{ $feature->text }}
                </h5>
                <a href="{{ $feature->link }}" class="btn btn-theme mt-5">Ler mais</a>
            </div>
        </div>

    </div>
</section><!-- End About Section -->