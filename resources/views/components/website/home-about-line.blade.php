<section class="cta-four">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="cta-four__image wow fadeInLeft" data-wow-duration="1500ms">
                    <img src="{{asset('assets/images/resources/cta-2-1.jpg')}}" alt="">
                    <div class="cta-four__image-content">
                        <i class="scubo-icon-scuba-diving"></i>
                        <p>{{(date('Y')) - 2007}}</p>
                        <h3>anos de <br> experiencia</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="cta-four__content">
                    <div class="block-title text-left">
                        <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                        <p class="text-uppercase">Sobre Kais Diving</p>
                        <h3 class="text-uppercase">
                            {{$data['title']}}
                        </h3>
                    </div><!-- /.block-title -->
                    {!! $data['content'] !!}
                    <a href="{{route('website.about')}}" class="thm-btn cta-four__btn">Saiba mais</a>
                </div>
            </div>
        </div>
    </div>
</section>
