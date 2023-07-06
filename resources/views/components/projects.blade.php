<section id="portfolio" class="section">
    <div class="container text-center pt-4">
        <h6 class="section-title mb-4 pt-4">{{ __('messages.projects') }}</h6>
        <div class="row">
            @foreach ($projects as $i => $project)
                <div class="col-sm-6 col-md-3 shadow-lg p-3 mb-5 bg-white rounded mx-4">
                    <div class="custom-card card border">
                        <div class="card-body ccc">
                            @if(!empty($project['type']) && $project['type'] == 'app')
                                <i class="icon ti-crown"></i>
                            @else
                                <i class="icon ti-desktop"></i>
                            @endif
                            <h5>{{ $project['title'] }}</h5>
                            <a href="{{ route('detail', ['id' => $project['directory']]) }}" target="_blank">
                                View
                                <span class="ti-arrow-right">  </span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
