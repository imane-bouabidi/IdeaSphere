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

<body>

    <div id="wrapper">

        <header class="z-50 h-14 fixed top-0 left-0 w-full flex items-center bg-white/80 sky-50 backdrop-blur-xl border-b border-slate-200 dark:bg-dark2 dark:border-slate-800">

            <div class="flex items-center w-full xl:px-6 px-2 max-lg:gap-10">

                <div class="w-[90px]">

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
                        <div class="hidden uk-open z-10"
                            uk-drop="pos: bottom-center ; animation: uk-animation-slide-bottom-small;mode:click ">

                            <div
                                class="xl:w-[694px] sm:w-96 bg-white dark:bg-dark3 w-screen p-2 rounded-lg shadow-lg -mt-14 pt-14">
                                <div class="flex justify-between px-2 py-2.5 text-sm font-medium">
                                    <div class="text-black dark:text-white">Recent</div>
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
                            @auth
                                <div class="rounded-full relative bg-secondery cursor-pointer shrink-0">
                                    <a href="{{ route('profile', $authUser->id) }}">
                                        @if ($authUser->image)
                                            <img src="{{ asset('images/' . $authUser->image) }}" alt=""
                                                class="w-9 h-9 rounded-full">
                                        @else
                                            <img src="{{ asset('images/user.jpg') }}" alt=""
                                                class="w-9 h-9 rounded-full">
                                        @endif

                                    </a>
                                </div>
                                <a href="{{ route('profile', $authUser->id) }}">{{ $authUser->name }}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('register') }}">Register</a>
                                <a href="{{ route('login') }}">Login</a>

                            @endauth

                            <div class="flex items-center gap-2 hidden">

                                <img src="assets/images/avatars/avatar-2.jpg" alt=""
                                    class="w-9 h-9 rounded-full shadow">

                                <div class="w-20 font-semibold text-gray-600"> Hamse </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </header>


        <!-- main contents -->
        <main id="site__main"
            class="2xl:ml-[--w-side]  xl:ml-[--w-side-sm] p-2.5 h-[calc(100vh-var(--m-top))] mt-[--m-top]">

            <div class="max-w-[1065px] mx-auto max-lg:-m-2.5">

                <!-- cover  -->
                <div class="bg-white shadow lg:rounded-b-2xl lg:-mt-10 dark:bg-dark2">

                    <!-- cover -->
                    <div class="relative overflow-hidden w-full lg:h-72 h-48">

                        <img src="assets/images/avatars/profile-cover.jpg" alt=""
                            class="h-full w-full object-cover inset-0">

                        <!-- overlay -->
                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20 z-10"></div>
                        @if ($user->id == auth()->user()->id)
                            <div class="absolute bottom-0 right-0 m-4 z-20">
                                <div class="flex items-center gap-3">
                                    <button
                                        class="button bg-white/20 text-white flex items-center gap-2 backdrop-blur-small">Edit</button>
                                </div>
                            </div>
                        @endif

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

                            <h3 class="md:text-3xl text-base font-bold text-black dark:text-white">
                                {{ $user->name }}
                            </h3>
                            <div uk-toggle="target: #edit-bio">
                                <p class="mt-2 text-gray-500 dark:text-white/80">{{ $authUser->bio }}
                                    @if ($user->id == auth()->user()->id)
                                        <a href="#" class="text-blue-500 ml-4 inline-block"> Edit </a>
                                    @endif

                                </p>
                            </div>

                        </div>

                    </div>

                    <!-- Navigations -->
                    <div class="flex items-center justify-between mt-3 border-t border-gray-100 px-2 max-lg:flex-col dark:border-slate-700"
                        uk-sticky="offset:50; cls-active: bg-white/80 shadow rounded-b-2xl z-50 backdrop-blur-xl dark:!bg-slate-700/80; animation:uk-animation-slide-top ; media: 992">


                        <nav
                            class="flex gap-0.5 rounded-xl -mb-px text-gray-600 font-medium text-[15px]  dark:text-white max-md:w-full max-md:overflow-x-auto">
                            <a href="#"
                                class="inline-block  py-3 leading-8 px-3.5 border-b-2 border-blue-600 text-blue-600">Timeline</a>


                        </nav>

                    </div>

                </div>
                {{-- ici ************************************************************************************************************************* --}}

                <div class="flex 2xl:gap-12 gap-10 mt-8 max-lg:flex-col" id="js-oversized">

                    <!-- feed story -->

                    <div class="flex-1 xl:space-y-6 space-y-3">

                        <!-- add story -->
                        @if ($user->id == auth()->user()->id && $authUser->blocked == 0)
                            <div
                                class="bg-white rounded-xl shadow-sm p-4 space-y-4 text-sm font-medium border1 dark:bg-dark2">

                                <div class="flex items-center gap-3">
                                    <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3"
                                        uk-toggle="target: #create-status">
                                        <div class="py-2.5 text-center dark:text-white"> What do you have in mind?
                                        </div>
                                    </div>
                                    <div class="cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-lg transition-all bg-pink-100/60 hover:bg-pink-100"
                                        uk-toggle="target: #create-status">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 stroke-pink-600 fill-pink-200/70" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="#2c3e50" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
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
                                        class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3">
                                        <div class="py-2.5 text-center dark:text-white"> Sorry you can't post currently
                                            you're blocked
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif

                        <!--  post image-->
                        @if ($postes)
                            @foreach ($postes as $poste)
                                <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                                    <!-- post heading -->
                                    <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                                        <a href="{{ route('profile', $poste->user->id) }}">
                                            @if ($poste->user->image)
                                                <img src="{{ asset('images/' . $poste->user->image) }}"
                                                    alt="" class="w-9 h-9 rounded-full">
                                            @else
                                                <img src="{{ asset('images/user.jpg') }}" alt=""
                                                    class="w-9 h-9 rounded-full">
                                            @endif

                                        </a>
                                        <div class="flex-1">
                                            <a href="{{ route('profile', $user->id) }}">
                                                <h4 class="text-black dark:text-white"> {{ $poste->user->name }} </h4>
                                            </a>
                                        </div>

                                        <div class="-mr-1">
                                            <button type="button" class="button__ico w-8 h-8" aria-haspopup="true"
                                                aria-expanded="false"> <ion-icon class="text-xl md hydrated"
                                                    name="ellipsis-horizontal" role="img"
                                                    aria-label="ellipsis horizontal"></ion-icon> </button>
                                            <div class="w-[245px] uk-dropdown"
                                                uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                                <nav>
                                                    <div uk-toggle="target: #update-post-{{ $poste->id }}">
                                                        <a href="#"> <ion-icon
                                                                class="text-xl shrink-0 md hydrated"
                                                                name="bookmark-outline" role="img"
                                                                aria-label="bookmark outline"></ion-icon> Update </a>
                                                    </div>
                                                    <hr>
                                                    <div uk-toggle="target: #delete-poste-{{ $poste->id }}"
                                                        class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                                                        <a href="#">
                                                            <ion-icon class="text-xl shrink-0 md hydrated"
                                                                name="stop-circle-outline" role="img"
                                                                aria-label="stop circle outline"></ion-icon> Delete
                                                        </a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sm:px-4 p-2.5 pt-0">
                                        @if ($poste->image)
                                            <div class="relative w-full lg:h-96 h-full sm:px-4">
                                                <img src="{{ asset('images/' . $poste->image) }}" alt=""
                                                    class="sm:rounded-lg w-full h-full object-cover">
                                            </div>
                                        @endif
                                        <br>
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
                                            <button type="button"
                                                class="button-icon bg-slate-200/70 dark:bg-slate-700">
                                                <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon>
                                            </button>
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
                                {{-- update poste --}}
    
                                <div class="hidden lg:p-20 uk- open" id="update-post-{{ $poste->id }}" uk-modal="">
                                
                                    <form action="{{ route('editPost') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div
                                            class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">
                                
                                            <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                                                <h2 class="text-sm font-medium text-black"> Update Post </h2>
                                
                                                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                
                                            </div>
                                
                                            <div class="space-y-5 mt-3 p-2">
                                                {{-- <label for="titre">Titre</label> --}}
                                                <input name="titre" id=""
                                                    class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                                                    rows="6" placeholder="  Title" value="{{ $poste->titre }}">
                                            </div>
                                            <div class="space-y-5 mt-3 p-2">
                                                <textarea
                                                    class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                                                    name="contenu" id="" rows="6" placeholder="What do you have in mind?">{{ $poste->contenu }}</textarea>
                                            </div>
                                
                                            @if ($poste->image)
                                                <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                    Image actuelle :
                                                    <img src="{{ asset('images/' . $poste->image) }}" name="imgActuelle"
                                                        class="flex items-center gap-1.5 bg-sky-50 text-sky-600 py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900 w-24">
                                                </div>
                                            @endif
                                            <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                Changer l'image :
                                                <input name="image" type="file"
                                                    class="flex items-center gap-1.5 bg-sky-50 text-sky-600 rounded-full py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900">
                                            </div>
                                
                                            <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                Categorie :
                                                <select aria-placeholder="Category"
                                                    class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900 w-36"
                                                    name="category_id" id="">
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}" @if ($categorie->id == $poste->category_id) selected @endif>
                                                            {{ $categorie->Nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                @foreach ($tags as $tag)
                                                    @if ($poste->tags->contains($tag))
                                                        <button class="button bg-primary-soft text-primary dark:text-white"
                                                            data-tag="{{ $tag->id }}">
                                                            #{{ $tag->Name }}
                                                        </button>
                                                    @else
                                                        <button type="button" class="button-tag" data-tag="{{ $tag->id }}">
                                                            #{{ $tag->Name }}
                                                        </button>
                                                    @endif
                                                @endforeach
                                            </div>
                                
                                
                                
                                            <div class="p-5 flex justify-between items-center">
                                                <div class="flex items-center gap-2">
                                                    <button type="submit" class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                                                        Update</button>
                                                </div>
                                            </div>
                                
                                        </div>
                                    </form>
                                
                                </div>
                                
                                    {{-- delete poste --}}
                                
                                <div class="hidden lg:p-20 uk- open" id="delete-poste-{{ $poste->id }}" uk-modal="">
                                    <div
                                    class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">
                                
                                        <a href="{{ route('deletePoste', $poste->id) }}"
                                            class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                                            <ion-icon class="text-xl shrink-0 md hydrated" name="stop-circle-outline" role="img"
                                                aria-label="stop circle outline"></ion-icon> Delete </a>
                                
                                    </div>
                                </div>
                            @endforeach

                        @endif

                    </div>

                    <!-- sidebar -->

                    <div class="lg:w-[400px]">

                        <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
                            uk-sticky="media: 1024; end: #js-oversized; offset: 80">

                            <div class="box p-5 px-6">
                                @if ($user->id == auth()->user()->id)
                                    <div class="flex items-ce justify-between text-black dark:text-white"
                                        uk-toggle="target: #edit-description">
                                        <h3 class="font-bold text-lg"> Description </h3>
                                        <a href="#" class="text-sm text-blue-500">Edit</a>
                                    </div>
                                @endif

                                <ul class="text-gray-700 space-y-4 mt-4 text-sm dark:text-white/80">

                                    <li class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 4v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm6 0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V4zm5 7h3m-3 4h3m-3 4h3">
                                            </path>
                                        </svg>

                                        {{-- <div> Live In <span class="font-semibold text-black dark:text-white"> Cairo ,
                                                Eygept </span> </div> --}}

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
    <!-- Javascript  -->
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>


    <!-- Ion icon -->
    <script type="module" src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.js"></script>


</body>

<!-- Mirrored from demo.foxthemes.net/socialite-v3.0/timeline.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Mar 2024 09:50:08 GMT -->

</html>
