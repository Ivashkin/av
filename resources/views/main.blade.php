@extends('layouts.base')
@section('content')
<section class="top-image"><img class="top-image__img" src="./img/top_img.jpg" alt="">
    <div class="top-image__text">{!! __t('main_desc') !!}</div>
</section>
<section class="about-block">
    <div class="about-block__title">{!! __t('about_title') !!}</div>
    <div class="about-block__subtitle">{!! __t('about_subtitle') !!}</div>
    {!! __t('about_desc') !!}
    <div class="about-block__name">{!! __t('about_name') !!}</div>
</section>
@if(!empty($catalog))
    @foreach($catalog as $item)
        <section class="center-image center-image--theme1">
            <div class="center-image__img"><img src="{{ url('/'.$item->image) }}" alt="" data-parallax="{&quot;y&quot;: -200}">
                <div class="center-image__text">
                    <div class="title">{{ $item->title }}</div>
                </div>
            </div>
            <div class="center-image_info">
                <p>{{ $item->description }}</p>
                <div class="buttons"><a href="{{ route('catalog.view', $item->alias) }}">Catalog</a><a href="{{ route('catalog.view', $item->alias) }}">Learn More</a></div>
            </div>
        </section>
    @endforeach
@endif

@if(!empty($slider))
<section class="info-block">
    <div class="info-block__title">{!! __t('slider_title') !!}</div>
    <div class="info-block__text-top">
        <p>{!! __t('slider_desc')  !!}</p>
    </div>
    <div class="info-block-slider bxslider">
        @foreach($slider as $slide)
        <div class="info-block-slider__item"><img src="{{ url('/'.$slide->image) }}" alt=""></div>
        @endforeach
    </div>
    <div class="info-block__text"><img class="left_img" src="{{ url('/'.$slide->image) }}" alt="">
        @foreach($slider as $slide)
            <h2>{!! $slide->title !!}</h2>
            <p>{!! $slide->description !!}</p>
        @endforeach
    </div>
</section>
@endif
@endsection