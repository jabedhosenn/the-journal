@extends('layouts.app')

@section('home-content')
    @if($posts->first())
        @php $heroPost = $posts->first(); @endphp

        <section class="hero-section py-5">
            <div class="container">
                <div class="row align-items-center g-5">

                    <div class="col-lg-6">
                        @if($heroPost->category)
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                                {{ $heroPost->category->category_name }}
                            </span>
                        @endif

                        <h1 class="display-4 fw-bold mb-4">{{ $heroPost->title }}</h1>
                        <p class="lead text-muted mb-4">{{ $heroPost->content }}</p>

                        <div class="d-flex align-items-center gap-3 mb-4 text-muted small">
                            <span>{{ $heroPost->author }}</span>
                            <span class="dot"></span>
                            <span>{{ $heroPost->published_at }}</span>
                            <span class="dot"></span>
                            <span>{{ $heroPost->read_time }}</span>
                        </div>

                        <a href="{{ route('pages.posts.view.single.post', $heroPost->id) }}"
                           class="btn btn-primary px-4 py-2">
                            Read Article <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <div class="hero-image-wrapper rounded-4 overflow-hidden">
                            <img src="{{ asset('storage/' . $heroPost->image) }}"
                                 alt="{{ $heroPost->title }}"
                                 class="img-fluid w-100 hero-image">
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
@endsection

@section('categories-content')
<section class="py-5">
    <div class="container">
        <div class="mb-5">
            <h2 class="display-6 fw-bold">Explore Topics</h2>
            <p class="text-muted">Discover stories across different themes</p>
        </div>

        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-6 col-md-4 col-lg">
                    <a href="{{ route('category.posts', $category->id) }}" class="category-card card h-100 text-decoration-none">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $category->category_name }}</h5>
                            <p class="card-text text-muted small mb-2">{{ $category->category_description }}</p>
                            <span class="text-muted smaller">{{ $category->posts_count ?? 0 }} articles</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('recent-posts-content')
<section class="py-5 bg-light">
    <div class="container">

        <div class="mb-5">
            <h2 class="display-6 fw-bold">Recent Posts</h2>
            <p class="text-muted">Fresh perspectives and latest stories</p>
        </div>

        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <article class="blog-card card h-100 border-0">

                        <img src="{{ asset('storage/' . $post->image) }}"
                             class="card-img-top"
                             style="width: 100%; height: 250px; object-fit: cover;">

                        <div class="card-body">
                            <span class="badge bg-secondary text-dark rounded-pill mb-3">
                                {{ $post->category->category_name ?? 'Uncategorized' }}
                            </span>

                            <h5 class="card-title mb-3">{{ $post->title }}</h5>
                            <p class="card-text text-muted small">{{ $post->content }}</p>
                        </div>

                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <span>{{ $post->author }}</span>
                                <span class="mx-1">·</span>
                                <span>{{ $post->read_time }}</span>
                            </div>

                            <a href="{{ route('pages.posts.view.single.post', $post->id) }}" class="text-primary small fw-medium">
                                Read <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

