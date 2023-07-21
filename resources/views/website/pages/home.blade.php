@extends('layouts.website')

@section('header')
<x-hero :slides="$slides" />
@endsection

@section('content')

<x-what-we-do :serviceList="$serviceList" />

<x-about :feature="$feature1" />

<x-portfolio :serviceList="$serviceList" :innerServices="$innerServices" />

<x-about :feature="$feature2" />

<x-contact />

@endsection