<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.foxthemes.net/socialite-v3.0/feed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Mar 2024 09:49:47 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- title and description-->
    <title>Socialite</title>
    <meta name="description" content="Socialite - Social sharing network HTML Template">

    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- header -->
        <header
            class="z-[100] h-[--m-top] fixed top-0 left-0 w-full flex items-center bg-white/80 sky-50 backdrop-blur-xl border-b border-slate-200 dark:bg-dark2 dark:border-slate-800">

            <div class="flex items-center w-full xl:px-6 px-2 max-lg:gap-10">

                <div class="2xl:w-[--w-side] lg:w-[--w-side-sm]">

                    <!-- left -->
                    <div class="flex items-center gap-1">

                        <!-- icon menu -->
                        <button uk-toggle="target: #site__sidebar ; cls :!-translate-x-0"
                            class="flex items-center justify-center w-8 h-8 text-xl rounded-full hover:bg-gray-100 xl:hidden dark:hover:bg-slate-600 group">
                            <ion-icon name="menu-outline" class="text-2xl group-aria-expanded:hidden"></ion-icon>
                            <ion-icon name="close-outline" class="hidden text-2xl group-aria-expanded:block"></ion-icon>
                        </button>
                        <div id="logo">
                            <a href="feed.html">
                                <img src="assets/images/logo.png" alt=""
                                    class="w-28 md:block hidden dark:!hidden">
                                <img src="assets/images/logo-light.png" alt="" class="dark:md:block hidden">
                                <img src="assets/images/logo-mobile.png" class="hidden max-md:block w-20 dark:!hidden"
                                    alt="">
                                <img src="assets/images/logo-mobile-light.png" class="hidden dark:max-md:block w-20"
                                    alt="">
                            </a>
                        </div>

                    </div>

                </div>
                <div class="flex-1 relative">

                    <div class="max-w-[1220px] mx-auto flex items-center">

                        <!-- search -->
                        <div id="search--box"
                            class="xl:w-[680px] sm:w-96 sm:relative rounded-xl overflow-hidden z-20 bg-secondery max-md:hidden w-screen left-0 max-sm:fixed max-sm:top-2 dark:!bg-white/5">
                            <ion-icon name="search" class="absolute left-4 top-1/2 -translate-y-1/2"></ion-icon>
                            <input type="text" placeholder="Search Friends, videos .."
                                class="w-full !pl-10 !font-normal !bg-transparent h-12 !text-sm">
                        </div>
                        <!-- search dropdown-->
                        <div class="hidden uk- open z-10"
                            uk-drop="pos: bottom-center ; animation: uk-animation-slide-bottom-small;mode:click ">

                            <div
                                class="xl:w-[694px] sm:w-96 bg-white dark:bg-dark3 w-screen p-2 rounded-lg shadow-lg -mt-14 pt-14">
                                <div class="flex justify-between px-2 py-2.5 text-sm font-medium">
                                    <div class=" text-black dark:text-white">Recent</div>
                                    <button type="button" class="text-blue-500">Clear</button>
                                </div>
                                <nav class="text-sm font-medium text-black dark:text-white">
                                    <a href="#"
                                        class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                                        <img src="assets/images/avatars/avatar-2.jpg" class="w-9 h-9 rounded-full">
                                        <div>
                                            <div> Jesse Steeve </div>
                                            <div class="text-xs text-blue-500 font-medium mt-0.5"> Friend </div>
                                        </div> <ion-icon name="close"
                                            class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                                    </a>
                                </nav>
                                <hr class="-mx-2 mt-2 hidden">
                                <div class="flex justify-end pr-2 text-sm font-medium text-red-500 hidden">
                                    <a href="#"
                                        class="flex hover:bg-red-50 dark:hover:bg-slate-700 p-1.5 rounded"> <ion-icon
                                            name="trash" class="mr-2 text-lg"></ion-icon> Clear your history</a>
                                </div>
                            </div>

                        </div>

                        <!-- header icons -->
                        <div
                            class="flex items-center sm:gap-4 gap-2 absolute right-5 top-1/2 -translate-y-1/2 text-white">

                            <!-- profile -->
                            <div class="rounded-full relative bg-secondery cursor-pointer shrink-0">
                                @auth
                                    <img src="assets/images/avatars/avatar-2.jpg" alt=""
                                        class="sm:w-9 sm:h-9 w-7 h-7 rounded-full shadow shrink-0">
                                </div>
                                <a href="{{ route('profile', $user->id) }}">{{ $user->name }}</a>
                                <a href="{{ route('logout') }}">logout</a>
                            @else
                                <a href="{{ route('register') }}">Register</a>
                                <a href="{{ route('login') }}">Login</a>

                            @endauth

                        </div>

                    </div>

                </div>

            </div>

        </header>


        <!-- main contents -->
        <main id="site__main"
            class="2xl:ml-[--w-side]  xl:ml-[--w-side-sm] p-2.5 h-[calc(100vh-var(--m-top))] mt-[--m-top]">

            <!-- timeline -->
            <div class="lg:flex 2xl:gap-16 gap-12 max-w-[1065px] mx-auto" id="js-oversized">

                <div class="max-w-[680px] mx-auto">


                    <!-- feed story -->
                    <div class="md:max-w-[580px] mx-auto flex-1 xl:space-y-6 space-y-3">

                        <!-- post text-->
                            <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                                <!-- post heading -->
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

                                    <div class="-mr-1">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true"
                                            aria-expanded="false"> <ion-icon class="text-xl md hydrated"
                                                name="ellipsis-horizontal" role="img"
                                                aria-label="ellipsis horizontal"></ion-icon>
                                        </button>
                                        <div class="w-[245px] uk-dropdown"
                                            uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0 md hydrated"
                                                        name="bookmark-outline" role="img"
                                                        aria-label="bookmark outline"></ion-icon> Add to favorites </a>
                                                <hr>
                                                <a href="#"
                                                    class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                                                    <ion-icon class="text-xl shrink-0 md hydrated"
                                                        name="stop-circle-outline" role="img"
                                                        aria-label="stop circle outline"></ion-icon> Unfollow </a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:px-4 p-2.5 pt-0">
                                    <h3 class="font-bold text-base"> {{ $poste->titre }} </h3>
                                    <br>
                                    <div class="relative w-full lg:h-96 h-full sm:px-4">
                                        @if ($poste->image)
                                            <img src="{{ asset('images/' . $poste->image) }}" alt=""
                                                class="sm:rounded-lg w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <p class="font-normal"> {{ $poste->contenu }}</p><br>
                                    <p class="font-normal">
                                        @foreach ($poste->tags as $tag)
                                            <button
                                                class="button bg-primary-soft text-primary dark:text-white">#{{ $tag->Name }}</button>
                                        @endforeach
                                    </p>
                                </div>

                                <!-- post icons -->
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
                                                <button type="button"
                                                    class="text-red-600 hover:scale-125 duration-300">
                                                    <span> 👍 </span></button>
                                                <button type="button"
                                                    class="text-red-600 hover:scale-125 duration-300">
                                                    <span> ❤️ </span></button>
                                                <button type="button"
                                                    class="text-red-600 hover:scale-125 duration-300">
                                                    <span> 😂 </span></button>
                                                <button type="button"
                                                    class="text-red-600 hover:scale-125 duration-300">
                                                    <span> 😯 </span></button>
                                                <button type="button"
                                                    class="text-red-600 hover:scale-125 duration-300">
                                                    <span> 😢 </span></button>
                                            </div>

                                            <div
                                                class="w-2.5 h-2.5 absolute -bottom-1 left-3 bg-white rotate-45 hidden">
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

                                <!-- comments -->
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

                                <!-- add comment -->
                                <div
                                    class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">
                                    <form action="{{ route('addComment', ['idee_id' => $poste->id]) }}"
                                        method="POST">
                                        @csrf
                                        <img src="assets/images/avatars/avatar-7.jpg" alt=""
                                            class="w-6 h-6 rounded-full">

                                        <div class="flex-1 relative overflow-hidden h-10">
                                            <textarea placeholder="Add Comment.... " rows="1" name="addComment"
                                                class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"
                                                aria-haspopup="true" aria-expanded="false"></textarea>
                                        </div>


                                        <button type="submit"
                                            class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">
                                            Replay</button>
                                    </form>
                                </div>

                            </div>

                    </div>

                </div>

            </div>

        </main>

    </div>


    <!-- Javascript  -->
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="{{ asset('js/simplebar.js') }}"></script> --}}
    {{-- <script src="assets/js/simplebar.js"></script> --}}

    <!-- Ion icon -->
    <script type="module" src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.js"></script>


</body>

<!-- Mirrored from demo.foxthemes.net/socialite-v3.0/feed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Mar 2024 09:50:06 GMT -->

</html>
