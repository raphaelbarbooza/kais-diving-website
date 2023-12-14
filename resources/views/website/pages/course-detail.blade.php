@extends('website.layout.website')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"
             style="background-image: url('{{asset('assets/images/background/footer-bg-1-1.jpg')}}');"></div>
        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="#">Cursos</a></li>
                <li><a href="#">{{$course->category->getAttribute('title')}}</a></li>
                <li class="active"><a href="#">Detalhes do Curso</a></li>
            </ul>
            <h2 class="page-header__title">{{$course->getAttribute('title')}}</h2>
        </div>
    </section>

    @if($course->getAttribute('details'))
        <div class="container">
            <div class="row py-3" style="background-color: var(--thm-primary);">
                @foreach($course->getAttribute('details') as $detail)
                    <div class="col-lg-3 col-md-4 d-flex py-3 justify-content-center">
                        <div>
                            <div class="text-dark">
                                @foreach(explode(' ',$detail['value']) as $word)
                                    @if($loop->count > 1 && $loop->index == 0)
                                        <small style="font-size: 22px;">{{$word}}</small>
                                    @else
                                        <span style="font-size: 48px;">{{$word}}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="text-dark ml-3 d-flex align-items-center" style="font-size: 20px; line-height: 18px;">
                            {!! \App\Helpers\StringHelper::textToHtml($detail['title'])!!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <section class="course-details">
        <div class="container">

            <div class="course-details__image">

                <div style="width:100%; height:400px; background-size:cover; background-position:center; background-image: url('{{asset(\Illuminate\Support\Facades\Storage::url($course->getAttribute('large_image')))}}')">

                </div>

            </div>

            <div class="course-details__content">
                <h3>{{$course->getAttribute('title')}}</h3>
                <p>{{$course->getAttribute('short_description')}}</p>

                @foreach($course->getAttribute('long_description') as $section)

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
    </section>

@endsection
