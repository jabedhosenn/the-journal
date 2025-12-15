<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Journal - A Curated Blog</title>

    <meta name="description"
          content="A curated collection of stories, insights, and ideas. Discover articles on technology, lifestyle, travel, food, and creativity.">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Source+Sans+3:wght@300;400;500;600&display=swap"
          rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
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

    <!-- PAGE CONTENT -->
    <main>
        @yield('home-content')
        @yield('categories-content')
        @yield('recent-posts-content')
    </main>

     <!-- Newsletter Section -->
    <section class="py-5">
        <div class="container">
            <div class="newsletter-section text-center py-5 px-4 rounded-4 mx-auto" style="max-width: 700px;">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <h2 class="display-6 fw-bold mb-3">Stay Inspired</h2>
                <p class="text-muted mb-4">Join our community of curious minds. Get weekly insights, stories, and
                    exclusive content delivered to your inbox.</p>
                <form action="{{ route('newsletter.submit') }}" method="POST"
                    class="d-flex flex-column flex-sm-row gap-3 justify-content-center mx-auto"
                    style="max-width: 450px;">
                    @csrf
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary px-4">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer --> <footer class="bg-light border-top py-5 mt-5"> <div class="container"> <div class="row g-4"> <div class="col-lg-6"> <h4 class="fw-bold mb-3">The Journal</h4> <p class="text-muted" style="max-width: 400px;">A curated collection of stories, insights, and ideas. We believe in the power of words to inspire, educate, and connect.</p> </div> <div class="col-6 col-lg-3"> <h6 class="fw-semibold mb-3">Categories</h6> <ul class="list-unstyled"> @foreach($categories as $category) <li class="mb-2"> <a href="{{ route('category.posts', $category->id) }}" class="text-muted text-decoration-none footer-link"> {{ $category->category_name }} </a> </li> @endforeach </ul> </div> <div class="col-6 col-lg-3"> <h6 class="fw-semibold mb-3">Connect</h6> <ul class="list-unstyled"> <li class="mb-2"><a href="#" class="text-muted text-decoration-none footer-link">Twitter</a></li> <li class="mb-2"><a href="#" class="text-muted text-decoration-none footer-link">Instagram</a></li> <li class="mb-2"><a href="#" class="text-muted text-decoration-none footer-link">Newsletter</a></li> </ul> </div> </div> <hr class="my-4"> <p class="text-center text-muted small mb-0">© 2024 The Journal. All rights reserved.</p> </div> </footer> <!-- Bootstrap JS --> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> </body> </html>
