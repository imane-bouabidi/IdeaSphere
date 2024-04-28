<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg dark:bg-dark2">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{route('home')}}" class="text-lg font-semibold text-gray-800 dark:text-white">
                        <img src="{{asset('images/logo2.png')}}" alt="" class="w-24 ">
                    </a>                    <!-- User Name -->
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
                                <div class="">
                                    @if ($user->image)
                                        <img src="{{ asset('images/' . $user->image) }}" alt=""
                                            class="h-48 w-full object-cover inset-0 rounded-full">
                                    @else
                                        <img src="{{ asset('images/user.jpg') }}" alt=""
                                            class="h-48 w-full object-cover inset-0 rounded-full">
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

                                            <div class="flex justify-center">
                                                <a href="#" class="w-5 mx-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="#12a11b"
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hidden fixed z-10 inset-0 overflow-y-auto lg:p-20 uk- open"
                                            id="edit-bio" uk-modal="">

                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>
                                            <form action="{{ route('edit-bio') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div
                                                    class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

                                                    <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                                                        <h2 class="text-sm font-medium text-black"> Edit Bio </h2>

                                                        <!-- close button -->
                                                        <button type="button"
                                                            class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>

                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ $authUser->id }}">
                                                    <div class="space-y-5 mt-3 p-2">
                                                        <input name="imageProfile" id=""
                                                            class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                                                            rows="6" placeholder="User Name can't be empty !"
                                                            type="file">
                                                    </div>
                                                    <div class="space-y-5 mt-3 p-2">
                                                        <input name="UserName" id=""
                                                            class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                                                            rows="6" placeholder="User Name can't be empty !"
                                                            value="{{ $authUser->name }}">
                                                    </div>
                                                    <div class="space-y-5 mt-3 p-2">
                                                        <textarea
                                                            class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                                                            name="bio" id="" rows="6" placeholder="No bio yet">{{ $authUser->bio }}</textarea>
                                                    </div>

                                                    <div class="p-5 flex justify-between items-center">
                                                        <div class="flex items-center gap-2">
                                                            <button type="submit"
                                                                class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                                                                Save</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>

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

                    <div class="lg:col-span-12 lg:w-2/3 col-span-12">

                        <!-- add story -->
                        @if ($user->id == auth()->user()->id)

                            @if ($authUser->blocked == 0)
                                <div class="bg-gray-200 rounded-xl shadow-sm p-4 space-y-4 text-sm font-medium border1 "
                                    uk-toggle="target: #create-poste" uk-modal="">

                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex-1 bg-gray-100  transition-all rounded-lg cursor-pointer dark:bg-dark3">
                                            <div class="py-2.5 text-center dark:text-white"> What do you have in mind?
                                            </div>
                                        </div>
                                        <div
                                            class="cursor-pointer  p-1 px-1.5 rounded-lg transition-all bg-pink-100/60 ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-8 h-8 stroke-pink-600 fill-pink-200/70" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="#2c3e50" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 8h.01" />
                                                <path
                                                    d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                                <path d="M3.5 15.5l4.5 -4.5c.928 -.893 2.072 -.893 3 0l5 5" />
                                                <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l2.5 2.5" />
                                            </svg>
                                        </div>
                                    </div>

                                </div>
                                <!-- create status -->
                                <div class="hidden fixed z-10 inset-0 overflow-y-auto lg:p-20 uk- open"
                                    id="create-poste" uk-modal="">

                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <form action="{{ route('create') }}" method="POST"
                                        enctype="multipart/form-data" id="create-poste">
                                        @csrf
                                        <div
                                            class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

                                            <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                                                <h2 class="text-sm font-medium text-black"> Create Status </h2>

                                                <!-- close button -->
                                                <button type="button"
                                                    class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
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

                                            <div
                                                class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap"> Image :
                                                <input name="image" type="file"
                                                    class="flex items-center gap-1.5 bg-sky-50 text-sky-600 rounded-full py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900">
                                            </div>

                                            <div
                                                class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">Categorie :
                                                <select aria-placeholder="Category"
                                                    class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900"
                                                    name="category_id" id="">
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->Nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div
                                                class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap"> Hashtags :
                                                @foreach ($tags as $tag)
                                                <label>
                                                    <input type="checkbox" name="tags[]"
                                                        value="{{ $tag->id }}">
                                                    #{{ $tag->Name }}
                                                </label>
                                                @endforeach
                                            </div>

                                            <div class="p-5 flex justify-between items-center">
                                                <div class="flex items-center gap-2">
                                                    <button type="submit"
                                                        class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                                                        Create</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            @else
                                <div
                                    class="bg-white rounded-xl shadow-sm md:p-4 p-2 space-y-4 text-sm font-medium border1 dark:bg-dark2">

                                    <div class="flex items-center md:gap-3 gap-1">
                                        <div
                                            class="flex-1 bg-slate-100  transition-all rounded-lg cursor-pointer dark:bg-dark3">
                                            <div class="py-2.5 text-center dark:text-white"> Sorry you can't post
                                                currently
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
                                <div
                                    class="bg-white mt-6 rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">
                                    <!-- Post Heading -->
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
                                            <a href="{{ route('profile', $poste->user->id) }}">
                                                <h4 class="text-black dark:text-white"> {{ $poste->user->name }} </h4>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            <a href="#" class="w-5 mx-2"
                                                uk-toggle="target: #editModal_{{ $poste->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="#12a11b"
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="hidden fixed z-10 inset-0 overflow-y-auto lg:p-20 uk- open"
                                            id="editModal_{{ $poste->id }}" uk-modal="">

                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>
                                            <form action="{{ route('editPost') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div
                                                    class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">
                                                    <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                                                        <h2 class="text-sm font-medium text-black"> Update Post </h2>

                                                        <button type="button"
                                                            class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <input type="hidden" name="poste_id"
                                                        value="{{ $poste->id }}">
                                                    <div class="space-y-5 mt-3 p-2">
                                                        {{-- <label for="titre">Titre</label> --}}
                                                        <input name="titre" id=""
                                                            class="w-full border-none" rows="6"
                                                            placeholder="  Title" value="{{ $poste->titre }}">
                                                    </div>
                                                    <div class="space-y-5 mt-3 p-2">
                                                        <textarea class="w-full " name="contenu" id="" rows="6" placeholder="What do you have in mind?">{{ $poste->contenu }}</textarea>
                                                    </div>

                                                    @if ($poste->image)
                                                        <div
                                                            class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                            Image actuelle :
                                                            <img src="{{ asset('images/' . $poste->image) }}"
                                                                name="imgActuelle"
                                                                class="flex py-1 px-2 border-2 border-sky-100 w-24">
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                        Changer l'image :
                                                        <input name="image" type="file"
                                                            class="flex rounded-full py-1 px-2 border-2 border-sky-100 ">
                                                    </div>

                                                    <div
                                                        class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                        Categorie :
                                                        <select aria-placeholder="Category"
                                                            class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900 w-36"
                                                            name="category_id" id="">
                                                            @foreach ($categories as $categorie)
                                                                <option value="{{ $categorie->id }}"
                                                                    @if ($categorie->id == $poste->category_id) selected @endif>
                                                                    {{ $categorie->Nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div
                                                        class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                                                        @foreach ($tags as $tag)
                                                            <label>
                                                                <input type="checkbox" name="tags[]"
                                                                    value="{{ $tag->id }}"
                                                                    @if ($poste->tags->contains($tag)) checked @endif>
                                                                #{{ $tag->Name }}
                                                            </label>
                                                        @endforeach
                                                    </div>



                                                    <div class="p-5 flex justify-between items-center">
                                                        <div class="flex items-center gap-2">
                                                            <button type="submit"
                                                                class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                                                                Update</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>

                                        </div>

                                        <a href="{{route('deletePoste',$poste->id)}}" class="w-4 mx-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <path fill="#e84921"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                            </svg></a>



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
                                                    class="button bg-yellow-100 p-2 rounded-full text-primary dark:text-white">#{{ $tag->Name }}</button>
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
                                        <form class="commentForm flex items-center gap-2"
                                            action="{{ route('addComment') }}" method="POST">
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

                    <div class="lg:w-1/3 w-full ">

                        <div
                            class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6 rounded-xl bg-gray-200">

                            <div class="box p-5 px-6 ">
                                <div class="flex items-ce justify-between text-black dark:text-white">
                                    <h3 class="font-bold text-lg"> Description </h3>
                                    @if ($user->id == auth()->user()->id)
                                        <div uk-toggle="target: #edit-description">

                                            <div class="flex">
                                                <a href="#" class="w-5 mx-2"
                                                    uk-toggle="target: #editDescription">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="#12a11b"
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hidden fixed z-10 inset-0 overflow-y-auto lg:p-20 uk- open"
                                            id="editDescription" uk-modal="">

                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>
                                            <form action="{{ route('edit-description') }}" method="post">
                                                @csrf
                                                <div
                                                    class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

                                                    <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                                                        <h2 class="text-sm font-medium text-black"> Edit Description
                                                        </h2>

                                                        <!-- close button -->
                                                        <button type="button"
                                                            class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>

                                                    </div>
                                                    <input type="hidden" name="user_id"
                                                        value="{{ $authUser->id }}">
                                                    <div class="space-y-5 mt-3 p-2">
                                                        <textarea
                                                            class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                                                            name="description" id="" rows="6" placeholder="No description yet">{{ $authUser->description }}</textarea>
                                                    </div>

                                                    <div class="p-5 flex justify-between items-center">
                                                        <div class="flex items-center gap-2">
                                                            <button type="submit"
                                                                class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                                                                Save</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>

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
