<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid vh-100">
    <div class="row">
        <header class="col-md-12 bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center py-3 px-4">
                <h1 class="m-0">Home</h1>
                <div>
                    <a href="#" class="text-white mr-12">home</a>
                    <a href="#" class="text-white">Logout</a>
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
                        <a class="nav-link flex-fill text-white" href="{{route('hashtags')}}" style="background-color: #6c757d;">
                            <span class="nav-icon"><i class="fas fa-hashtag"></i></span>
                            <span class="nav-text">Hashtags</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link flex-fill text-white" href="{{route('categories')}}" style="background-color: #6c757d;">
                            <span class="nav-icon"><i class="fas fa-th"></i></span>
                            <span class="nav-text">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link flex-fill text-white" href="#" style="background-color: #6c757d;"
                           data-bs-toggle="collapse" data-bs-target="#userManagementCollapse">
                            <span class="nav-icon"><i class="fas fa-users"></i></span>
                            <span class="nav-text">Users</span>
                        </a>
                        <ul class="collapse" id="userManagementCollapse">
                            <li class="nav-item">
                                <a class="nav-link flex-fill text-white" href="#" style="background-color: #6c757d;">
                                    <span class="nav-text">Manage Roles</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex-fill text-white" href="#" style="background-color: #6c757d;">
                                    <span class="nav-text">Set Banner User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex-fill text-white" href="#" style="background-color: #6c757d;">
                                    <span class="nav-text">View User List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link flex-fill text-white" href="#" style="background-color: #6c757d;">
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
                    <div class="sm:flex sm:space-x-4">
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                            <div class="bg-white p-5">
                                <div class="sm:flex sm:items-start">
                                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                        <h3 class="text-sm leading-6 font-medium text-gray-400">Total Subscribers</h3>
                                        <p class="text-3xl font-bold text-black">71,897</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                            <div class="bg-white p-5">
                                <div class="sm:flex sm:items-start">
                                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                        <h3 class="text-sm leading-6 font-medium text-gray-400">Avg. Open Rate</h3>
                                        <p class="text-3xl font-bold text-black">58.16%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                            <div class="bg-white p-5">
                                <div class="sm:flex sm:items-start">
                                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                        <h3 class="text-sm leading-6 font-medium text-gray-400">Avg. Click Rate</h3>
                                        <p class="text-3xl font-bold text-black">24.57%</p>
                                    </div>
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
