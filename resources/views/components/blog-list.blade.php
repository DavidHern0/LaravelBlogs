@if ($blogs->isEmpty())
    <p>{{ __('No results were found') }}.</p>
@else
    @foreach ($blogs as $blog)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <h6 class="card-title text-muted">{{ $blog->user->name }} - {{ $blog->created_at->format('d/m/Y') }}</h6>
                <p class="card-text">{!! strip_tags(substr($blog->content, 0, 200)) !!}
                    {!! strlen($blog->content) > 200 ? '...' : '' !!}
                </p>
                @if ($blog->user_id === auth()->id())
                    <div class="d-flex flex-wrap justify-content-md-start justify-content-center">
                        <a href="{{ route('blog.show', ['blog_url' => $blog->url]) }}"
                            class="button button-show m-1" draggable="false">{{ __('Read more') }}</a>
                        <a href="{{ route('blog.edit', ['blog_url' => $blog->url]) }}"
                            class="button button-edit m-1" draggable="false">{{ __('Edit') }}</a>
                        <form action="{{ route('blog.destroy', $blog->url) }}" method="POST"
                            onsubmit="return confirm(`{{ __('Are you sure you want to delete this blog?') }}`)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-delete m-1" draggable="false">{{ __('Delete') }}</button>
                        </form>
                    </div>
                @else
                    <div class="d-flex">
                        <a href="{{ route('blog.show', ['blog_url' => $blog->url]) }}"
                            class="button button-show m-1" draggable="false">{{ __('Read more') }}</a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
@endif
