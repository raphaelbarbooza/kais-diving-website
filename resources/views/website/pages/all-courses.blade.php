@extends('website.layout.website')

@section('title','Todos os Treinamentos')

@section('content')

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/background/footer-bg-1-1.jpg);"></div>

        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{route('website.home')}}">Início</a></li>
                <li class="active"><a href="{{route('website.all-courses')}}">Cursos</a></li>
            </ul>
            <h2 class="page-header__title">{{$title}}</h2>
        </div>
    </section>

    <section class="course-one">
        <div class="container">
            <div class="row">

                @foreach($courses as $course)

                    <div class="col-lg-4 col-md-6">
                        <div class="course-one__single">
                            <div class="course-one__image">
                                <a href="{{route('website.all-courses',['categId' => $course->getAttribute('category_id')])}}" class="course-one__cat">
                                    {{$course->category->getAttribute('title')}}
                                </a>
                                <div class="course-one__image-inner">
                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($course->getAttribute('small_image')))}}" alt="">
                                    <a href="{{route('website.curso',['course' => $course->getAttribute('id')])}}"><i class="scubo-icon-plus-symbol"></i></a>
                                </div>
                            </div>
                            <div class="course-one__content hvr-sweep-to-bottom">
                                <h3><a href="{{route('website.curso',['course' => $course->getAttribute('id')])}}">
                                        {{$course->getAttribute('title')}}
                                    </a>
                                </h3>
                                <p>{{$course->getAttribute('short_description')}}</p>
                            </div>
                            <a href="{{route('website.curso',['course' => $course->getAttribute('id')])}}" class="course-one__book-link">
                                Mais Informações
                            </a>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

@endsection
