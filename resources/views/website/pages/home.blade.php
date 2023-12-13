@extends('website.layout.website')

@section('title','Início')

@section('content')

    <x-website.home-slider></x-website.home-slider>

    <section class="cta-two">
        <div class="cta-two__bg" style="background-image: url('{{asset('assets/images/background/footer-bg-1-1.jpg')}}');"></div>

        <div class="container">
            <img src="{{asset('assets/images/shapes/slide-ribbon-1-1.png')}}" alt="" class="cta-two__moc">
            <h3>PROFISSIONAIS TREINADOS E QUALIFICADOS <br>
                COM CERTIFICAÇÃO INTERNACIONAL <span>PADI</span></h3>
            <div class="cta-two__btn-block">
                <a href="https://www.padi.com/pt" target="_blank" class="thm-btn cta-two__btn">Mais sobre PADI</a>
            </div>
        </div>
    </section>

    <x-website.home-services-line></x-website.home-services-line>

    <x-website.home-info-data-line></x-website.home-info-data-line>

    <x-website.home-courses-line></x-website.home-courses-line>

    <x-website.home-featured-video-line></x-website.home-featured-video-line>

    <x-website.home-testimonials></x-website.home-testimonials>

    <x-website.home-call-action01></x-website.home-call-action01>

    <x-website.home-about-line></x-website.home-about-line>

    <x-website.home-locations-line></x-website.home-locations-line>
@endsection
