<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art of Mindful Morning Routines - The Journal</title>
    <meta name="description" content="Discover how starting your day with intention can transform your productivity and well-being.">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Source+Sans+3:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header class="sticky-top bg-white border-bottom">
        <nav class="navbar navbar-expand-md navbar-light container py-3">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">The Journal</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.categories.view') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.posts.view') }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('auth.login') }}">Admin Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Article Header -->
    <section class="hero-section py-5">
        <div class="container">
            <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-2 text-muted text-decoration-none mb-4">
                <i class="bi bi-arrow-left"></i> Back to Home
            </a>

            <div class="row">
                <div class="col-lg-8 animate-fade-up">
                    <a href="" class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3 text-decoration-none">Lifestyle</a>
                    <h1 class="display-4 fw-bold mb-4">{{ $post->title }}</h1>
                    <p class="lead text-muted mb-4">{{ $post->content }}</p>

                    <div class="d-flex flex-wrap align-items-center gap-4 text-muted">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-person"></i>
                            <span>{{ $post->author }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-calendar3"></i>
                            <span>{{ $post->published_at }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-clock"></i>
                            <span>{{ $post->read_time }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    <div class="container mb-5 animate-fade-up delay-1">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="rounded-4 overflow-hidden">
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="Morning routine"
                         class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <article class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 animate-fade-up delay-2">
                <div class="article-content">
                    <p class="lead">There's something magical about the early morning hours. The world is quiet, the air is fresh, and possibilities seem endless. Yet, many of us stumble through our mornings on autopilot, reaching for our phones before our feet even hit the floor.</p>

                    <h2>Why Morning Routines Matter</h2>
                    <p>A mindful morning routine isn't about waking up at 4 AM or following a rigid schedule. It's about creating intentional space for yourself before the demands of the day take over. Research shows that how we spend our first hour significantly impacts our mood, focus, and decision-making throughout the day.</p>

                    <p>The way we begin each morning sets the tone for everything that follows. When we rush through our mornings in a state of stress, that energy carries into our work, our relationships, and our overall sense of wellbeing.</p>

                    <h2>Building Your Practice</h2>
                    <p>Start small. Perhaps it's five minutes of stretching, a cup of tea enjoyed in silence, or simply making your bed with care. The key is consistency and presence. Notice how you feel. Observe without judgment.</p>

                    <blockquote class="blockquote border-start border-primary border-4 ps-4 my-4">
                        <p class="fst-italic text-muted">"The morning is wiser than the evening."</p>
                    </blockquote>

                    <p>As you develop this practice, you may find yourself naturally wanting to extend these moments of calm. Many people report improved creativity, better relationships, and a deeper sense of purpose after establishing a morning routine.</p>

                    <h2>Practical Tips</h2>
                    <p>Here are some actionable strategies to help you build a sustainable morning practice:</p>

                    <ul>
                        <li>Prepare the night before to reduce morning friction</li>
                        <li>Keep your phone in another room while you wake up</li>
                        <li>Choose activities that energize rather than drain you</li>
                        <li>Be flexible—some days will be different, and that's okay</li>
                        <li>Start with just 10 minutes and gradually expand</li>
                    </ul>

                    <h2>The Science Behind It</h2>
                    <p>Studies have shown that our cortisol levels are naturally highest in the morning, making it an optimal time for focused work and creative thinking. By establishing a routine, we can harness this biological advantage rather than squandering it on reactive tasks like checking email.</p>

                    <p>Furthermore, the consistency of a morning routine helps regulate our circadian rhythm, leading to better sleep quality and improved energy levels throughout the day.</p>

                    <h2>Making It Sustainable</h2>
                    <p>The most important aspect of any morning routine is sustainability. A routine that works perfectly but only lasts a week is far less valuable than a simple practice you can maintain for years.</p>

                    <p>Remember, the goal isn't perfection—it's progress. Some mornings will go smoothly, others won't. What matters is the overall trajectory and your commitment to showing up for yourself each day.</p>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Articles -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold mb-4">Related Articles</h2>
            <div class="row g-4">
                <!-- Post 1 -->
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4 animate-fade-up">
                        <article class="blog-card card h-100 border-0">

                            <a href="" class="card-img-wrapper d-flex justify-content-center">
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                    style="width: 400px; height: 300px; object-fit: cover;" alt="Post Image">
                            </a>

                            <div class="card-body">
                                <span
                                    class="badge bg-secondary text-dark rounded-pill mb-3">{{ $post->category_name }}</span>
                                <a href="" class="text-decoration-none">
                                    <h5 class="card-title mb-3">{{ $post->title }}</h5>
                                </a>
                                <p class="card-text text-muted small">{{ $post->content }}</p>
                            </div>

                            <div
                                class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-2 text-muted smaller">
                                    <span>{{ $post->author }}</span>
                                    <span class="dot"></span>
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

    <!-- Footer -->
    <footer class="bg-light border-top py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <h4 class="fw-bold mb-3">The Journal</h4>
                    <p class="text-muted" style="max-width: 400px;">A curated collection of stories, insights, and ideas. We believe in the power of words to inspire, educate, and connect.</p>
                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="fw-semibold mb-3">Categories</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="category.html?cat=technology" class="text-muted text-decoration-none footer-link">Technology</a></li>
                        <li class="mb-2"><a href="category.html?cat=lifestyle" class="text-muted text-decoration-none footer-link">Lifestyle</a></li>
                        <li class="mb-2"><a href="category.html?cat=travel" class="text-muted text-decoration-none footer-link">Travel</a></li>
                        <li class="mb-2"><a href="category.html?cat=food" class="text-muted text-decoration-none footer-link">Food & Recipes</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="fw-semibold mb-3">Connect</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none footer-link">Twitter</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none footer-link">Instagram</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none footer-link">Newsletter</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <p class="text-center text-muted small mb-0">© 2024 The Journal. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
