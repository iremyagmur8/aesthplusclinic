@extends('layouts.app')
@section('title',$cData->posts->title.' - ')
@section('desc',$cData->posts->shortdescription)
@section('content')
    @isset($cData->category->files[0]->file)
        <section id="page-title" class="h-screen"
                 style="background-image:url('{{Storage::url("/images/userfiles/".$cData->category->files[0]->file)}}'); background-size: cover; background-position: center center;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1 class="text-uppercase fadeInUp text-medium"
                        style="opacity: 1; animation-duration: 600ms;">{{$cData->category->title}}</h1>
                </div>
            </div>
        </section>

    @endisset

    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="content col-lg-12">
                    <div id="blog" class="single-post postBanner">
                        <h2>{{$cData->posts->title}}</h2>

                        {!! $cData->posts->description !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-lg-5 col-md-12">
                @isset($cData->banner->files[0]->file)
                    <div
                        style="background-image: url('{{Storage::url("images/userfiles/" .$cData->banner->files[0]->file)}}');background-size: cover;background-position: center center; background-repeat: no-repeat;height:475px; width:100%">
                    </div>
                @endisset
            </div>

            <div class="col-lg-6 offset-lg-1">
                <div class="heading-text midBanner heading-light">
                    @isset($cData->banner->title) <h5>{!! $cData->banner->title !!}</h5> @endisset
                    @isset($cData->banner->shortdescription)
                        <h2>{!! $cData->banner->shortdescription !!}</h2> @endisset
                    @isset($cData->banner->description)  <p>{!! $cData->banner->description !!}</p> @endisset
                    <a href="#" class="btn btn-outline">Bilgi Alın</a>
                </div>
            </div>
            <!-- end features box -->
        </div>
    </section>
    @if(count($cData->sss) > 0)
        <section class="p-t-20">
            <div class="heading-text text-center heading-line mb-2">
                <h2 class="display-1" style="font-size: 40px"><span>{!! $cData->sss[0]->category2->title !!} ile İlgili Sıkça Sorulan Sorular</span></h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="accordion accordion-simple">

                            @foreach($cData->sss as $key=>$val)
                                <div class="ac-item" id="{!!$val->title!!}">
                                    <h5 class="ac-title">{{$val->title}}</h5>
                                    <div class="ac-content">
                                        <p>{!! $val->description !!}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
