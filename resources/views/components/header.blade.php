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
                        @if(isset($isDetail) && $isDetail)
                            <a class="nav-link" data-go-to="{{ $item }}" href="#"> {{ __("messages.menu.$item") }}</a>

                        @else
                            <a class="nav-link" href="#{{ $item }}"> {{ __("messages.menu.$item") }}</a>
                        @endif
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

@php($banner = asset('assets/imgs/banner.jpg'))
{{--@php($banner = 'https://i.pinimg.com/originals/bf/fc/bb/bffcbb3c0a5f66158141ae3e6c89bf11.jpg')--}}
<header class="header" id="Home" style="
    background-image: url('{{ $banner }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
">
    <div class="container infor-header">
        <div class="infos">
            <h6 class="subtitle text-white">{{ __('messages.hello') }}</h6>
            <h6 class="title text-white">{{ $teamName }}</h6>
            <p class="text-white">{{ __('messages.jobs') }}</p>

            <div class="socials mt-4">
                <a class="social-item" href="https://www.facebook.com/trantien151198" target="_blank"><i class="ti-facebook"></i></a>
                <a class="social-item" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=tienit150198@gmail.com" target="_blank"><i class="ti-google"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-github"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-twitter"></i></a>
            </div>
        </div>
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

