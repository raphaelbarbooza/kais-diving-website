<div class="side-menu__block">

    <a href="#" class="side-menu__toggler side-menu__close-btn"><i class="fa fa-times"></i>
        </a>

    <div class="side-menu__block-overlay custom-cursor__overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>
    <div class="side-menu__block-inner ">

        <a href="{{route('website.home')}}" class="side-menu__logo"><img src="{{asset('assets/images/logo-3-1.png')}}" alt="" width="143"></a>
        <nav class="mobile-nav__container">

        </nav>
        <p class="side-menu__block__copy">&copy; {{date('Y')}} <a href="#">Kais Diving</a> - Todos os direitos reservados.</p>
        <div class="side-menu__social">
            @if(\App\Services\ShortOptionsServices::getOption('contact','social_facebook'))
                <a target="_blank"
                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_facebook')}}">
                    <i class="fab fa-facebook-square"></i>
                </a>
            @endif
            @if(\App\Services\ShortOptionsServices::getOption('contact','social_twitter'))
                <a target="_blank"
                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_twitter')}}">
                    <i class="fab fa-twitter"></i>
                </a>
            @endif
            @if(\App\Services\ShortOptionsServices::getOption('contact','social_youtube'))
                <a target="_blank"
                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_youtube')}}">
                    <i class="fab fa-youtube"></i>
                </a>
            @endif
            @if(\App\Services\ShortOptionsServices::getOption('contact','social_instagram'))
                <a target="_blank"
                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_instagram')}}">
                    <i class="fab fa-instagram"></i>
                </a>
            @endif
        </div>
    </div>
</div>
