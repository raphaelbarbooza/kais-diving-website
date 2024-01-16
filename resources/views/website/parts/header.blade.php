<div class="topbar-one">
    <div class="container">
        <div class="topbar-one__left">

        </div><!-- /.topbar-one__left -->
        <div class="topbar-one__social">
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
        </div><!-- /.topbar-one__social -->
    </div><!-- /.container -->
</div><!-- /.topbar-one -->

<nav class="main-nav-one stricky">
    <div class="container">
        <div class="main-nav-one__infos">
            <a class="main-nav-one__infos-phone"
               href="tel:{{\App\Helpers\StringHelper::onlyNumbers(\App\Services\ShortOptionsServices::getOption('contact','main_phone_number'))}}">
                <i class="fa fa-phone-alt"></i>
                {{\App\Services\ShortOptionsServices::getOption('contact','main_phone_number')}}
            </a>
            <a class="main-nav-one__infos-email"
               href="mailto:{{\App\Services\ShortOptionsServices::getOption('contact','main_email_address')}}">
                <i class="fa fa-envelope"></i>
                {{\App\Services\ShortOptionsServices::getOption('contact','main_email_address')}}
            </a>
        </div><!-- /.main-nav-one__infos -->
        <div class="inner-container">
            <div class="logo-box">
                <a href="{{route('website.home')}}">
                    <img src="{{asset('assets/images/logo-1-1.png')}}" alt="" width="143">
                </a>
                <a href="#" class="side-menu__toggler"><i class="fa fa-bars"></i></a>
            </div><!-- /.logo-box -->
            <div class="main-nav__main-navigation">
                <ul class="main-nav__navigation-box">
                    <li class="dropdown">
                        <a href="{{route('website.home')}}">Home</a>
                    </li>
                    <li><a href="{{route('website.about')}}">Sobre</a></li>
                    <li class="dropdown">
                        <a href="{{route('website.all-courses')}}">Cursos</a>
                        <ul>
                            @foreach(\App\Models\CourseCategory::orderBy('order')->get() as $category)

                                <li><a href="{{route('website.all-courses',['categId' => $category->getAttribute('id')])}}">{{$category->getAttribute('title')}}</a></li>

                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('website.locais')}}">Pontos de Mergulho</a>
                    </li>
                    <li><a href="{{route('website.contato')}}">Contato</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
