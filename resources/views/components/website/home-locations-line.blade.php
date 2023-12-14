<section class="blog-one blog-one__home-one" style="background-image: url('{{asset('assets/images/shapes/about-brand-team-bg.png')}}');">
    @if($locations)
        <div class="container">
            <div class="block-title text-center">
                <img src="{{asset('assets/images/shapes/sec-line-1.png')}}" alt="">
                <p class="text-uppercase">Nossas Indicações </p>
                <h3 class="text-uppercase">Locais de Mergulho</h3>
            </div>
            <div class="row">
                @foreach($locations as $location)

                    <div class="col-lg-4 col-md-12">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                                <a href="#" class="blog-one__date">{{$location->getAttribute('city_name')}}</a>
                                <div class="blog-one__image-inner">
                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($location->getAttribute('small_image')))}}" alt="">
                                    <a href="#"><i class="scubo-icon-plus-symbol"></i></a>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <h3><a href="#">
                                        {{$location->getAttribute('title')}}
                                    </a></h3>
                                <p>{{$location->getAttribute('short_description')}}.</p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    @endif
</section>
