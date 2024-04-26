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