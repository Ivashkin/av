@extends('layouts.base')
@section('content')

    <section class="center-image center-image--theme1 center-image--overlay">
        <div class="center-image__img"><img src="{{ url('/'.$catalog->image) }}" alt="" data-parallax="{&quot;y&quot;: -200}">
            <div class="center-image__text">
                <div class="title">{{ $catalog->title }}</div>
            </div>
        </div>
        <div class="center-image_info">
            <p>{!! $catalog->description !!}</p>
        </div>
    </section>
    @if(count($catalog->gallery))
    <section class="info-block">
        <div class="info-block-slider bxslider">
            @foreach($catalog->gallery as $item)
                <div class="info-block-slider__item"><img src="{{ url('/'.$item->image) }}" alt=""></div>
            @endforeach
        </div>
    </section>
    @endif

@endsection