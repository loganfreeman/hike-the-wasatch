@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3 side-bar">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="text-center">
                  <a href="{{ route('forum.topics.create.form') }}" class="btn btn-primary">
                    <i class="fa fa-pencil"> </i> Create a topic
                  </a>

                </div>
              </li>

            </ul>
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
