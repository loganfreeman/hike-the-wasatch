@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3 side-bar">
            @include("partials.links")
        </div> <!-- End of side-bar -->

        <div class="col-md-9 main-col">
            @if (Session::get('register_using_code') !== null)
                <div class="alert alert-{{ (Session::get('register_using_code') ? 'success' : 'danger' ) }} alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {!! (Session::pull('register_using_code') ? '<strong>Awesome!</strong> You have successfully signed up with a valid registration code.' : '<strong>Bugger!</strong> Your registration code was not able to be used during signup, so you only have base user privileges.' ) !!}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">My topics</div>
                <div class="panel-body" style="text-align: center">
                    <ul class="list-group">
                        @if (count($topics))

                            <div class="panel-body remove-padding-horizontal">
                                @include('partials.topics')
                            </div>
                        @else
                            <p>You haven't created any topics yet.</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div> <!-- End of main-col -->


    </div>




</div>
@endsection
