@extends('website.layout.website')

@section('title','Local : '.$location->getAttribute('title'))

@section('content')

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/background/footer-bg-1-1.jpg);"></div>

        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{route('website.home')}}">Início</a></li>
                <li><a class="active" href="{{route('website.locais')}}">Pontos de Mergulho</a></li>
            </ul>
            <h2 class="page-header__title">{{$location->getAttribute('title')}}</h2>
        </div>
    </section>

    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details__main">
                        <div class="blog-one__image">
                            <a href="#" class="blog-one__date">{{$location->getAttribute('city_name')}}</a>
                            <div class="blog-one__image-inner">
                                <img
                                    src="{{asset(\Illuminate\Support\Facades\Storage::url($location->getAttribute('large_image')))}}"
                                    alt="">
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <div class="blog-one__meta">
                                @if($location->getAttribute('latitude') && $location->getAttribute('longitude'))
                                    <a target="_blank"
                                       href="https://www.google.com.br/maps/{{ "@".$location->getAttribute('latitude').",".$location->getAttribute('longitude') }},15z?entry=ttu">
                                        <i class="fas fa-map-marker"></i> Localização
                                    </a>
                                @endif
                            </div>
                            <h3 class="blog-details__main-title">
                                {{$location->getAttribute('title')}}
                            </h3>
                            @foreach($location->getAttribute('long_description') as $section)

                                @if($section['type'] == 'section')
                                    @if($section['data']['title'])
                                        <h4>{{$section['data']['title']}}</h4>
                                    @endif
                                    <p>{!! $section['data']['content'] !!}</p>
                                @endif

                                @if($section['type'] == 'gallery')
                                    @if($section['data']['title'])
                                        <h4>{{$section['data']['title']}}</h4>
                                    @endif
                                    @if($section['data']['pictures'])
                                        <section class="gallery-one">
                                            <div class="container">
                                                <div class="row">
                                                    @foreach($section['data']['pictures'] as $image)

                                                        <div class="col-lg-3 col-md-4">
                                                            <div class="gallery-one__single">
                                                                <div
                                                                    style="max-width:100%; height: 250px; width: 300px; background-size: cover; background-position: center; background-image: url('{{asset(\Illuminate\Support\Facades\Storage::url($image['picture']))}}')">
                                                                </div>
                                                                <a href="{{asset(\Illuminate\Support\Facades\Storage::url($image['picture']))}}"
                                                                   class="img-popup"><i
                                                                        class="scubo-icon-plus-symbol"></i></a>
                                                            </div>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                    @endif
                                @endif

                                @if($section['type'] == 'videos')

                                    @if($section['data']['title'])
                                        <h4>{{$section['data']['title']}}</h4>
                                    @endif

                                    <div class="video-gallery">
                                        <div class="container wow fadeIn" data-wow-duration="2000ms">
                                            <div
                                                class="testimonials-one__carousel owl-carousel owl-theme thm__owl-carousel thm__owl-dot-2"
                                                data-options='{"items": 3, "margin": 30, "loop": true, "autoplay": true, "autoplayTimeout": 5000, "autoplayHoverPause": true, "smartSpeed": 700, "responsive": {"0": {"items": 1, "dots": false, "nav": true}, "480": {"items": 1, "dots": false, "nav": true}, "767": {"items": 1, "dots": false, "nav": true}, "991": {"items": 2}, "1199": {"items": 3, "margin": 30}}}'>

                                                @foreach($section['data']['videos'] as $video)

                                                    <a href="{{$video['video_url']}}" class="video-popup">

                                                        <div class="item">
                                                            <div class="testimonials-one__single">
                                                                <div class="testimonials-one__content">
                                                                    <div class="testimonials-one__content-inner">
                                                                        <iframe
                                                                            style="max-width: 100%; width: 400px; height: 250px;"
                                                                            src="{{\App\Helpers\StringHelper::getYoutubeEmbedUrl($video['video_url'])}}"
                                                                            frameborder="0"
                                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                            allowfullscreen></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </a>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                @endif

                                @if($section['type'] == 'button')
                                    <a href="{{$section['data']['url']}}" class="thm-btn course-details__btn">{{$section['data']['title']}}</a>
                                @endif

                            @endforeach
                        </div>
                    </div>
                    @if($location->getAttribute('latitude') && $location->getAttribute('longitude'))
                        <div class="blog-details__author" style="padding: 0px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3826.6863543871787!2d{{$location->getAttribute('longitude')}}2409822!3d{{$location->getAttribute('latitude')}}39204267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTbCsDI2JzI2LjciUyA1NMKwNDAnMDkuMCJX!5e0!3m2!1spt-BR!2sbr!4v1705365193000!5m2!1spt-BR!2sbr" style="border:0; width: 100%; height: 250px;"></iframe>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Outros Locais</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach($random as $rand)
                                    <li>
                                        <a href="{{route('website.local',['location' => $rand->getAttribute('id')])}}">
                                            {{$rand->getAttribute('title')}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
