@foreach ($posts as $post)
    <report-post-button topic-slug="{{ $topic->slug }}" post-id="{{ $post->id }}" class="pull-right report-text"></report-post-button>
    <div class="post" id="post-{{ $post->id }}">
        <img src="{{ App\User::findOrFail($post->user_id)->hasCustomAvatar() ? Config::get('s3.buckets.images') . '/avatars/' . App\User::findOrFail($post->user_id)->avatar : '/images/avatar-blank.png' }}" width="60" height="60" class="img-thumbnail pull-left" alt="{{ $topic->title }} image"/> <span class="pull-left">{{ Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }} by <a href="/user/profile/{{ '@' . $user = App\User::findOrFail($post->user_id)->name }}"></a> <a href="/user/profile/{{ '@' . $user = App\User::findOrFail($post->user_id)->name }}">{{ '@' . $user = App\User::findOrFail($post->user_id)->name }}</a></span>
        <br /><br /><br />
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
