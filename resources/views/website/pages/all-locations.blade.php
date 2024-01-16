@extends('website.layout.website')

@section('title','Pontos de Mergulho')

@section('content')

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/background/footer-bg-1-1.jpg);"></div>

        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{route('website.home')}}">Início</a></li>
                <li class="active"><a href="#">Pontos de Mergulho</a></li>
            </ul>
            <h2 class="page-header__title">Pontos de Mergulho</h2>
        </div>
    </section>

    <section class="blog-one">
        <div class="container">
            <div class="row">
                @foreach($locations as $location)

                    <div class="col-lg-4 col-md-6">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <a href="#" class="blog-one__date">{{$location->getAttribute('city_name')}}</a>
                                <div class="blog-one__image-inner">
                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($location->getAttribute('small_image')))}}" alt="">
                                    <a href="{{route('website.local',['location' => $location->getAttribute('id')])}}"><i class="scubo-icon-plus-symbol"></i></a>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <h3><a  href="{{route('website.local',['location' => $location->getAttribute('id')])}}">
                                        {{$location->getAttribute('title')}}
                                    </a></h3>
                                <p>{{$location->getAttribute('short_description')}}</p>
                                <div class="blog-one__meta">
                                    <a href="{{route('website.local',['location' => $location->getAttribute('id')])}}">
                                        <i class="fas fa-plus-circle"></i> Detalhes</a>
                                    @if($location->getAttribute('latitude') && $location->getAttribute('longitude'))
                                        <a target="_blank" href="https://www.google.com.br/maps/{{ "@".$location->getAttribute('latitude').",".$location->getAttribute('longitude') }},15z?entry=ttu">
                                            <i class="fas fa-map-marker"></i>
                                            Localização
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>


@endsection
