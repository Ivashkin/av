<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Avanta') }}</title>
    <link href="/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <div class="header__logo"></div>
    <div class="header__menu"></div>
</header>
@yield('content')
<footer>
    <section class="top-footer">
        <div class="w_center">
            <div class="col">
                <div class="title">SHOP</div>
                <ul>
                    <li><a href="#">Find a Shop</a></li>
                    <li><a href="#">Schedule a Tour</a></li>
                    <li><a href="#">Custom Solutions</a></li>
                    <li><a href="#">Get a Quote</a></li>
                </ul>
            </div>
            <div class="col">
                <div class="title">EXPLORE</div>
                <ul>
                    <li><a href="#">Featured Products</a></li>
                    <li><a href="#">Future Products</a></li>
                    <li><a href="#">Our Mission</a></li>
                    <li><a href="#">Customer Stories</a></li>
                </ul>
            </div>
            <div class="col">
                <div class="title">MORE</div>
                <ul>
                    <li><a href="#">News Feed</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="bottom-footer">
        <div class="w_center">
            <div class="bottom-footer__copy">{!! __t('copyright') !!}</div>
        </div>
    </section>
</footer>
<script src="//code.jquery.com/jquery-2.2.4.min.js" defer></script>
<script src="/js/jquery.bxslider.min.js" defer></script>
<script src="/js/script.js" defer></script>
</body>
</html>
