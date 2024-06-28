@extends('layouts.app')
@section('meta_title', $page->seo_title[app()->getLocale()] ?? '')
@section('meta_description', $page->seo_description[app()->getLocale()] ?? '')
@section('content')
    <main class="main-dark">
        <section class="service-content" style="padding-bottom: 0; margin-bottom: 0;">
            <div class="service-content__container">
                <div class="service-content__wrapper">
                    <div class="service-content__wrap">
                        <h1>{!! $page->seo_h1[app()->getLocale()] !!}</h1>
                        {!! $page->description[app()->getLocale()] !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
