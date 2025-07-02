@extends('layouts.user.user')

@section('title', 'Tentang Kami')

@section('content')
<x-navbar />


<x-tentang-kami.about />
<x-tentang-kami.profil />
<x-footer-dashboard />
@endsection
