@extends('layouts.user.user')

@section('title', 'Tentang Kami')

@section('content')
<x-navbar />

<x-infaq.hero />
<x-infaq.infaq-bank />
<x-event-mesjid.infaq-bank />

{{-- <x-infaq.infaq-qris /> --}}
{{-- <x-infaq. /> --}}
<x-footer-dashboard />
@endsection
