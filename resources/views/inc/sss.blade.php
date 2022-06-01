<section class="p-t-20" id="">
    <div class="heading-text text-center heading-line mb-2">
        <h2 class="display-1" style="font-size: 40px"><span>Sıkça Sorulan Sorular</span></h2>
    </div>
    <div class="portfolio-3-columns">
        @foreach($cData->sss as $key=>$val)
            <div class="portfolio-item overlay-links">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image"
                         onclick="location.href='{{str_slug($val->category2->title,"-")}}/{{$val->category2->id}}.html#{!!$val->title!!}'">
                        @isset($val->files[0]->file)
                            <div
                                style="background-image: url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');background-size:cover;background-repeat: no-repeat;background-position: center center;height: 450px"></div>
                        @endisset

                        <div class="portfolio-links">
                            @isset($val->title) <h2>{!! $val->title !!}</h2> @endisset
                            @isset($val->tag) <h4>{!! $val->tag !!}</h4> @endisset
                        </div>
                    </div>
                    <div class="portfolio-description">
                        <a href="{{str_slug($val->category2->title,"-")}}/{{$val->category2->id}}.html#{!!$val->title!!}">
                            @isset($val->title) <h2 class="autoFont">{!! $val->title !!}</h2> @endisset
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!--
    <div class="text-center">
        <button type="button"
                class="btn  text-center p-3 m-3 btn-light btn-creative btn-icon-holder btn-shadow btn-light-hover">
            Tüm Yazılar<i class="icon-chevron-right "></i></button>
    </div>
    -->
</section>

