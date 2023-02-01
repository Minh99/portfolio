<nav class="navbar navbar-expand-lg navbar-light fixed-top" data-spy="affix" data-offset-top="0">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/imgs/logo.svg" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto align-items-center">
                @foreach ($menu as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="#{{ $item }}"> {{ $item }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="- btn btn-primary rounded ml-4" href="components.html">Copmonents</a>
                </li>
            </ul>
        </div>
    </div>          
</nav>

<header class="header" id="Home">
    <div class="container">
        <div class="infos">
            <h6 class="subtitle">hello,I'm</h6>
            <h6 class="title">James Smith</h6>
            <p>UI/UX Designer</p>

            <div class="buttons pt-3">
                <button class="btn btn-primary rounded">HIRE ME</button>
                <button class="btn btn-dark rounded">DOWNLOAD CV</button>
            </div>      

            <div class="socials mt-4">
                <a class="social-item" href="javascript:void(0)"><i class="ti-facebook"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-google"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-github"></i></a>
                <a class="social-item" href="javascript:void(0)"><i class="ti-twitter"></i></a>
            </div>
        </div>              
        <div class="img-holder">
            <img src="assets/imgs/man.svg" alt="">
        </div>      
    </div>  

    <!-- Header-widget -->
    <div class="widget">
        <div class="widget-item">
            <h2>124</h2>
            <p>Happy Clients</p>
        </div>
        <div class="widget-item">
            <h2>456</h2>
            <p>Project Completed</p>
        </div>
        <div class="widget-item">
            <h2>789</h2>
            <p>Awards Won</p>
        </div>
    </div>
</header>
