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
                </div>
            </div>
        </div>
    </main>
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

    <script>
        function toggleComments(postId) {
            const commentsContainer = document.getElementById(`commentsContainer_${postId}`);
            commentsContainer.classList.toggle('hidden');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
