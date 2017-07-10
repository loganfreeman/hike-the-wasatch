@foreach ($topics as $topic)
    <li class="list-group-item" style="margin-top: 0px;">
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
