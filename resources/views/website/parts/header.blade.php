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
                        <ul>
                            <li><a href="index.html">Home 01</a></li>
                            <li><a href="index-2.html">Home 02</a></li>
                            <li><a href="index-rtl.html">Home RTL</a></li>
                            <li class="dropdown">
                                <a href="#">Header Styles</a>
                                <ul>
                                    <li><a href="index.html">Header 01</a></li>
                                    <li><a href="index-2.html">Header 02</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li class="dropdown">
                        <a href="courses.html">Courses</a>
                        <ul>
                            <li><a href="courses.html">Courses</a></li>
                            <li><a href="course-details.html">Course Details</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Pages</a>
                        <ul>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="news.html">Latest News</a>
                        <ul>
                            <li><a href="news.html">News Page</a></li>
                            <li><a href="news-details.html">News Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul><!-- /.main-nav__navigation-box -->
            </div><!-- /.main-nav__main-navigation -->
        </div><!-- /.inner-container -->
    </div><!-- /.container -->
</nav><!-- /.main-nav-one -->
