<swiper-container loop="true" navigation="true" pagination="true" scrollbar="true" autoplay="true" effect="fade">
    @foreach ($slides as $slide)
    <swiper-slide>
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex flex-column justify-content-center align-items-center"
            style="background: url('{{ $slide->image->getUrl() }}')">
            <div class="container text-left" data-aos="fade-up">
                <h1>{{ $slide->title }}</h1>
                <h2>{{ $slide->subtitle }}</h2>
                <a href="{{ $slide->link }}" class="btn-get-started scrollto">{{ $slide->button }}</a>
            </div>
        </section><!-- End Hero -->
    </swiper-slide>
    @endforeach
</swiper-container>