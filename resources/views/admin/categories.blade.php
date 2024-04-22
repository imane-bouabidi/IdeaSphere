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
                        <a href="{{route('home')}}" class="text-white mr-12">home</a>
                        <a href="{{route('logout')}}" class="text-white">Logout</a>
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
                            <a class="nav-link flex-fill text-white" href="{{ route('hashtags') }}"
                                style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-hashtag"></i></span>
                                <span class="nav-text">Hashtags</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flex-fill text-white" href="{{ route('admin') }}"
                                style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-hashtag"></i></span>
                                <span class="nav-text">Statistiques</span>
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
                            <a class="nav-link flex-fill text-white" href="{{route('users')}}" style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-users"></i></span>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flex-fill text-white" href="{{route('postes')}}" style="background-color: #6c757d;">
                                <span class="nav-icon"><i class="fas fa-file-alt"></i></span>
                                <span class="nav-text">Idea Post Content</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="col-md-9 col-lg-10 main-content">


                <div class="container mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>List of Categories</h2>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add
                            Category</button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                            <tr>
                                <th scope="row">{{ $categorie->id }}</th>
                                <td>{{ $categorie->Nom }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCategoryModal-{{$categorie->id}}">
                                        Edit
                                    </button>
                                    <a href="{{ route('delete_Category', $categorie->id) }}">
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="editCategoryModal-{{$categorie->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('Edit_category') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$categorie->id}}">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="CategoryName" class="form-label">Category</label>
                                                    <input type="text" class="form-control" name="CategoryName" id="CategoryName"
                                                        name="CategoryName" placeholder="Enter Category"
                                                        value="{{ $categorie->Nom }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                          
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('addCategory') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <form> --}}
                        <div class="mb-3">
                            <label for="CategoryInput" class="form-label">Category</label>
                            <input type="text" class="form-control" id="CategoryInput" name="CategoryInput"
                                placeholder="Enter Category">
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
