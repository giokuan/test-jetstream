<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        {{-- @livewire('navigation-menu') --}}
        {{-- @livewire('side-bars') --}}

        <!-- Page Heading -->
        {{-- @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}


        {{-- The navbar with `sticky` and `full-width` --}}
        <x-mary-nav sticky full-width class="bg-slate-200">

            <x-slot:brand>
                {{-- Drawer toggle for "main-drawer" --}}
                <label for="main-drawer" class="mr-3 lg:hidden">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>

                {{-- Brand --}}
                <div>SJMC</div>
            </x-slot:brand>

            {{-- Right side actions --}}
            <x-slot:actions>
                <x-mary-button label="Announcement" icon="o-envelope" link="###" class="btn-ghost btn-sm" />
                <x-mary-button label="Meetings" icon="o-bell" link="###" class="btn-ghost btn-sm" />


            </x-slot:actions>

        </x-mary-nav>

        {{-- The main content with `full-width` --}}
        <x-mary-main with-nav full-width>

            {{-- This is a sidebar that works also as a drawer on small screens --}}
            {{-- Notice the `main-drawer` reference here --}}
            <x-slot:sidebar drawer="main-drawer" class="bg-slate-200">

                {{-- Activates the menu item when a route matches the `link` property --}}
                <x-mary-menu activate-by-route>

                    {{-- <x-mary-menu-item title="Home" icon="o-home" link="###" />
                    <x-mary-menu-item title="Messages" icon="o-envelope" link="###" /> --}}

                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 me-3">
                                    <img class="object-cover w-10 h-10 rounded-full"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif

                            <div>
                                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-responsive-nav-link wire:navigate href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link wire:navigate href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link href="{{ route('member') }}" :active="request()->routeIs('member')">
                                {{ __('Member') }}
                            </x-responsive-nav-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-responsive-nav-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>



                            <!-- Team Management -->
                            <div class="border-gray-300 border-y-2">
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                    <div class="border-t border-gray-200"></div>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-responsive-nav-link wire:navigate
                                        href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                        :active="request()->routeIs('teams.show')">
                                        {{ __('Team Settings') }}
                                    </x-responsive-nav-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-responsive-nav-link wire:navigate href="{{ route('teams.create') }}"
                                            :active="request()->routeIs('teams.create')">
                                            {{ __('Create New Team') }}
                                        </x-responsive-nav-link>
                                    @endcan
                            </div>

                            <div class="border-b-2 border-gray-300">
                                <!-- Team Switcher -->
                                @if (Auth::user()->allTeams()->count() > 1)
                                    <div class="border-t border-gray-200"></div>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                                    @endforeach
                                @endif
                            </div>
                            @endif
                        </div>

                    </div>
                </x-mary-menu>
            </x-slot:sidebar>

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>

            {{-- Footer area --}}
            {{-- <x-slot:footer>
                <hr />
                <div class="p-6">
                    Footer
                </div>
            </x-slot:footer> --}}
        </x-mary-main>



        <!-- Page Content -->
        {{-- <main>
            {{ $slot }}
        </main> --}}
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
