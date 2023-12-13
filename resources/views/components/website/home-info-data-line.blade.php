<section class="funfact-one funfact-one__home-one">
    <div class="container">
        @if($facts)
            <div class="funfact-one__title">Alguns Dados</div>
            <div class="inner-container">
                <div class="row">
                    @foreach($facts as $fact)
                        <div class="col-lg-3 col-md-6">
                            <div class="funfact-one__single">
                                <div class="funfact-one__count counter">
                                    {{$fact['formData']['counter']['value']}}
                                </div>
                                <div class="funfact-one__content">
                                    <h3>{!!  \App\Helpers\StringHelper::textToHtml($fact['formData']['counter']['title'])!!}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
