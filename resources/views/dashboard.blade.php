<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: #f5f6fa;
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
            padding: 25px;
        }

        .card-custom {
            border-radius: 1rem;
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.05) 0 2px 8px;
            transition: 0.3s;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
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


    <!-- Main Section -->
    <div class="main">

        <h2 class="fw-bold mb-4">Dashboard Overview</h2>

        <!-- Stats -->
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card-custom bg-white d-flex justify-content-between">
                    <div>
                        <h4 class="fw-bold">{{ $postCount }}</h4>
                        <p class="text-muted small">Total Posts</p>
                    </div>
                    <div class="icon-box">📝</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-custom bg-white d-flex justify-content-between">
                    <div>
                        <h4 class="fw-bold">{{ $categoryCount }}</h4>
                        <p class="text-muted small">Categories</p>
                    </div>
                    <div class="icon-box">📂</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-custom bg-white d-flex justify-content-between">
                    <div>
                        <h4 class="fw-bold">{{ $userCount }}</h4>
                        <p class="text-muted small">Users</p>
                    </div>
                    <div class="icon-box">👤</div>
                </div>
            </div>

            {{-- <div class="col-md-3">
                <div class="card-custom bg-white d-flex justify-content-between">
                    <div>
                        <h4 class="fw-bold">28</h4>
                        <p class="text-muted small">Pending Posts</p>
                    </div>
                    <div class="icon-box">⏳</div>
                </div>
            </div> --}}
        </div>

        <!-- Recent Posts -->
        <div class="card mt-5 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Recent Posts</h5>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">Create New Post</a>
            </div>

            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                       <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category ID</th>
                            <th>Image</th>
                            <th>Author Name</th>
                            <th>Read Time</th>
                            <th>Published Time</th>
                            <th>Featured</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->category_id }}</td>
                                <td>
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                            width="100">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->read_time }}</td>
                                <td>{{ $post->published_at }}</td>
                                <td>{{ $post->is_featured }}</td>

                                <td class="">
                                    {{-- {{ route('admin.categories.edit', $category->id) }} --}}
                                    <a href="" class="btn btn-sm btn-outline-primary me-1"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline"
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
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>

</body>

</html>
