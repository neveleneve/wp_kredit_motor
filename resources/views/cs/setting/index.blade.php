@extends('layouts.master')

@section('title')
    <title>Setting</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Setting</h1>
    </div>
    @if (session('alert'))
        <div class="alert alert-{{ session('warna') }} alert-dismissable fade show">
            {{ session('alert') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection
