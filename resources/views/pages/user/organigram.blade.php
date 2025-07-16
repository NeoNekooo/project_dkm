@extends('layouts.user.user')

@section('title', 'Organgram')

@section('content')
<x-navbar />

<x-organigram.organigram />
{{-- <x-lokasi> --}}
<x-footer-dashboard />

@endsection
