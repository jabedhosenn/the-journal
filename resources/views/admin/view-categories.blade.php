<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management - The Journal</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-color: #f5f6fa;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #212529;
            padding: 20px;
            color: #fff;
        }

        .sidebar .brand {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #0d6efd;
            color: #fff;
        }

        /* Main content */
        .main {
            margin-left: 260px;
            padding: 30px;
        }

        .table thead th {
            background-color: #f1f3f5;
        }

        .badge-status {
            padding: 4px 10px;
            font-size: 12px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">Admin Panel</div>

        <a href="{{ route('dashboard') }}" class="nav-link active">🏠 Dashboard</a>
        <!-- Posts Dropdown -->
        <div class="nav-item dropdown mb-1">
            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#"
                id="postsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                📝 Posts
            </a>
            <ul class="dropdown-menu bg-dark border-0" aria-labelledby="postsDropdown">
                <li><a class="dropdown-item text-white" href="{{ route('admin.posts.view') }}">All Posts</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('admin.posts.create') }}">Add Post</a></li>
            </ul>
        </div>

        <!-- Categories Dropdown -->
        <div class="nav-item dropdown mb-1">
            <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#"
                id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                📂 Categories
            </a>
            <ul class="dropdown-menu bg-dark border-0" aria-labelledby="categoriesDropdown">
                <li><a class="dropdown-item text-white" href="{{ route('admin.categories.view') }}">All Categories</a>
                </li>
                <li><a class="dropdown-item text-white" href="{{ route('admin.categories.create') }}">Add Category</a>
                </li>
            </ul>
        </div>
        <a href="#" class="nav-link">👥 Users</a>
        <a href="#" class="nav-link">⚙️ Settings</a>

        <!-- Visit Website Button -->
        <a href="/" target="_blank" class="nav-link text-white">
            🌐 Visit Website
        </a>

        <a href="{{ route('auth.logout') }}" class="nav-link">🚪 Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Category Management</h2>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-dark"><i class="bi bi-plus-lg me-1"></i> Add
                New Category</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Categories Table -->
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created Time</th>
                            <th>Updated Time</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image"
                                            width="100">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td class="">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="m-3">
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

</body>

</html>
