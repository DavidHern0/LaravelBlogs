
@if($blogs->isEmpty())
<p>{{__('No results were found')}}.</p>
@else
    @foreach ($blogs as $blog)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <h6 class="card-title text-muted">{{ $blog->user->name }} - {{ $blog->created_at->format('m/d/Y') }}</h6>
            <p class="card-text">{{ substr($blog->content, 0, 200) }}{{ strlen($blog->content) > 200 ? '...' : '' }}</p>
            <div class="d-flex">
                <a href="{{ route('blog.show', ['id' => $blog->id]) }}" class="button button-show">{{ __('Read more') }}</a>
                @if($blog->user_id === auth()->id())
                <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="button button-edit">{{ __('Edit') }}</a>
                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button-delete">{{ __('Delete') }}</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
@endif