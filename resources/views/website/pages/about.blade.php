@extends('website.layout.website')

@section('title','Sobre')

@php

    $sect01 = \App\Services\ShortOptionsServices::getOption('about','sect01');
    $sect02 = \App\Services\ShortOptionsServices::getOption('about','sect02');
    $sect03 = \App\Services\ShortOptionsServices::getOption('about','sect03');
    $sectCall = \App\Services\ShortOptionsServices::getOption('about','call');

@endphp

@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="index.html">Início</a></li>
                <li class="active"><a href="#">Sobre</a></li>
            </ul>
        </div>
    </section>

    <section class="about-two about-two__home-two"
             style="background-image: url('{{asset('assets/images/shapes/video-2-bg.png')}}');">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 d-flex about-two__content-wrapper">
                    <div class="mb-5">
                        <div class="about-two__content">
                            <div class="block-title text-left">
                                <img src="assets/images/shapes/sec-line-1.png" alt="">
                                <h3 class="text-uppercase">{{$sect01['title']}}</h3>
                            </div>
                            {!! $sect01['content'] !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @if($sect02['show'])
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex about-two__content-wrapper">
                        <div class="my-auto">
                            <div class="about-two__content pr-2">
                                <div class="block-title text-left">
                                    <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                                    <p class="text-uppercase">Kais Diving</p>
                                    <h3 class="text-uppercase">{{$sect02['title']}}</h3>
                                </div>
                                {!! $sect02['content'] !!}
                                <ul class="list-unstyled about-two__list">
                                    @foreach(\App\Models\Locations::limit(3)->inRandomOrder()->get() as $location)

                                        <li>
                                            <a href="{{route('website.local',['location' => $location->getAttribute('id')])}}">
                                                <span class="about-two__list-count"></span>
                                                Conheça: {{$location->getAttribute('title')}}
                                            </a>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-two__image wow fadeInRight" data-wow-duration="1500ms">
                            <img src="{{asset(\Illuminate\Support\Facades\Storage::url($sect02['image']))}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($sect03['show'])
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 my-5 d-flex align-items-center">
                        <img style="position: relative; z-index: 100; width: 100%; height: auto;"
                             src="{{asset(\Illuminate\Support\Facades\Storage::url($sect03['image']))}}" alt="">
                    </div>
                    <div class="col-lg-6 d-flex about-two__content-wrapper">
                        <div class="my-5">
                            <div class="about-two__content pr-2">
                                <div class="block-title text-left">
                                    <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                                    <p class="text-uppercase">Kais Diving</p>
                                    <h3 class="text-uppercase">{{$sect03['title']}}?</h3>
                                </div>
                                {!! $sect03['content'] !!}
                                <ul class="list-unstyled about-two__list">
                                    @foreach(\App\Models\Course::where('active',1)->limit(3)->inRandomOrder()->get() as $course)

                                        <li>
                                            <a href="{{route('website.curso',['course' => $course->getAttribute('id')])}}">
                                                <span class="about-two__list-count"></span>
                                                {{$course->category->getAttribute('title')}}
                                                : {{$course->getAttribute('title')}}
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
    @endif

    @if($sectCall['show'])

        <section class="video-one">
            <div class="video-one__bg" style="background-image: url(assets/images/background/video-bg-2-1.jpg);"></div>

            <div class="container text-center">
                <a href="{{$sectCall['url']}}" class="video-popup"><i class="fa fa-play"></i></a>

                <h3>{{$sectCall['title']}}</h3>
            </div>
        </section>

    @endif
    <x-website.home-info-data-line></x-website.home-info-data-line>

    <x-website.home-testimonials></x-website.home-testimonials>

    @php

        $instructors = \App\Models\Instructor::all();

    @endphp

    @if(count($instructors))

        <div class="team-brand__wrapper"
             style="background-image: url('{{asset('assets/images/shapes/about-brand-team-bg.png')}}');">
            <section class="team-one">
                <div class="container">
                    <div class="block-title text-center">
                        <img src="assets/images/shapes/sec-line-1.png" alt="">
                        <p class="text-uppercase">Experts em Mergulho</p>
                        <h3 class="text-uppercase">
                            @if(count($instructors) > 1)
                                Nossos Instrutores
                            @else
                                Nosso Instrutor
                            @endif
                        </h3>
                    </div><!-- /.block-title -->
                    <div class="row d-flex justify-content-center">
                        @foreach($instructors as $instructor)

                            <div class="col-lg-3 col-md-6">
                                <div class="team-one__single">
                                    <img
                                        src="{{asset(\Illuminate\Support\Facades\Storage::url($instructor->getAttribute('image')))}}"
                                        alt="">
                                    <div class="team-one__content">
                                        <div class="team-one__content-inner">
                                            <h3>{{$instructor->getAttribute('name')}}</h3>
                                            <div class="team-one__social">
                                                @if($instructor->getAttribute('social_links')['twitter'])
                                                    <a href="{{$instructor->getAttribute('social_links')['twitter']}}"
                                                       target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                @endif
                                                @if($instructor->getAttribute('social_links')['facebook'])
                                                    <a href="{{$instructor->getAttribute('social_links')['facebook']}}"
                                                       target="_blank">
                                                        <i class="fab fa-facebook-square"></i>
                                                    </a>
                                                @endif
                                                @if($instructor->getAttribute('social_links')['instagram'])
                                                    <a href="{{$instructor->getAttribute('social_links')['instagram']}}"
                                                       target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section>
        </div>

    @endif

@endsection
