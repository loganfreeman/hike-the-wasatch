@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3 side-bar">
            @include("partials.links")
        </div> <!-- End of side-bar -->

        <div class="col-md-9 main-col">
            <div class="panel panel-default">
                <div class="panel-heading">Forum</div>

                <div class="panel-body" style="text-align: center">
                    <ul class="list-group">
                        @if (count($topics))
                            <div class="panel-body remove-padding-horizontal">
                                @include('partials.topics')
                            </div>
                        @else
                            <p>There are currently no topics listed in the forum.</p>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
