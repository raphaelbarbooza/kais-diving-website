<section class="video-two" style="background-image: url('{{asset('assets/images/shapes/video-2-bg.png')}}');">
    @if($random_featured_course)
        <img src="{{asset('assets/images/shapes/swimmer-1-1.png')}}" class="video-two__swimmer" alt="">
        <div class="container">
            <div class="video-two__box wow fadeInRight" data-wow-duration="1500ms">
                <a href="{{route('website.curso',['course' => $random_featured_course->getAttribute('id')])}}">
                 <img style="max-width:600px; min-width: 500px; border-radius: 6px; box-shadow: 0px 0px 12px rgba(255,255,255,.2); height: auto;" src="{{asset(\Illuminate\Support\Facades\Storage::url($random_featured_course->getAttribute('small_image')))}}" alt="">
                </a>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="video-two__content">
                        <div class="block-title">
                            <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                            <p class="text-uppercase">aprenda com a gente</p>
                            <h3 class="text-uppercase">{{$random_featured_course->getAttribute('title')}}</h3>
                        </div><!-- /.block-title -->
                        <p>{{$random_featured_course->getAttribute('short_description')}}</p>
                        <a href="{{route('website.contato')}}" class="thm-btn video-two__btn">Entre em contato</a>

                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
