@extends('layouts.home')

@section('content')
    <div id="app" class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <category-add id="{{$id}}" :prods="{{$cats}}" base="{{asset('')}}"/>
    </div>
    @vite(['resources/sass/app.scss', 'resources/js/components/dashboard_a/category.js'])
@endsection
