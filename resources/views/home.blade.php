<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg dark:bg-dark2">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="#" class="text-lg font-semibold text-gray-800 dark:text-white">Logo</a>
                    <!-- User Name -->
                </div>
                <div class="flex items-center">
                    <!-- Search Bar -->
                    <div class="relative">
                        <form action="{{ route('search') }}" method="GET">
                            <input type="text" id="searchBar" placeholder="Rechercher une idée par titre..."
                                class="h-10 w-72 px-4 py-2 pr-8 text-sm bg-gray-100 rounded-full focus:outline-none focus:ring focus:ring-indigo-300 dark:bg-gray-800 dark:text-gray-200">
                        </form>
                    </div>
                    <div class="flex items-center ml-12">

                        @if ($user->image)
                            <img src="{{ asset('images/' . $user->image) }}" alt=""
                                class="w-9 h-9 rounded-full">
                        @else
                            <img src="{{ asset('images/user.jpg') }}" alt="" class="w-9 h-9 rounded-full">
                        @endif
                        <a href="{{ route('profile', $user->id) }}">
                            <span
                                class="mx-3 text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $user->name }}</span></a>
                    </div>
                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="ml-4 flex items-center justify-center h-10 w-10 rounded-full text-dark  focus:outline-none">
                            logout
                            <ion-icon name="log-out-outline"></ion-icon>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 p-4 md:py-6">
        <div class="container mx-auto grid grid-cols-12 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-8 col-span-12">
                <!-- Posts -->
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-1" id="searchResult">
                    <!-- Post -->
                    @foreach ($postes as $poste)
                        <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">
                            <!-- Post Heading -->
                            <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                                <a href="{{ route('profile', $poste->user->id) }}">
                                    @if ($poste->user->image)
                                        <img src="{{ asset('images/' . $poste->user->image) }}" alt=""
                                            class="w-9 h-9 rounded-full">
                                    @else
                                        <img src="{{ asset('images/user.jpg') }}" alt=""
                                            class="w-9 h-9 rounded-full">
                                    @endif
                                </a>
                                <div class="flex-1">
                                    <a href="{{ route('profile', $poste->user->id) }}">
                                        <h4 class="text-black dark:text-white"> {{ $poste->user->name }} </h4>
                                    </a>
                                </div>
                            </div>
                            <div class="sm:px-4 p-2.5 pt-0">
                                <h3 class="font-bold text-base"> {{ $poste->titre }} </h3>
                                <br>
                                @if ($poste->image)
                                    <div class="relative w-full lg:h-96 h-full sm:px-4">
                                        <img src="{{ asset('images/' . $poste->image) }}" alt=""
                                            class="sm:rounded-lg w-full h-full object-cover">
                                    </div>
                                @endif
                                <p class="font-normal"> {{ $poste->contenu }}</p><br>
                                <p class="font-normal">
                                    @foreach ($poste->tags as $tag)
                                        <button
                                            class="button bg-primary-soft text-primary dark:text-white">#{{ $tag->Name }}</button>
                                    @endforeach
                                </p>
                            </div>
                            <!-- Post Icons -->
                            <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                                {{-- <div class="flex items-center gap-2.5">
                                    <!-- Like Button -->
                                    <button type="button" onclick="toggleLike({{ $poste->id }})"
                                        class="dark:bg-slate-700 w-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                                        </svg>
                                    </button>
                                    <a id="likesCount_{{ $poste->id }}"> {{ $poste->liked }} Likes</a>
                                </div>
                                <hr>|
                                <hr>
                                <div class="flex items-center gap-2.5">
                                    <!-- Dislike Button -->
                                    <button type="button" onclick="toggleDislike({{ $poste->id }})"
                                        class="dark:bg-slate-700 w-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M323.8 477.2c-38.2 10.9-78.1-11.2-89-49.4l-5.7-20c-3.7-13-10.4-25-19.5-35l-51.3-56.4c-8.9-9.8-8.2-25 1.6-33.9s25-8.2 33.9 1.6l51.3 56.4c14.1 15.5 24.4 34 30.1 54.1l5.7 20c3.6 12.7 16.9 20.1 29.7 16.5s20.1-16.9 16.5-29.7l-5.7-20c-5.7-19.9-14.7-38.7-26.6-55.5c-5.2-7.3-5.8-16.9-1.7-24.9s12.3-13 21.3-13L448 288c8.8 0 16-7.2 16-16c0-6.8-4.3-12.7-10.4-15c-7.4-2.8-13-9-14.9-16.7s.1-15.8 5.3-21.7c2.5-2.8 4-6.5 4-10.6c0-7.8-5.6-14.3-13-15.7c-8.2-1.6-15.1-7.3-18-15.2s-1.6-16.7 3.6-23.3c2.1-2.7 3.4-6.1 3.4-9.9c0-6.7-4.2-12.6-10.2-14.9c-11.5-4.5-17.7-16.9-14.4-28.8c.4-1.3 .6-2.8 .6-4.3c0-8.8-7.2-16-16-16H286.5c-12.6 0-25 3.7-35.5 10.7l-61.7 41.1c-11 7.4-25.9 4.4-33.3-6.7s-4.4-25.9 6.7-33.3l61.7-41.1c18.4-12.3 40-18.8 62.1-18.8H384c34.7 0 62.9 27.6 64 62c14.6 11.7 24 29.7 24 50c0 4.5-.5 8.8-1.3 13c15.4 11.7 25.3 30.2 25.3 51c0 6.5-1 12.8-2.8 18.7C504.8 238.3 512 254.3 512 272c0 35.3-28.6 64-64 64l-92.3 0c4.7 10.4 8.7 21.2 11.8 32.2l5.7 20c10.9 38.2-11.2 78.1-49.4 89zM32 384c-17.7 0-32-14.3-32-32V128c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H32z" />
                                        </svg>
                                    </button>
                                    <a id="dislikesCount_{{ $poste->id }}"> {{ $poste->disliked }} Dislikes </a>
                                </div>
                                <hr>
                                <hr> --}}
                                <button class="button-icon bg-slate-200/70 dark:bg-slate-700 w-6"
                                    onclick="toggleComments({{ $poste->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z" />
                                    </svg>
                                </button>
                                Comments
                            </div>

                            <!-- Comments -->
                            <div id="commentsContainer_{{ $poste->id }}" class="hidden">
                                <div id="commentsSection"
                                    class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                                    @foreach ($poste->commentaires as $comment)
                                        <div class="flex items-start gap-3 relative">
                                            <a href="{{ route('profile', $comment->user->id) }}">
                                                @if ($comment->user->image)
                                                    <img src="{{ asset('images/' . $comment->user->image) }}"
                                                        alt="" class="w-9 h-9 rounded-full">
                                                @else
                                                    <img src="{{ asset('images/user.jpg') }}" alt=""
                                                        class="w-9 h-9 rounded-full">
                                                @endif
                                            </a>
                                            <div class="flex-1">
                                                <a href="{{ route('profile', $comment->user->id) }}"
                                                    class="text-black font-medium inline-block dark:text-white">
                                                    {{ $comment->user->name }}
                                                </a>
                                                <p class="mt-0.5">{{ $comment->contenu }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Add Comment -->
                            <div
                                class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                                <form class="commentForm flex items-center gap-2" action="{{ route('addComment') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $poste->id }}">
                                    @if ($user->image)
                                        <img src="{{ asset('images/' . $user->image) }}" alt=""
                                            class="w-9 h-9 rounded-full">
                                    @else
                                        <img src="{{ asset('images/user.jpg') }}" alt=""
                                            class="w-9 h-9 rounded-full">
                                    @endif
                                    <div class="flex-1 relative  ">
                                        <textarea placeholder="Add Comment.... " rows="1" name="addComment" id="body"
                                            class="h-10 w-72 px-4 py-2 pr-8 text-sm bg-gray-100 rounded-full focus:outline-none focus:ring focus:ring-indigo-300 dark:bg-gray-800 dark:text-gray-200"
                                            aria-haspopup="true" aria-expanded="false"></textarea>
                                    </div>
                                    <button id="submitComment" type="submit"
                                        class="text-sm rounded-full py-1.5 px-3.5 bg-indigo-700 text-white">Reply</button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                    <div class="mt-4">
                        {{ $postes->links() }}
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="lg:col-span-4">
                <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
                    uk-sticky="media: 1024; end: #js-oversized; offset: 80">
                    <div class="box p-5 px-6 border1 dark:bg-dark2">
                        <div class="flex justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base"> Categories you may like </h3>
                            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon>
                            </button>
                        </div>
                        <div
                            class="space-y-3.5 capitalize text-xs font-normal mt-5 mb-2 text-gray-600 dark:text-white/80">
                            @foreach ($categories as $categorie)
                                <form action="{{ route('follow_category') }}" method="post">
                                    @csrf
                                    <div class="flex items-center gap-3 p side-list-item">
                                        <input type="hidden" name="cat_id" value="{{ $categorie->id }}">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-black dark:text-white text-sm">
                                                {{ $categorie->Nom }} </h4>
                                            <div class="mt-0.5"> {{ $categorie->idees->count() }} Idée publiée </div>
                                        </div>
                                        <button type="submit"
                                            class="button bg-primary-soft text-primary dark:text-white"> follow
                                        </button>
                                    </div>
                                </form>
                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="box p-5 px-6 border1 dark:bg-dark2">
                        <div class="flex justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base"> Hashtags for you </h3>
                            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon>
                            </button>
                        </div>
                        <div
                            class="space-y-3.5 capitalize text-xs font-normal mt-5 mb-2 text-gray-600 dark:text-white/80">
                            @foreach ($tags as $tag)
                                <form action="{{ route('follow_tag') }}" method="post">
                                    @csrf
                                    <div class="flex items-center gap-3 p side-list-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>
                                        <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-black dark:text-white text-sm">
                                                {{ $tag->Name }} </h4>
                                            <div class="mt-0.5"> {{ $tag->idees->count() }} Idée publiée </div>
                                        </div>
                                        <button type="submit"
                                            class="button bg-primary-soft text-primary dark:text-white"> follow
                                        </button>
                                    </div>
                                </form>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Create Post Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden"
        id="create-post-modal">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <h3 class="text-lg font-semibold">Create Post</h3>
                <button id="close-modal-btn" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data" class="px-4 py-3">
                @csrf
                <input type="text" name="title" placeholder="Title"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <textarea name="content" rows="4" placeholder="Content"
                    class="block w-full mt-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <input type="file" name="image" class="block mt-3">
                <select name="category"
                    class="block w-full mt-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="block w-full mt-4 py-2 px-4 bg-indigo-500 text-white font-semibold rounded-md transition duration-200 hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Create</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const createPostModal = document.getElementById('create-post-modal');
        const openModalBtn = document.getElementById('open-modal-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');

        openModalBtn.addEventListener('click', function() {
            createPostModal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', function() {
            createPostModal.classList.add('hidden');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const route = "{{ route('search') }}";
            const searchInput = document.getElementById('searchBar');
            const searchResult = document.getElementById('searchResult');
            let originalHTML = searchResult.innerHTML;

            function fetchPosts(query) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `${route}?q=${query}`, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        const response = JSON.parse(xhr.responseText);
                        const sanitizedHTML = response.html.replace(/[\r\n]+/g, '');
                        searchResult.innerHTML = sanitizedHTML;
                    }
                }
                xhr.send();
            }

            searchInput.addEventListener('input', function() {
                const inputValue = searchInput.value.trim();
                if (inputValue !== '') {
                    fetchPosts(inputValue);
                } else {
                    searchResult.innerHTML = originalHTML;
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.commentForm').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    var formData = new FormData(this);
                    var xhr = new XMLHttpRequest();

                    xhr.open('POST', '{{ route('addComment') }}');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            var newCommentHtml = xhr.responseText;
                            var postId = formData.get('post_id');
                            var commentsSection = document.getElementById(
                                `commentsContainer_${postId}`);
                            commentsSection.insertAdjacentHTML('beforeend', newCommentHtml);
                            form.reset();
                        } else {
                            console.error('Error adding comment:', xhr.statusText);
                        }
                    };

                    xhr.send(formData);
                });
            });
        });
    </script>

    {{-- <script>
        function toggleLike(postId) {
            fetch('/toggle-like', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        postId: postId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const likeButton = document.getElementById('likesCount_' + postId);
                        const dislikeButton = document.getElementById('dislikesCount_' + postId);

                        if (!likeButton.classList.contains('text-green-500')) {
                            likeButton.innerHTML = (parseInt(likeButton.innerHTML) + 1) + ' Likes';
                            likeButton.classList.add('text-green-500');

                            if (dislikeButton.classList.contains('text-red-500')) {
                                dislikeButton.innerHTML = (parseInt(dislikeButton.innerHTML) - 1) + ' Dislikes';
                                dislikeButton.classList.remove('text-red-500');
                            }
                        } else {
                            likeButton.innerHTML = (parseInt(likeButton.innerHTML) - 1) + ' Likes';
                            likeButton.classList.remove('text-green-500');
                        }
                    } else {
                        console.error('Error:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function toggleDislike(postId) {
            fetch('/toggle-dislike', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        postId: postId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const likeButton = document.getElementById('likesCount_' + postId);
                        const dislikeButton = document.getElementById('dislikesCount_' + postId);

                        if (!dislikeButton.classList.contains('text-red-500')) {
                            dislikeButton.innerHTML = (parseInt(dislikeButton.innerHTML) + 1) + ' Dislikes';
                            dislikeButton.classList.add('text-red-500');

                            if (likeButton.classList.contains('text-green-500')) {
                                likeButton.innerHTML = (parseInt(likeButton.innerHTML) - 1) + ' Likes';
                                likeButton.classList.remove('text-green-500');
                            }
                        } else {
                            dislikeButton.innerHTML = (parseInt(dislikeButton.innerHTML) - 1) + ' Dislikes';
                            dislikeButton.classList.remove('text-red-500');
                        }
                    } else {
                        console.error('Error:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script> --}}

    <script>
        function toggleComments(postId) {
            const commentsContainer = document.getElementById(`commentsContainer_${postId}`);
            commentsContainer.classList.toggle('hidden');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
