<section id="about" class="section pt-4">
    <div class="container text-center pt-4">
        <h6 class="section-title mb-4 pt-4">{{ __('messages.introduce') }}</h6>
        <p class="mb-2 pb-2 text-left">{{ __('messages.about_our', ['year' => 3])}}</p>

        {{-- data-interval="3000" --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <i class="ti-angle-left"></i>
                </a>
                @foreach ($members as $index => $member)
                    @php
                        $index += 1
                    @endphp
                    <div class="carousel-item @if ($index == 1) active @endif">
                        <div class="card testmonial-card border">
                            <div class="card-body">
                                <img src=' {{ asset("assets/imgs/user-$index.png") }} ' alt="">
                                <p>
                                    {{ $member['skill'] }}
                                    <a target="_blank" class="subtitle p-1" href="{{ $member['link-cv'] }}">
                                        {{ __('messages.show_more')}} <i class="ti-layout-media-right"></i>
                                    </a>
                                </p>
                                <h1 class="title">{{ $member['name'] }}</h1>
                                <h1 class="subtitle">Full Stack Developer</h1>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <i class="ti-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
    