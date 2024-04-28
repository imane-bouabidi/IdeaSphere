<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid vh-100">
        <div class="row">
            <header class="col-md-12 bg-dark text-white">
                <div class="d-flex justify-content-between align-items-center py-3 px-4">
                    <h1 class="m-0">Home</h1>
                    <div class="flex">
                        <a href="{{ route('home') }}" class="ml-4 flex items-center justify-center h-10 w-10 rounded-full no-underline text-white">home</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="ml-4 flex items-center justify-center h-10 w-10 rounded-full">
                                logout
                            </button>
                        </form>
                    </div>
                    
                </div>
            </header>
        </div>
        <div class="row h-100">
            <div class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar">
                <div class="sidebar-content">

                    <div class="mt-3"></div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link flex-fill text-white" href="{{ route('admin') }}"
                                style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-hashtag"></i></span>
                                <span class="nav-text">Statistiques</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flex-fill text-white" href="{{ route('hashtags') }}"
                                style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-hashtag"></i></span>
                                <span class="nav-text">Hashtags</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flex-fill text-white" href="{{ route('categories') }}"
                                style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-th"></i></span>
                                <span class="nav-text">Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flex-fill text-white" href="{{ route('users') }}"
                                style="background-color: #6c757d;" data-bs-toggle="collapse"
                                data-bs-target="#userManagementCollapse">
                                <span class="nav-icon"><i class="fas fa-users"></i></span>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flex-fill text-white" href="{{ route('postes') }}"
                                style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-file-alt"></i></span>
                                <span class="nav-text">Idea Post Content</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="col-md-9 col-lg-10 main-content">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </nav>

                    <div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Users</h5>
                                        <p class="card-text">{{ $users }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Postes</h5>
                                        <p class="card-text">{{ $postes }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Categories</h5>
                                        <p class="card-text">{{ $categories }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Hashtags</h5>
                                        <p class="card-text">{{ $hashtags }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
