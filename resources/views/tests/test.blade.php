@extends('app')

@section('contents')
    {!! $html->table() !!}
@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush