@extends('website.layout.website')

@section('title','Todos os Treinamentos')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"
             style="background-image: url('{{asset('assets/images/background/footer-bg-1-1.jpg')}}');"></div>

        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{route('website.home')}}">Início</a></li>
                <li class="active"><a href="#">Contato</a></li>
            </ul>
            <h2 class="page-header__title">Informações de Contato</h2>
        </div>
    </section>

    <section class="contact-one">
        <img src="assets/images/shapes/fish-contact-1.png" class="contact-one__fish" alt="">
        <img src="assets/images/shapes/tree-contact-1.png" class="contact-one__tree" alt="">
        <img src="assets/images/shapes/swimmer-contact-1.png" class="contact-one__swimmer" alt="">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="contact-one__content">
                        <h3>Mande-nos uma <br> Mensagem</h3>
                        <p>
                            Quer tirar dúvidas, ou saber mais informações sobre nossos treinamentos, preencha o
                            formulário ao lado e nos envie uma mensagem! Responderemos assim que possível.
                        </p>
                        <div class="footer-widget__social contact-one__social">
                            @if(\App\Services\ShortOptionsServices::getOption('contact','social_facebook'))
                                <a target="_blank"
                                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_facebook')}}">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                            @endif
                            @if(\App\Services\ShortOptionsServices::getOption('contact','social_twitter'))
                                <a target="_blank"
                                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_twitter')}}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if(\App\Services\ShortOptionsServices::getOption('contact','social_youtube'))
                                <a target="_blank"
                                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_youtube')}}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                            @if(\App\Services\ShortOptionsServices::getOption('contact','social_instagram'))
                                <a target="_blank"
                                   href="{{\App\Services\ShortOptionsServices::getOption('contact','social_instagram')}}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form action="https://ashik.templatepath.net/scubo-html-files/assets/inc/sendemail.php"
                          class="contact-one__form contact-form-validated">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Nome Completo" name="name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Seu E-mail" name="email">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Telefone" name="phone">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Assunto" name="subject" value="@if(request()->has('assunto')) Informações sobre {{request()->input('assunto')}} @endif">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" placeholder="Mensagem"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="thm-btn contact-one__btn">Enviar Mensagem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-one">
        <div class="container wow fadeInRight" data-wow-duration="1500ms">
            <div class="cta-one__title">ligue-nos</div>
            <div class="inner-container">
                <div class="row">
                    <div class="col-lg-5 d-flex">
                        <div class="my-auto">
                            <div class="cta-one__phone">
                                <i class="fa fa-phone-alt"></i>
                                <a href="tel:{{\App\Helpers\StringHelper::onlyNumbers(\App\Services\ShortOptionsServices::getOption('contact','main_phone_number'))}}">
                                    {{\App\Services\ShortOptionsServices::getOption('contact','main_phone_number')}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="cta-one__content">
                            <h3>Para treinamentos personalizados <br>
                                ligue para a gente!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <iframe class="google-map__contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.6195171822505!2d-54.304881024117165!3d-15.558514617192563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x937725cad90ec50f%3A0xa85e63dc336e06db!2s{{urlencode(\App\Services\ShortOptionsServices::getOption('contact','main_address'))}}!5e0!3m2!1spt-BR!2sbr!4v1705366167028!5m2!1spt-BR!2sbr"></iframe>



@endsection
