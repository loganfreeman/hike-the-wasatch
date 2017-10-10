@foreach ($posts as $post)
    <report-post-button topic-slug="{{ $topic->slug }}" post-id="{{ $post->id }}" class="pull-right report-text"></report-post-button>
    <div class="post" id="post-{{ $post->id }}">
        
        <div class="markdown-body">
            {!! GrahamCampbell\Markdown\Facades\Markdown::convertToHtml(
                $post->body
            ) !!}
        </div>
        @can ('edit', $post)
            <a href="{{ route('forum.topics.topic.posts.post.edit', [$topic, $post]) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
        @endcan
        @can ('delete', $post)
            <form class="inline" action="{{ route('forum.topics.topic.posts.post.delete', [$topic, $post]) }}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-link danger-link"><span class="glyphicon glyphicon-remove"></span> Delete</button>
            </form>
        @endcan
    </div>
@endforeach
