<!DOCTYPE html>
<html lang="tr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="Aesthplusclinic">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>@yield('title')Aesthplusclinic</title>

    <!-- Stylesheets & Fonts -->
    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="/assetWeb/polo/css/plugins.css" rel="stylesheet">
    <link href="/assetWeb/polo/css/style.css" rel="stylesheet">

    <!-- Template color -->
    <link href="/assetWeb/polo/css/color-variations/purple.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/custom.css?v=1" rel="stylesheet">
    <script src="/assetWeb/polo/js/jquery.js"></script>
    <script src="/js/checked.js"></script>
</head>

<body>


<!-- Body Inner -->
<div class="body-inner">


    <header id="header" data-transparent="true" data-fullwidth="false" class="dark submenu-light">
        <div class="header-inner">
            <div class="container">
                <!--Logo-->
                <div id="logo"><a href="/"><span class="logo-default"><img style="height:80px"
                                                                           src="/images/logo.png"></span>
                        <span class="logo-dark"><img style="height:80px" src="/images/logo.png"></span></a></div>
                <!--End: Logo-->
                <!-- Search -->
                <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i
                            class="icon-x"></i></a>
                    <form class="search-form" action="#" method="get">
                        <input class="form-control" name="q" type="text" placeholder="Ara..."/>
                        <span class="text-muted">Bir şeyler yazıp aramaya başlayın</span>
                    </form>
                </div> <!-- end: search -->
                <div id="mainMenu-trigger"><a class="lines-button x"><span class="lines"></span></a></div>
                <div id="mainMenu">
                    <div class="container">
                        <nav>
                            <ul>
                                @foreach($vars->menu as $key=>$val)

                                    <li @if(count($val->childs)>0) class="dropdown" @endif><a
                                            href="@if(count($val->childs)==0)@if($val->link){{$val->link}}@else{{"/".str_slug($val->title,"-")."/".$val->id.".html"}}@endif @else{{"#"}}@endif">{{$val->title}}</a>
                                        @if(count($val->childs)>0)
                                            <ul class="dropdown-menu">
                                                @foreach($val->childs as $key2=>$val2)
                                                    <li>
                                                        <a href="@if($val2->link){{$val2->link}}@else{{"/".str_slug($val2->title,"-")."/".$val2->id.".html"}}@endif">{{$val2->title}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        @endif

                                    </li>

                                @endforeach


                            </ul>
                        </nav>
                    </div>
                </div>
                <!--end: Navigation-->
            </div>
        </div>
    </header>

@yield("content")

<!-- Footer -->
    <footer id="footer">

        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center">&copy; 2021 Aesthplusclinic Global - Tüm hakları saklıdır.<br><a href="/?ls=tr" style="color:#fff">Türkçe</a> | <a href="/?ls=it" style="color:#fff">Italian</a></div>
            </div>
        </div>
    </footer>
    <!-- end: Footer -->

</div>
<!-- end: Body Inner -->

<div id="cookieNotify" class="modal-strip cookie-notify background-dark" data-delay="1000" data-expire="1"
     data-cookie-name="cookiebar2020_1" data-cookie-enabled="true">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-sm-center sm-center sm-m-b-10 m-t-5">
                Ziyaretiniz sırasında kişisel verileriniz siteyi kullanımınızı analiz etmek amacıyla çerezler
                aracılığıyla işlenmektedir. Daha fazla bilgi için Çerez Aydınlatma Metni’ni okuyabilirsiniz.
            </div>
            <div class="col-lg-4 text-right sm-text-center sm-center">

                <button type="button" class="btn btn-rounded btn-light btn-sm modal-confirm">Anladım. Kabul ediyorum
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->

<script src="/assetWeb/polo/js/plugins.js"></script>

<!--Template functions-->
<script src="/assetWeb/polo/js/functions.js"></script>

<!--Template functions-->
<script src="/js/solaris.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
</body>
</html>
