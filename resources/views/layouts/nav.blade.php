<nav class="bg-gray-800 text-white p-4" x-data="{ open: false }">
    <div class="flex justify-between">
        <div class="flex space-x-4">
            <!-- ロゴの追加 -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-sellerbase-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>
            <!-- PC画面用メニュー -->
            <div class="hidden sm:flex">
                <a href="#" class="hover:bg-gray-700 p-2">Home</a>
                <a href="#" class="hover:bg-gray-700 p-2">梱包情報</a>
                <a href="#" class="hover:bg-gray-700 p-2">ダンボール情報</a>
                <a href="#" class="hover:bg-gray-700 p-2">商品情報</a>
                <a href="#" class="hover:bg-gray-700 p-2">スタッフ</a>
            </div>
        </div>
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        <!-- ハンバーガーメニュー -->
        <div class="sm:hidden flex items-center">
            <button @click="open = !open" class="text-gray-500 hover:text-gray-300 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path :class="{'hidden': open, 'block': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'block': open, 'hidden': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <!-- モバイル用メニュー -->
    <div :class="{'block': open, 'hidden': !open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="#" class="block p-2 hover:bg-gray-700">Home</a>
            <a href="#" class="block p-2 hover:bg-gray-700">梱包情報</a>
            <a href="#" class="block p-2 hover:bg-gray-700">ダンボール情報</a>
            <a href="#" class="block p-2 hover:bg-gray-700">商品情報</a>
            <a href="#" class="block p-2 hover:bg-gray-700">スタッフ</a>
        </div>
        <div class="border-t border-gray-700">
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
    </div>
</nav>

