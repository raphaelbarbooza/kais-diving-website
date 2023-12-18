@extends('website.layout.website')

@section('title','Sobre')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="index.html">Início</a></li>
                <li class="active"><a href="#">Sobre</a></li>
            </ul>
            <h2 class="page-header__title">Kais Diving</h2>
        </div>
    </section>

    <section class="about-two about-two__home-two" style="background-image: url('{{asset('assets/images/shapes/video-2-bg.png')}}');">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 d-flex about-two__content-wrapper">
                    <div class="mt-3 mb-5">
                        <div class="about-two__content">
                            <div class="block-title text-left">
                                <img src="assets/images/shapes/sec-line-1.png" alt="">
                                <p class="text-uppercase">Kais Diving</p>
                                <h3 class="text-uppercase">Quem Somos</h3>
                            </div>
                            <p>Idealizada e fundada pelo Instrutor Carlos Eduardo A. Bonin ¨Kais¨ profissional altamente capacitado para
                                a pratica de mergulho autônomo e credenciamento de mergulhadores desde o nível básico ate profissional.
                                Somos uma escola de mergulho e atividades aquáticas especializada em aulas exclusivas. Nosso atendimento
                                é voltado para atender às suas necessidades como mergulhador credenciado ou iniciante de forma exclusiva
                                oferecendo um atendimento direcionado para nossos clientes que realizarem a melhor pratica do mergulho
                                autônomo ou atividade aquática com maior segurança.</p>
                            <p>
                                Amante da arte de viajar, Carlos Eduardo transformou seu amor e respeito pelo mar em um trabalho
                                apaixonante, Dedicando 17 anos ao mundo náutico e subaquático dividido entre grandes navegações e
                                expedições ao redor do mundo.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="about-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex about-two__content-wrapper">
                    <div class="my-auto">
                        <div class="about-two__content pr-2">
                            <div class="block-title text-left">
                                <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                                <p class="text-uppercase">Kais Diving</p>
                                <h3 class="text-uppercase">O que fazemos?</h3>
                            </div>
                            <p>Proporcionamos treinamentos desde o curso básico ao profissional, cursos de mergulho
                                técnico, primeiros socorros e diversas especializações coordenados sempre por
                                instrutores experientes e zelando pela segurança e diversão dos nossos clientes.</p>
                            <p>
                                Realizamos atividades como, flutuação snokel, trilhas e viagens especificas no estado do
                                Mato Grosso como mergulho em aldeias indígenas, fervedouros e lugares que so o cerrado e
                                suas belezas podem proporcionar. E nos melhores pontos de mergulho do mundo.
                            </p>
                            <ul class="list-unstyled about-two__list">
                                @foreach(\App\Models\Locations::limit(3)->inRandomOrder()->get() as $location)
                                    <li>
                                        <span class="about-two__list-count"></span>
                                        Conheça: {{$location->getAttribute('title')}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__image wow fadeInRight" data-wow-duration="1500ms">
                        <img src="{{asset('assets/images/resources/about-2-1.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-5 d-flex align-items-center">
                    <img style="position: relative; z-index: 100; width: 100%; height: auto;"
                         src="{{asset('assets/images/resources/about-2-1.jpg')}}" alt="">
                </div>
                <div class="col-lg-6 d-flex about-two__content-wrapper">
                    <div class="my-5">
                        <div class="about-two__content pr-2">
                            <div class="block-title text-left">
                                <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                                <p class="text-uppercase">Kais Diving</p>
                                <h3 class="text-uppercase">Por que mergulhar<br/> conosco?</h3>
                            </div>
                            <p>Oferecemos experiência, segurança e conhecimento..
                                Além de gerenciar cada aspecto da sua experiência, estamos comprometidos com o
                                ecoturismo responsável. Não poupamos esforços para garantir que nossas operações sejam
                                benéficas às comunidades por onde passamos zelando sempre pela conservação e preservação
                                local principalmente em áreas particulares procurando interagir turismo e o
                                agronegócio.</p>
                            <p>
                                Para a realização de atividades aquáticas e subaquáticas a fim de oferecer oportunidades
                                inigualáveis para fotografia e observação da fauna e flora local.
                            </p>
                            <p>
                                Consideramos nossos clientes como amigos e nosso desejo é que retornem para realizar
                                novas atividades.
                            </p>
                            <ul class="list-unstyled about-two__list">
                                @foreach(\App\Models\Course::where('active',1)->limit(3)->inRandomOrder()->get() as $course)
                                    <li>
                                        <span class="about-two__list-count"></span>
                                        {{$course->category->getAttribute('title')}}: {{$course->getAttribute('title')}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-one">
        <div class="video-one__bg" style="background-image: url(assets/images/background/video-bg-2-1.jpg);"></div>

        <div class="container text-center">
            <a href="https://www.youtube.com/watch?v=7rQe_Q4FkaY" class="video-popup"><i class="fa fa-play"></i></a>

            <h3>De baixo de cada pedra, em frente <br> a cada ser, uma nova descoberta <span>te espera</span></h3>
        </div>
    </section>

    <x-website.home-info-data-line></x-website.home-info-data-line>

    <x-website.home-testimonials></x-website.home-testimonials>

    <div class="team-brand__wrapper" style="background-image: url('{{asset('assets/images/shapes/about-brand-team-bg.png')}}');">
        <section class="team-one">
            <div class="container">
                <div class="block-title text-center">
                    <img src="assets/images/shapes/sec-line-1.png" alt="">
                    <p class="text-uppercase">Experts em Mergulho</p>
                    <h3 class="text-uppercase">Nossos Instrutores</h3>
                </div><!-- /.block-title -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-one__single">
                            <img src="assets/images/team/team-1-1.jpg" alt="">
                            <div class="team-one__content">
                                <div class="team-one__content-inner">
                                    <h3>Maggie Goodman</h3>
                                    <span>Co Founder</span>
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div><!-- /.team-one__social -->
                                </div><!-- /.team-one__content-inner -->
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="team-one__single">
                            <img src="assets/images/team/team-1-2.jpg" alt="">
                            <div class="team-one__content">
                                <div class="team-one__content-inner">
                                    <h3>Craig Hawkins</h3>
                                    <span>Co Founder</span>
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div><!-- /.team-one__social -->
                                </div><!-- /.team-one__content-inner -->
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="team-one__single">
                            <img src="assets/images/team/team-1-3.jpg" alt="">
                            <div class="team-one__content">
                                <div class="team-one__content-inner">
                                    <h3>Katharine Alvarez</h3>
                                    <span>Co Founder</span>
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div><!-- /.team-one__social -->
                                </div><!-- /.team-one__content-inner -->
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="team-one__single">
                            <img src="assets/images/team/team-1-4.jpg" alt="">
                            <div class="team-one__content">
                                <div class="team-one__content-inner">
                                    <h3>Mabel Underwood</h3>
                                    <span>Co Founder</span>
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div><!-- /.team-one__social -->
                                </div><!-- /.team-one__content-inner -->
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__single -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
    </div>

@endsection
