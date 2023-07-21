<!-- ======= What We Do Section ======= -->
<section id="what-we-do" class="what-we-do">
    <div class="container">

        <div class="section-title">
            <h2>O Que Fazemos</h2>
            <p>“ The only way around is through”</p>
        </div>

        <div class="row">
            @foreach ($serviceList as $service)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="icon-box">
                    <h4><a href="{{ $service->link }}">{{ $service->title }}</a></h4>
                    <p>{{ $service->text }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End What We Do Section -->