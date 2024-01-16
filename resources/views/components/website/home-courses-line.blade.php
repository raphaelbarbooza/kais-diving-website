<div>
    <section class="course-one__title">
        <div class="course-one__bg" style="background-image: url('{{asset('assets/images/shapes/water-wave-bg.png')}}');"></div>

        <div class="container ">
            <div class="block-title text-left">
                <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                <p class="text-uppercase">Nossos Treinamentos</p>
                <h3 class="text-uppercase">Conheça os nossos<br> Treinamentos</h3>
            </div>
        </div>
    </section>
    <div class="course-one course-one__carousel-wrapper">

        <img src="{{asset('assets/images/shapes/fish-1-1.png')}}" alt="" class="site-footer__fish-1">


        <img src="{{asset('assets/images/shapes/tree-1-1.png')}}" class="site-footer__tree-1" alt="">
        <div class="container">
            <div class="course-one__carousel thm__owl-carousel owl-carousel owl-theme" data-options='{"loop": true,"items": 3, "margin":30, "smartSpeed": 700, "autoplay": true, "autoplayTimeout": 5000, "autoplayHoverPause": true, "nav": false, "dots": false, "responsive": { "0": {"items": 1}, "767": {"items": 2}, "991": {"items": 2}, "1199": { "items": 3} }}' data-carousel-prev-btn=".course-one__carousel-btn-left" data-carousel-next-btn=".course-one__carousel-btn-right">
                @foreach($courses as $course)
                    <div class="item">
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
                                <h3><a href="{{route('website.curso',['course' => $course->getAttribute('id')])}}">{{$course->getAttribute('title')}}</a></h3>
                                <p>{{$course->getAttribute('short_description')}}</p>
                            </div>
                            <a href="{{route('website.contato',['assunto' => $course->getAttribute('title')])}}" class="course-one__book-link">Entre em Contato</a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="course-one__carousel-btn__wrapper">
                <a class="course-one__carousel-btn-left" href="#"><i class="fa fa-angle-left"></i></a>
                <a class="course-one__carousel-btn-right" href="#"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>
