<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - The Journal</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 1rem;
        }

        .card-header {
            border-radius: 1rem 1rem 0 0;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-dark {
            border-radius: 0.8rem;
            font-weight: 600;
        }

        label {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card shadow-lg">
                    <!-- Header with View Posts Button -->
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
                        <span>Create New Post</span>
                        <a href="{{ route('admin.posts.view') }}" class="btn btn-light btn-sm fw-bold">
                            <i class="bi bi-eye-fill me-1"></i> View Posts
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Post Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" placeholder="Enter post title">
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Enter post content" value="{{ old('content') }}">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Select Category</label>
                                <select name="category_id" id="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror">
                                    <option value="" selected disabled>Choose category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Post Image</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Author -->
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <select name="author" id="author"
                                    class="form-select @error('author') is-invalid @enderror">
                                    <option value="" selected disabled>Choose author</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}"
                                            {{ old('author') == $user->name ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Read Time -->
                            <div class="mb-3">
                                <label for="read_time" class="form-label">Read Time</label>
                                <input type="text" name="read_time" id="read_time"
                                    class="form-control @error('read_time') is-invalid @enderror"
                                    value="{{ old('read_time') }}" placeholder="e.g. 5 min">
                                @error('read_time')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Published At -->
                            <div class="mb-3">
                                <label for="published_at" class="form-label">Publish Date</label>
                                <input type="datetime-local" name="published_at" id="published_at"
                                    class="form-control @error('published_at') is-invalid @enderror"
                                    value="{{ old('published_at') }}">
                                @error('published_at')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-dark w-100 mt-3 py-2">
                                <i class="bi bi-plus-circle me-1"></i> Create Post
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
