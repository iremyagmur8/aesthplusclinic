@extends('layouts.app')
@section('title','Akıllı dolgu, Dudak dolgusu, Hifu, Burun dolgusu, Botox, Medikal estetik, Dolgu, İp Askı Uygulamaları - ')
@section('desc','')
@section('content')

    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
        @isset($cData->place[1])
            @foreach($cData->place[1] as $key=>$val)
                <div class="slide kenburns"
                     @isset($val->files[0]->file) @if(pathinfo($val->files[0]->file, PATHINFO_EXTENSION) == 'mp4')  data-bg-video="{{Storage::url("images/userfiles/". $val->files[0]->file)}}"
                     @else data-bg-image="{{Storage::url("images/userfiles/". $val->files[0]->file)}}" @endif @endisset>

                    <div class="container mobilecontainer">
                        <div class="slide-captions text-center text-light ">

                            <h2>{{$val->title}}</h2>
                            {!! $val->description !!}
                            @if($val->buttontext)
                                <div><a href="{{$val->link}}" class="btn scroll-to"> {!! $val->buttontext !!}</a>
                                </div>@endif

                        </div>
                    </div>
                </div>

            @endforeach
        @endisset
    </div>

    <section>
        <div class="heading-text text-center heading-line mb-2">
            <h2 class="display-1" style="font-size: 40px"><span>Tedavilerimiz</span></h2>
        </div>

        <div class="portfolio-3-columns">
            @foreach($cData->tedavilerimiz as $key=>$val)
                <div class="portfolio-item overlay-links">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            @isset($val->files[0]->file)
                                <div
                                    style="background-image: url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');background-size:cover;background-repeat: no-repeat;background-position: center center;height: 350px"></div>                    @endisset

                            <div class="portfolio-links">
                                <a title="@isset($val->title){!! $val->title !!}@endisset " data-lightbox="image"
                                   href="@isset($val->files[0]->file) {{Storage::url("images/userfiles/". $val->files[0]->file)}} @endisset"><i
                                        class="icon-maximize"></i></a>

                            </div>
                        </div>
                        <div class="portfolio-description">
                            <a>
                                @isset($val->title) <h2 class="autoFont">{!! $val->title !!}</h2> @endisset
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <section class="p-t-100 p-b-100">
        @isset($cData->posts[0]->files[0]->file)
            <div class="parallax-container img-loaded"
                 data-bg="{{Storage::url("images/userfiles/". $cData->posts[0]->files[0]->file)}}"
                 data-velocity="-.140"
                 style="background: url(&quot;{{Storage::url("images/userfiles/". $cData->posts[0]->files[0]->file)}}&quot;) -12.88px;background-size: cover;background-position:center center;background-repeat: no-repeat; background-attachment: fixed;
                     " data-ll-status="loaded"></div>
        @endisset
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 bottomBanner  text-left text-light">
                    <h1>{!! $cData->posts[0]->title !!}</h1>
                    <p class="lead m-b-50">
                        {!! $cData->posts[0]->shortdescription !!}
                    </p>
                    <a href="tel:{{$vars->contact->phone}}" class="btn btn-light btn-outline">Bilgi Alın</a>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="row">
            <div class="col-lg-5 col-md-12">
                @isset($cData->posts[1]->files[0]->file)
                    <div
                        style="background-image: url('{{Storage::url("images/userfiles/" .$cData->posts[1]->files[0]->file)}}');background-size: cover;background-position: center center; background-repeat: no-repeat;height:475px; width:100%">
                    </div>
                @endisset
            </div>

            <div class="col-lg-6 offset-lg-1">
                <div class="heading-text  midBanner  heading-light">
                    @isset($cData->posts[1]->title) <h5>{!! $cData->posts[1]->title !!}</h5> @endisset
                    @isset($cData->posts[1]->shortdescription)
                        <h2>{!! $cData->posts[1]->shortdescription !!}</h2> @endisset
                    @isset($cData->posts[1]->description)  <p>{!! $cData->posts[1]->description !!}</p> @endisset
                    <a href="tel:{{$vars->contact->phone}}" class="btn btn-outline">Bilgi Alın</a>
                </div>
            </div>
            <!-- end features box -->
        </div>
    </section>

    @include('inc.sss')



    <script src="/assetWeb/polo/plugins/particles/particles.js"></script>
    <script src="/assetWeb/polo/plugins/particles/particles-dots.js"></script>
@endsection
