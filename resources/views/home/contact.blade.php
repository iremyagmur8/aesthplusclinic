@extends('layouts.app')
@section('title', "Aesthplusclinic")
@section('desc',"")
@section('content')

    <section class="no-padding">
        <!-- Google Map -->
        <div>
            <iframe src="{{$vars->contact->googlemap}}" height="500" style="border:0;" allowfullscreen=""
                    loading="lazy"></iframe>
        </div>
        <!-- end: Google Map -->
    </section>
    <!-- end: Page title -->
    <!-- CONTENT -->
    <section>
        <div class="container contact-page mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="title-area mb-4">
                        <span>İLETİŞİM</span>
                    </div>
                    @if($vars->contact->description) <p>{!! $vars->contact->description !!}</p>  @endif
                    <div class="row my-4 ">
                        @if($vars->contact->address)
                            <div class="col-lg-5">
                                <address>
                                    <strong>Adres</strong><br>
                                    {!! $vars->contact->address !!}
                                </address>
                            </div>
                        @endif
                        <div class="col-lg-7">
                            <strong>İletişim</strong><br>
                            @if($vars->contact->phone)<a href="tel:{{$vars->contact->phone}}" title="Tel"><strong>Tel:</strong></h4> {{$vars->contact->phone}} </a>@endif
                            <br>
                            @if($vars->contact->fax)<a href="tel:{{$vars->contact->fax}}" title="Fax"><strong>Fax:</strong></h4> {{$vars->contact->fax}} </a>@endif
                            <br>
                            @if($vars->contact->mail)<a href="mailto:{{$vars->contact->mail}}" title="Mail"><strong>Mail:</strong></h4> {{$vars->contact->mail}} </a>@endif
                            <br>
                            @if($vars->contact->mail2)<a href="mailto:{{$vars->contact->mail2}}" title="Mail2"><strong>Mail2:</strong></h4> {{$vars->contact->mail2}} </a>@endif
                        </div>
                    </div>
                    <div class="social-icons m-t-30 social-icons-colored">
                        <ul>
                            @if($vars->contact->facebook)<li class="social-facebook"><a href="{{$vars->contact->facebook}}"><i class="fab fa-facebook-f"></i></a></li> @endif
                            @if($vars->contact->twitter)<li class="social-twitter"><a href="{{$vars->contact->twitter}}"><i class="fab fa-twitter"></i></a></li> @endif
                            @if($vars->contact->instagram)<li class="social-instagram"><a href="{{$vars->contact->instagram}}"><i class="fab fa-instagram"></i></a></li>@endif
                            @if($vars->contact->linkedin)<li class="social-linkedin"><a href="{{$vars->contact->linkedin}}"><i class="fab fa-linkedin"></i></a></li>@endif
                            @if($vars->contact->youtube)<li class="social-youtube"><a href="{{$vars->contact->youtube}}"><i class="fab fa-youtube"></i></a></li>@endif

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="widget-contact-form" action="/iletisim" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Ad-Soyad</label>
                                <input type="text" aria-required="true" required name="name"
                                       class="form-control required name" placeholder="Ad ve Soyad giriniz">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" aria-required="true" required name="email"
                                       class="form-control required email" placeholder="Email adresinizi giriniz">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Telefon</label>
                                <input type="text" aria-required="true" required name="phone"
                                       class="form-control required name" placeholder="Telefon numaranızı giriniz">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subject">Konu</label>
                                <input type="text" name="subject" required
                                       class="form-control required" placeholder="Konu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Mesajınız</label>
                            <textarea type="text" name="message" required rows="5"
                                      class="form-control required" placeholder="Mesajınızı giriniz"></textarea>
                        </div>

                        <button class="btn" type="submit" id="form-submit"><i class="fas fa-paper-plane"></i>&nbsp;Gönder
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section> <!-- end: Content -->
@endsection
