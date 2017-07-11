<form action="{{ route('forum.topics.posts.create.submit', $topic) }}" method="post">
    <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
        <label for="post" class="control-label">Your Reply</label>
        <textarea name="post" id="post" class="form-control" placeholder="Your reply to {{ $topic->title }}" rows="8" required></textarea>
        @if ($errors->has('post'))
            <div class="help-block danger">
                {{ $errors->first('post') }}
            </div>
        @endif
    </div>
    <div class="help-block pull-left">
        Feel free to use Markdown. Use @username to mention another user.
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-default pull-right">Add Reply</button>
</form>
