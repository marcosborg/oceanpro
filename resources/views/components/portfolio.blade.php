<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Serviços</h2>
            <p>“The only way around is through”</p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Todos</li>
                    @foreach ($serviceList as $service)
                    <li data-filter=".service-{{ $service->id }}">{{ $service->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">

            @foreach ($innerServices as $service)
            <div class="col-lg-4 col-md-6 portfolio-item service-{{ $service->service_id }} wow fadeInUp">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ $service->image->getUrl() }}" class="img-fluid" alt="">
                        <a href="{{ $service->image->getUrl() }}" data-gallery="portfolioGallery"
                            class="link-preview portfolio-lightbox" title="{{ $service->title }}"><i
                                class="bx bx-plus"></i></a>
                    </figure>

                    <div class="portfolio-info">
                        <strong>{!! $service->title !!}</strong>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section><!-- End Portfolio Section -->