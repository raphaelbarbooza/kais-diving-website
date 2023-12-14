<div>
    @if($testimonials)
        <section class="testimonials-one__title testimonials-one__title__home-one">
            <div class="testimonials-one__bg" style="background-image: url('{{asset('assets/images/shapes/water-wave-bg.png')}}');"></div>

            <div class="container">
                <div class="block-title text-center">
                    <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                    <p class="text-uppercase">Depoimentos</p>
                    <h3 class="text-uppercase">O que dizem sobre nós</h3>
                </div>
            </div>
        </section>

        <section class="testimonials-one__carousel-wrapper testimonials-one__carousel-wrapper__home-one">
            <div class="container wow fadeIn" data-wow-duration="2000ms">
                <div class="testimonials-one__carousel owl-carousel owl-theme thm__owl-carousel thm__owl-dot-2" data-options='{"items": 3, "margin": 30, "loop": true, "autoplay": true, "autoplayTimeout": 5000, "autoplayHoverPause": true, "smartSpeed": 700, "responsive": {"0": {"items": 1, "dots": false, "nav": true}, "480": {"items": 1, "dots": false, "nav": true}, "767": {"items": 1, "dots": false, "nav": true}, "991": {"items": 2}, "1199": {"items": 3, "margin": 30}}}'>

                    @foreach($testimonials as $testimonial)

                        <div class="item">
                            <div class="testimonials-one__single">
                                <div class="testimonials-one__content">
                                    <div class="testimonials-one__content-inner">
                                        <p>{{$testimonial->getAttribute('text')}}</p>
                                        <div class="testimonials-one__infos">
                                            <div class="testimonials-one__image">
                                                <div class="testimonials-one__image-inner">
                                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($testimonial->getAttribute('client_image')))}}" alt="">
                                                </div>
                                            </div>
                                            <div class="testimonials-one__infos-content">
                                                <h3>{{$testimonial->getAttribute('client_name')}}</h3>
                                                <span>{{$testimonial->getAttribute('client_position')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>

    @endif
</div>
