<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socialite</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100">

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

                        @if ($authUser->image)
                            <img src="{{ asset('images/' . $authUser->image) }}" alt=""
                                class="w-9 h-9 rounded-full">
                        @else
                            <img src="{{ asset('images/user.jpg') }}" alt="" class="w-9 h-9 rounded-full">
                        @endif
                        <a href="{{ route('profile', $authUser->id) }}">
                            <span
                                class="mx-3 text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $authUser->name }}</span></a>
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
    <div id="wrapper" class="m-24 mt-12">



        <!-- main contents -->
        <main id="site__main"
            class="2xl:ml-[--w-side]  xl:ml-[--w-side-sm] p-2.5 h-[calc(100vh-var(--m-top))] mt-[--m-top]">

            <div class="flex flex-col justify-content-center align-items-center max-w-[1065px] mx-auto max-lg:-m-2.5">

                <!-- cover  -->
                <div class="bg-white shadow lg:rounded-b-2xl lg:-mt-10 dark:bg-dark2">

                    <!-- cover -->
                    <div class="relative overflow-hidden w-full lg:h-72 h-48 bg-purple-100">

                    </div>

                    <!-- user info -->
                    <div class="p-3">

                        <div class="flex flex-col justify-center md:items-center lg:-mt-48 -mt-28">

                            <div class="relative lg:h-48 lg:w-48 w-28 h-28 mb-4 z-10">
                                <div
                                    class="relative overflow-hidden rounded-full md:border-[6px] border-gray-100 shrink-0 dark:border-slate-900 shadow">
                                    @if ($authUser->image)
                                        <img src="{{ asset('images/' . $authUser->image) }}" alt=""
                                            class="h-full w-full object-cover inset-0">
                                    @else
                                        <img src="{{ asset('images/user.jpg') }}" alt=""
                                            class="h-full w-full object-cover inset-0">
                                    @endif
                                </div>
                                <button type="button"
                                    class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-white shadow p-1.5 rounded-full sm:flex hidden">
                                    <ion-icon name="camera" class="text-2xl md hydrated" role="img"
                                        aria-label="camera"></ion-icon></button>
                            </div>

                            <div class="rounded-xl bg-gray-300 w-1/2 text-center h-1/2 box p-5 px-6">
                                <h3 class="md:text-3xl text-base font-bold text-black dark:text-white">
                                    {{ $user->name }}
                                </h3>
                                <p class="mt-2 text-gray-500 dark:text-white/80">{{ $authUser->bio }}
                                    @if ($user->id == auth()->user()->id)
                                    <div uk-toggle="target: #edit-bio">
                                        <a href="#" class="text-blue-500 ml-4 inline-block"> Edit </a>
                                    </div>
                                    @endif

                                </p>
                            </div>

                        </div>

                    </div>

                </div>
                {{-- ici ************************************************************************************************************************* --}}

                <div class="flex 2xl:gap-12 gap-10 mt-8 max-lg:flex-col" id="js-oversized">

                    <!-- feed story -->

                    <div class="lg:col-span-8 col-span-12">

                        <!-- add story -->
                        @if ($user->id == auth()->user()->id )
                            
                        @if ( $authUser->blocked == 0)
                            <div
                                class="bg-gray-200 rounded-xl shadow-sm p-4 space-y-4 text-sm font-medium border1 ">

                                <div class="flex items-center gap-3">
                                    <div class="flex-1 bg-gray-100  transition-all rounded-lg cursor-pointer dark:bg-dark3"
                                        uk-toggle="target: #create-status">
                                        <div class="py-2.5 text-center dark:text-white"> What do you have in mind?
                                        </div>
                                    </div>
                                    <div class="cursor-pointer  p-1 px-1.5 rounded-lg transition-all bg-pink-100/60 "
                                        uk-toggle="target: #create-status">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 stroke-pink-600 fill-pink-200/70" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M15 8h.01" />
                                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                            <path d="M3.5 15.5l4.5 -4.5c.928 -.893 2.072 -.893 3 0l5 5" />
                                            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l2.5 2.5" />
                                        </svg>
                                    </div>
                                </div>

                            </div>
                        @else
                            <div
                                class="bg-white rounded-xl shadow-sm md:p-4 p-2 space-y-4 text-sm font-medium border1 dark:bg-dark2">

                                <div class="flex items-center md:gap-3 gap-1">
                                    <div
                                        class="flex-1 bg-slate-100  transition-all rounded-lg cursor-pointer dark:bg-dark3">
                                        <div class="py-2.5 text-center dark:text-white"> Sorry you can't post currently
                                            you're blocked
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                        @endif

                        <!--  post image-->
                        @if ($postes)
                        @foreach ($postes as $poste)
                        <div class="bg-white mt-6 rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">
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

                                <button class="button-icon bg-slate-200/70 dark:bg-slate-700"
                                    onclick="toggleComments({{ $poste->id }})">
                                    <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> comments
                                </button>
                            </div>
                            <!-- Comments -->
                            <div id="commentsContainer_{{ $poste->id }}" class="hidden">
                                <div id="commentsSection"
                                    class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                                    @foreach ($poste->commentaires as $comment)
                                        <div class="flex items-start gap-3 relative">
                                            <a href="{{ route('profile', $comment->user->id) }}">
                                                @if ($comment->user->image)
                                                    <img src="{{ asset('images/' . $comment->user->image) }}" alt=""
                                                        class="w-9 h-9 rounded-full">
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

                        @endif

                    </div>

                    <!-- sidebar -->

                    <div class="lg:w-1/2 w-full ">

                        <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6 rounded-xl bg-gray-200">

                            <div class="box p-5 px-6 ">
                                <div class="flex items-ce justify-between text-black dark:text-white"
                                >
                                <h3 class="font-bold text-lg"> Description </h3>
                                @if ($user->id == auth()->user()->id)
                                <div uk-toggle="target: #edit-description">

                                    <a href="#" class="text-sm text-blue-500">Edit</a>
                                </div>
                                @endif
                                    </div>

                                <ul class="text-gray-700 space-y-4 mt-4 text-sm dark:text-white/80">

                                    <li class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm6 0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V4zm5 7h3m-3 4h3m-3 4h3">
                                            </path>
                                        </svg>

                                        <div>{{ $authUser->description }}</div>
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

    <!-- create status -->
    <div class="hidden lg:p-20 uk- open" id="create-status" uk-modal="">

        <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data" id="create-poste">
            @csrf
            <div
                class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

                <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                    <h2 class="text-sm font-medium text-black"> Create Status </h2>

                    <!-- close button -->
                    <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>

                <div class="space-y-5 mt-3 p-2">
                    <input name="titre" id=""
                        class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                        rows="6" placeholder="  Title">
                </div>
                <div class="space-y-5 mt-3 p-2">
                    <textarea
                        class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                        name="contenu" id="" rows="6" placeholder="What do you have in mind?"></textarea>
                </div>

                <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                    <input name="image" type="file"
                        class="flex items-center gap-1.5 bg-sky-50 text-sky-600 rounded-full py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900">
                </div>

                <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                    <select aria-placeholder="Category"
                        class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900"
                        name="category_id" id="">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->Nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                    @foreach ($tags as $tag)
                        <button type="button" class="button-tag" data-tag="{{ $tag->id }}"> #
                            {{ $tag->Name }}</button>
                    @endforeach
                </div>

                <div class="p-5 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <button type="submit" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                            Create</button>
                    </div>
                </div>

            </div>
        </form>

    </div>



    {{-- edit description --}}
    <div class="hidden lg:p-20 uk- open" id="edit-description" uk-modal="">
        <form action="{{ route('edit-description') }}" method="post">
            @csrf
            <div
                class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

                <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                    <h2 class="text-sm font-medium text-black"> Edit Description </h2>

                    <!-- close button -->
                    <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>
                <input type="hidden" name="user_id" value="{{ $authUser->id }}">
                <div class="space-y-5 mt-3 p-2">
                    <textarea
                        class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                        name="description" id="" rows="6" placeholder="No description yet">{{ $authUser->description }}</textarea>
                </div>

                <div class="p-5 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <button type="submit" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                            Save</button>
                    </div>
                </div>

            </div>

        </form>
    </div>


    {{-- edit bio --}}

    <div class="hidden lg:p-20 uk- open" id="edit-bio" uk-modal="">
        <form action="{{ route('edit-bio') }}" method="post">
            @csrf
            <div
                class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

                <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                    <h2 class="text-sm font-medium text-black"> Edit Bio </h2>

                    <!-- close button -->
                    <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>
                <input type="hidden" name="user_id" value="{{ $authUser->id }}">
                <div class="space-y-5 mt-3 p-2">
                    <input name="UserName" id=""
                        class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                        rows="6" placeholder="User Name can't be empty !" value="{{ $authUser->name }}">
                </div>
                <div class="space-y-5 mt-3 p-2">
                    <textarea
                        class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                        name="bio" id="" rows="6" placeholder="No bio yet">{{ $authUser->bio }}</textarea>
                </div>

                <div class="p-5 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <button type="submit" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                            Save</button>
                    </div>
                </div>

            </div>

        </form>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tagButtons = document.querySelectorAll('.button-tag');

            tagButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tagId = this.dataset.tag;
                    const input = document.createElement('input');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('name',
                        'tags[]'); // Utilisez un tableau pour récupérer plusieurs tags
                    input.setAttribute('value', tagId);
                    document.getElementById('create-poste').appendChild(input);
                });
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

<script>
    function toggleComments(postId) {
        const commentsContainer = document.getElementById(`commentsContainer_${postId}`);
        commentsContainer.classList.toggle('hidden');
    }
</script>
        <script src="{{ asset('js/uikit.min.js') }}"></script>

    <script type="module" src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.js"></script>


</body>


</html>
