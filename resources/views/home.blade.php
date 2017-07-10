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
                            @foreach ($topics as $topic)
                                <li class="list-group-item">
                                    <a href="/forum/topics/{{ $topic->slug }}">{{ $topic->title }} <span class="badge">{{ $topic->postCount() }}</span></a>
                                    <br />
                                    <strong>Created</strong> {{ Carbon\Carbon::createFromTimeStamp(strtotime($topic->created_at))->diffForHumans() }}
                                    <br />
                                    <strong>Last post</strong> {{ Carbon\Carbon::createFromTimeStamp(strtotime($topic->updated_at))->diffForHumans() }}
                                    @can ('delete', $topic)
                                        <form action="{{ route('forum.topics.topic.delete', $topic) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-link danger-link"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                                        </form>
                                    @endcan
                                </li>
                            @endforeach
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
