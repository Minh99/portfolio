<nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('assets/imgs/logo.png') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto align-items-center">
                @foreach ($menu as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="#{{ $item }}"> {{ __("messages.menu.$item") }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (App::currentLocale() == 'en')
                                <img src="{{ asset("assets/imgs/en.png")}}" alt="US" width="24">
                            @else
                                <img src="{{ asset("assets/imgs/vi.png")}}" alt="VI" width="24">
                            @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ url('change-language', ['en']) }}">
                            <img src="{{ asset("assets/imgs/en.png")}}" alt="United States" width="24"> US
                          </a>
                          <a class="dropdown-item" href="{{ url('change-language', ['vi']) }}">
                            <img src="{{ asset("assets/imgs/vi.png")}}" alt="Canada" width="24"> VI
                          </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>          
</nav>

<header class="header" id="Home">
    <div class="container">
        <div class="infos">
            <h6 class="subtitle">{{ __('messages.hello') }}</h6>
            <h6 class="title">{{ __('messages.team') }}</h6>
            <p>{{ __('messages.jobs') }}</p>

            {{-- <div class="buttons pt-3">
                <button class="btn btn-primary rounded" disable="true">HIRE ME</button>
                <button class="btn btn-dark rounded" disable="true">DOWNLOAD CV</button>
            </div>       --}}

            <div class="socials mt-4">
                <a class="social-item" href="javascript:void(0)"><i class="ti-facebook"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-google"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-github"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-twitter"></i></a>
            </div>
        </div>              
        {{-- <div class="img-holder">
            <img src="{{ asset('assets/imgs/logo.png') }}" alt="">
        </div>       --}}
    </div>  

    <div class="widget">
        <div class="widget-item">
            <h2>24</h2>
            <p>Happy Clients</p>
        </div>
        <div class="widget-item">
            <h2>7</h2>
            <p>Project Completed</p>
        </div>
    </div>
</header>
