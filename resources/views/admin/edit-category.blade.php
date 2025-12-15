<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category - The Journal</title>

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
            letter-spacing: 0.5px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            border-radius: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .success-alert {
            border-radius: 0.8rem;
            font-weight: 500;
        }

        label {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif


                <!-- Card -->
                <div class="card shadow-lg">

                    <!-- Updated Header -->
                    <div
                        class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                        <span>Edit Category</span>

                        <a href="{{ route('admin.categories.view') }}" class="btn btn-light btn-sm fw-bold">
                            <i class="bi bi-eye-fill me-1"></i> View Categories
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <!-- Form Start -->
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Category Name -->
                            <div class="mb-4">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" id="name" name="category_name"
                                    class="form-control form-control-lg  @error('category_name') is-invalid @enderror"
                                    placeholder="Enter category name" value="{{ $category->category_name }}">
                                @error('category_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="category_description" class="form-control category_description"
                                    placeholder="Enter category description" rows="4" value="{{ old('category_description') }}">{{ $category->category_description }}</textarea>
                                @error('category_description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label for="image" class="form-label">Category Image</label>
                                <input type="file" id="image" name="image"
                                    class="form-control  @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success w-100 py-2">
                                <i class="bi bi-plus-circle me-1"></i> Update Category
                            </button>

                        </form>
                        <!-- Form End -->

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS for success alert -->
    <script>
        const form = document.getElementById('categoryForm');
        const successMessage = document.getElementById('successMessage');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            successMessage.classList.remove('d-none');
            form.reset();
        });
    </script>

</body>

</html>
