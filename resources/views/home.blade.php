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
                                {{-- <div class="-mr-1">
                                    <button type="button" class="button__ico w-8 h-8" aria-haspopup="true"
                                        aria-expanded="false">
                                        <ion-icon class="text-xl md hydrated" name="ellipsis-horizontal"
                                            role="img" aria-label="ellipsis horizontal"></ion-icon>
                                    </button>
                                    <div class="w-[245px] uk-dropdown"
                                        uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                        <nav>
                                            <a href="#">
                                                <ion-icon class="text-xl shrink-0 md hydrated"
                                                    name="bookmark-outline" role="img"
                                                    aria-label="bookmark outline"></ion-icon> Add to favorites
                                            </a>
                                            <hr>
                                            <a href="#"
                                                class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                                                <ion-icon class="text-xl shrink-0 md hydrated"
                                                    name="stop-circle-outline" role="img"
                                                    aria-label="stop circle outline"></ion-icon> Unfollow
                                            </a>
                                        </nav>
                                    </div>
                                </div> --}}
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
                                <div>
                                    <div class="flex items-center gap-2.5">
                                        <button type="button"
                                            class="button-icon text-red-500 bg-red-100 dark:bg-slate-700">
                                            <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                        <a href="#">1,300</a>
                                    </div>
                                    <div class="p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl"
                                        uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left">
                                        <div class="flex gap-2"
                                            uk-scrollspy="target: > button; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                                            <button type="button" class="text-red-600 hover:scale-125 duration-300">
                                                <span> 👍 </span></button>
                                            <button type="button" class="text-red-600 hover:scale-125 duration-300">
                                                <span> ❤️ </span></button>
                                            <button type="button" class="text-red-600 hover:scale-125 duration-300">
                                                <span> 😂 </span></button>
                                            <button type="button" class="text-red-600 hover:scale-125 duration-300">
                                                <span> 😯 </span></button>
                                            <button type="button" class="text-red-600 hover:scale-125 duration-300">
                                                <span> 😢 </span></button>
                                        </div>
                                        <div class="w-2.5 h-2.5 absolute -bottom-1 left-3 bg-white rotate-45 hidden">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700">
                                        <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                                    <span>260</span>
                                </div>
                                <button type="button" class="button-icon ml-auto"> <ion-icon class="text-xl"
                                        name="paper-plane-outline"></ion-icon> </button>
                                <button type="button" class="button-icon"> <ion-icon class="text-xl"
                                        name="share-outline"></ion-icon> </button>
                            </div>
                            <!-- Comments -->
                            <div
                                class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                                @foreach ($poste->commentaires as $comment)
                                    <div class="flex items-start gap-3 relative">
                                        <a href="timeline.html"> <img src="assets/images/avatars/avatar-2.jpg"
                                                alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="{{ route('profile', $user->id) }}"
                                                class="text-black font-medium inline-block dark:text-white">
                                                {{ $comment->user->name }}
                                            </a>
                                            <p class="mt-0.5">{{ $comment->contenu }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Comment -->
                            <div
                                class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                                <form action="{{ route('addComment', ['idee_id' => $poste->id]) }}" method="POST">
                                    @csrf
                                    <img src="assets/images/avatars/avatar-7.jpg" alt=""
                                        class="w-6 h-6 rounded-full">
                                    <div class="flex-1 relative overflow-hidden h-10">
                                        <textarea placeholder="Add Comment.... " rows="1" name="addComment"
                                            class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"
                                            aria-haspopup="true" aria-expanded="false"></textarea>
                                    </div>
                                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">
                                        Replay</button>
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
                // If input is empty, restore original HTML content
                searchResult.innerHTML = originalHTML;
            }
        });
    });
</script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
