@extends('layouts.app')

@section('title', $topic->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p><a href="{{ route('home.index') }}">&laquo; Back to your topics</a></p>
            <report-topic-button topic-slug="{{ $topic->slug }}" class="pull-right report-text report-topic"></report-topic-button>
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center">
                    <h4>{{ $topic->title }}</h4>
                    {{ Carbon\Carbon::createFromTimeStamp(strtotime($topic->created_at))->diffForHumans() }} by <a href="/user/profile/{{ '@' . App\User::findOrFail($topic->user_id)->name }}">{{ '@' . App\User::findOrFail($topic->user_id)->name }}</a>
                    <br />
                    @can ('delete', $topic)
                        <form action="{{ route('forum.topics.topic.delete', $topic) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link danger-link"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                        </form>
                    @endcan
                    @if (Auth::check())
                        <subscribe-button topic-slug="{{ $topic->slug }}"></subscribe-button>
                    @endif
                    <br />
                    <span class="text-muted pull-right badge">{{ count($posts) }}</span>
                    <br />
                </div>

                <div class="panel-body">
                    @if (count($posts))
                        @include("partials.posts")
                    @else
                        <p>The are currently no posts for this topic.</p>
                    @endif

                    <br />
                    @if (Auth::check())
                        @include("partials.reply")
                    @else
                        <p style="text-align: center">Please <a href="{{ url('/register') }}">register</a> and <a href="{{ url('/login') }}">login</a> to join the conversation.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
