<footer class="site-footer-one">

    <div class="site-footer-one__bg" style="background-image: url('{{asset('assets/images/background/footer-bg-1-1.jpg')}}');"></div>

    <img src="{{asset('assets/images/shapes/fish-f-1.png')}}" alt="" class="site-footer__fish-1">
    <img src="{{asset('assets/images/shapes/fish-f-2.png')}}" alt="" class="site-footer__fish-2">
    <img src="{{asset('assets/images/shapes/fish-f-3.png')}}" alt="" class="site-footer__fish-3">

    <img src="{{asset('assets/images/shapes/tree-f-1.png')}}" class="site-footer__tree-1" alt="">
    <img src="{{asset('assets/images/shapes/tree-f-2.png')}}" class="site-footer__tree-2" alt="">

    <div class="site-footer-one__upper">
        <div class="container">
            <div class="footer-widget-row">
                <div class="footer-widget footer-widget__about">
                    <div class="footer-widget__inner">
                        <a href="{{route('website.home')}}">
                            <img src="{{asset('assets/images/logo-2-1.png')}}" alt="" width="143">
                        </a>
                        <p>&copy; {{date('Y')}}, todos os direitos reservados.</p>
                    </div>
                </div>
                <div class="footer-widget footer-widget__links__widget-1">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title">Empresa</h3>
                        <ul class="footer-widget__links-list list-unstyled">
                            <li><a href="{{route('website.about')}}">Sobre</a></li>
                            <li><a href="#">Cursos</a></li>
                            <li><a href="#">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget footer-widget__links__widget-2">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title">Alguns Cursos</h3>
                        <ul class="footer-widget__links-list list-unstyled">
                            @foreach(\App\Models\Course::where('active','1')->inRandomOrder()->limit(3)->get() as $course)

                                <li><a href="{{route('website.curso',['course' => $course->getAttribute('id')])}}">{{$course->getAttribute('title')}}</a></li>

                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="footer-widget footer-widget__links__widget-3">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title">Pontos de Mergulho</h3>
                        <ul class="footer-widget__links-list list-unstyled">
                            @foreach(\App\Models\Locations::inRandomOrder()->limit(3)->get() as $location)

                                <li><a href="#">{{$location->getAttribute('title')}}</a></li>

                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="footer-widget footer-widget__social__widget">
                    <div class="footer-widget__inner">
                        <h3 class="footer-widget__title">Siga-nos</h3>
                        <div class="footer-widget__social">
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
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="tel:{{\App\Helpers\StringHelper::onlyNumbers(\App\Services\ShortOptionsServices::getOption('contact','main_phone_number'))}}">
                        <i class="fa fa-phone-alt"></i>
                        {{\App\Services\ShortOptionsServices::getOption('contact','main_phone_number')}}
                    </a>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <a href="mailto:{{\App\Services\ShortOptionsServices::getOption('contact','main_email_address')}}">
                        <i class="fa fa-envelope"></i>
                        {{\App\Services\ShortOptionsServices::getOption('contact','main_email_address')}}
                    </a>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <a style="line-height: 18px;" target="_blank" href="https://maps.google.com/?q={{urlencode(\App\Services\ShortOptionsServices::getOption('contact','main_address'))}}">
                        <i class="fa fa-map"></i>
                        {!! \App\Helpers\StringHelper::textToHtml(\App\Services\ShortOptionsServices::getOption('contact','main_address')) !!}
                    </a>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__bottom -->
</footer><!-- /.site-footer-one -->
