@extends('layouts.user.user')

@section('title', 'kontak')

@section('content')
<x-navbar />

<x-kontak.kontak-mesjid />
<x-lokasi />
<x-footer-dashboard />
@endsection
