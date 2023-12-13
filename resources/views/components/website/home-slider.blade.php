<div class="slider-one__wrapper">
    <div class="slider-one">
        <div class="slider-one__carousel thm__owl-dot-1 owl-carousel owl-theme thm__owl-carousel" data-carousel-prev-btn=".slider-one__nav-right" data-carousel-next-btn=".slider-one__nav-left" data-options='{"loop": true, "items": 1, "margin": 0, "dots": true, "nav": false, "animateOut": &quot;slideOutDown&quot;, "animateIn": &quot;fadeIn&quot;, "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>
            @foreach($slides as $slide)
                <div class="item slider-one__slide-{{$loop->index}}" style="background-image: url('{{asset(\Illuminate\Support\Facades\Storage::url($slide['image_url']))}}');">
                    <div class="container">
                        <div class="slider-one__content text-center">
                            <p class="anim-elm">{{$slide['line']}}</p>
                            <h3 class="anim-elm">{!! $slide['title'] !!}</h3>
                            @if($slide['button_text'])
                                <a href="{{$slide['button_url']}}" class="thm-btn anim-elm">{{$slide['button_text']}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- /.slider-one__carousel -->
        <div class="slider-one__nav">
            <a href="#" class="slider-one__nav-left"><i class="fa fa-angle-right"></i></a>
            <!-- /.slider-one__nav-left -->
            <a href="#" class="slider-one__nav-right"><i class="fa fa-angle-left"></i></a>
            <!-- /.slider-one__nav-right -->
        </div><!-- /.slider-one__nav -->
    </div><!-- /.slider-one -->
</div><!-- /.slider-one__wrapper -->
