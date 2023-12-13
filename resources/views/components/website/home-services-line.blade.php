<section class="service-one">
    <img src="{{asset('assets/images/shapes/swimmer-contact-1.png')}}" class="contact-one__swimmer" alt="">

    <!-- footer fishes -->
    <img src="{{asset('assets/images/shapes/fish-service-1.png')}}" alt="" class="site-footer__fish-1">
    <img src="{{asset('assets/images/shapes/fish-service-2.png')}}" alt="" class="site-footer__fish-3">

    <!-- footer trees -->
    <img src="{{asset('assets/images/shapes/tree-service-1.png')}}" class="site-footer__tree-2" alt="">


    <div class="service-one__floated-text">treinamentos</div>
    <div class="container">
        <div class="block-title text-center">
            <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
            <p class="text-uppercase">nosso treinamentos</p>
            <h3 class="text-uppercase">O que oferecemos</h3>
        </div><!-- /.block-title -->
        <div class="row d-flex justify-content-center">
            @foreach($categories as $category)
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <a href="#">
                        <div class="service-one__single">
                            <i></i>
                            <h3>{{$category['title']}}</h3>
                            <p class="text-dark">{!! \App\Helpers\StringHelper::textToHtml($category['description']) !!}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
