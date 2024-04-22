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
                            <a class="nav-link flex-fill text-white" href="{{route('users')}}" style="background-color: #6c757d;"
                                data-bs-toggle="collapse" data-bs-target="#userManagementCollapse">
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
                        <h2>List of Postes</h2>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Poste Owner</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date of creation</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postes as $poste)
                                <tr>
                                    <th scope="row">{{ $poste->id }}</th>
                                    <td>
                                        <img style="width: 100px;" src="{{ asset('images/' . $poste->image) }}"
                                            alt="">

                                    </td>
                                    <td>{{ $poste->titre }}</td>
                                    <td>
                                        <a href="{{ route('poste_details', $poste->id) }}"
                                            class="btn btn-secondary btn-sm">
                                            View content
                                        </a>
                                    </td>
                                    <td>{{ $poste->user->name }}</td>
                                    <td>{{ $poste->category->Nom }}</td>
                                    <td>{{ $poste->created_at }}</td>
                                    <td>
                                        @if ($poste->isHidden == 0)
                                            <a href="{{ route('hide_poste', $poste->id) }}">
                                                <button class="btn btn-sm btn-danger">Hide Poste</button>
                                            </a>
                                        @else
                                            <a href="{{ route('show_poste', $poste->id) }}">
                                                <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#editposteModal-{{ $poste->id }}">
                                                    Show Poste
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                {{-- <div class="modal fade" id="editposteModal-{{$poste->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('Edit_poste') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$poste->id}}">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit poste</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <td>{{ asset('storage/event_images/' . $poste->image) }}</td>
                                                    <label for="posteImage" class="form-label">Update Poste Image</label>
                                                    <input type="file" class="form-control" name="posteImage" id="posteImage"
                                                        name="posteImage" placeholder="Enter poste ">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posteTitre" class="form-label">Titre</label>
                                                    <input type="text" class="form-control" name="posteTitre" id="posteTitre"
                                                        name="posteTitre" placeholder="Enter poste title"
                                                        value="{{ $poste->titre }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posteContent" class="form-label">poste content</label>
                                                    <input type="text" class="form-control" name="posteContent" id="posteContent"
                                                        name="posteContent" placeholder="Enter poste content"
                                                        value="{{ $poste->contenu }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posteName" class="form-label">poste</label>
                                                    <input type="text" class="form-control" name="posteName" id="posteName"
                                                        name="posteName" placeholder="Enter poste"
                                                        value="{{ $poste->titre }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posteName" class="form-label">poste</label>
                                                    <input type="text" class="form-control" name="posteName" id="posteName"
                                                        name="posteName" placeholder="Enter poste"
                                                        value="{{ $poste->titre }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posteName" class="form-label">poste</label>
                                                    <input type="text" class="form-control" name="posteName" id="posteName"
                                                        name="posteName" placeholder="Enter poste"
                                                        value="{{ $poste->titre }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posteName" class="form-label">poste</label>
                                                    <input type="text" class="form-control" name="posteName" id="posteName"
                                                        name="posteName" placeholder="Enter poste"
                                                        value="{{ $poste->titre }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="posteName" class="form-label">poste</label>
                                                    <input type="text" class="form-control" name="posteName" id="posteName"
                                                        name="posteName" placeholder="Enter poste"
                                                        value="{{ $poste->titre }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
