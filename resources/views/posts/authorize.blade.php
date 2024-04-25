@extends('layouts.layout')


@section('mainsection')

    @can('isAdmin')
        <div class="btn btn-success btn-lg">
            You have Admin Access
        </div>
    @elsecan('isManager')
        <div class="btn btn-primary btn-lg">
            You have Manager Access
        </div>
    @elsecan('isUser')
        <div class="btn btn-info btn-lg">
            You have User Access
        </div>
    @else
        <div class="btn btn-danger btn-lg">
            You have a guest Access
        </div>

    @endcan
@endsection
