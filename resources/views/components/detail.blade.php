<section id="skill" class="section mt-4">
    <div class="container text-center pt-4">
        <h6 class="section-title mb-4 pt-4">{{ $project['title'] }}</h6>
        <p class="mb-2 pb-4 text-left">{{ $project['description'] }}</p>
        <p class="mb-2 pb-4 text-left font-italic">{{ __('messages.some_pictures') }}</p>

        @foreach($project['images'] as $image)
            <img src="{{ Storage::url("public/$image") }}"
                style="
                    border: 2px solid gray;
                    object-fit: contain;
                    width: 100%;
                    margin-bottom: 2rem;
                "
            >
        @endforeach
        </section>
    </div>
</section>
