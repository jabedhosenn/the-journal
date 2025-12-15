<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology Articles - The Journal</title>
    <meta name="description"
        content="Explore our collection of technology articles covering the latest trends and innovations.">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Source+Sans+3:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Header -->
    <header class="sticky-top bg-white border-bottom">
        <nav class="navbar navbar-expand-md navbar-light container py-3">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">The Journal</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
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

    <!-- Category Header -->
    <section class="hero-section py-5">
        <div class="container">
            <a href="{{ route('home') }}"
                class="d-inline-flex align-items-center gap-2 text-muted text-decoration-none mb-4">
                <i class="bi bi-arrow-left"></i> Back to Home
            </a>

            <div class="row">
                <div class="col-lg-8 animate-fade-up">
                    <h1 class="display-4 fw-bold mb-3">Category</h1>
                    <p class="lead text-muted">Latest tech trends and innovations — Explore category in this
                        collection.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Posts Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Category -->
                <div class="row g-4">
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-lg-4 animate-fade-up">
                            <div class="card h-100 border-0 shadow-sm d-flex flex-column align-items-center">
                                <!-- Center content -->

                                <!-- Image -->
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" class="my-3"
                                        style="width: 300px; height: 250px; object-fit: cover;"
                                        alt="{{ $category->category_name }}">
                                @endif

                                <div class="card-body text-center"> <!-- Center text -->
                                    <h5 class="card-title">{{ $category->category_name }}</h5>
                                    <p class="card-text text-muted">{{ $category->category_description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Other Categories -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold mb-4">Explore Other Topics</h2>

            <div class="d-flex flex-wrap gap-3">
                @foreach ($categories as $category)
                    <a href="" class="btn btn-outline-dark rounded-pill px-4 d-flex align-items-center gap-2">
                        <span>{{ $category->category_name }}</span>
                    </a>
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
                    <p class="text-muted" style="max-width: 400px;">A curated collection of stories, insights, and
                        ideas. We believe in the power of words to inspire, educate, and connect.</p>
                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="fw-semibold mb-3">Categories</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="category.html?cat=technology"
                                class="text-muted text-decoration-none footer-link">Technology</a></li>
                        <li class="mb-2"><a href="category.html?cat=lifestyle"
                                class="text-muted text-decoration-none footer-link">Lifestyle</a></li>
                        <li class="mb-2"><a href="category.html?cat=travel"
                                class="text-muted text-decoration-none footer-link">Travel</a></li>
                        <li class="mb-2"><a href="category.html?cat=food"
                                class="text-muted text-decoration-none footer-link">Food & Recipes</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="fw-semibold mb-3">Connect</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#"
                                class="text-muted text-decoration-none footer-link">Twitter</a></li>
                        <li class="mb-2"><a href="#"
                                class="text-muted text-decoration-none footer-link">Instagram</a></li>
                        <li class="mb-2"><a href="#"
                                class="text-muted text-decoration-none footer-link">Newsletter</a></li>
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
