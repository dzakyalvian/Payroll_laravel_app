<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>

    <!-- Mobile Header & Hamburger -->
    <div class="lg:hidden flex items-center justify-between bg-card border-b border-border p-4 fixed top-0 w-full z-20">
        <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-2">
            <x-application-logo class="block h-8 w-auto fill-current text-primary" />
            <span class="font-bold text-lg text-foreground tracking-tight">Payroll</span>
        </a>

        <button
            @click="sidebarOpen = !sidebarOpen"
            class="text-muted-foreground hover:text-foreground focus:outline-none"
        >
            <x-ui.icon name="menu" class="h-6 w-6" />
        </button>
    </div>

    <!-- Sidebar Backdrop -->
    <div
        x-show="sidebarOpen"
        @click="sidebarOpen = false"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-background/80 backdrop-blur-sm z-30 lg:hidden"
        style="display: none;"
    ></div>

    <!-- Sidebar -->
    <aside
        :class="{
            'translate-x-0': sidebarOpen,
            '-translate-x-full': !sidebarOpen
        }"
        class="fixed inset-y-0 left-0 z-40 w-64 h-dvh bg-card border-r border-border transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 flex flex-col"
    >

        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-border">
            <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-2">
                <x-application-logo class="block h-8 w-auto fill-current text-primary" />
                <span class="font-bold text-lg text-foreground tracking-tight">
                    Payroll App
                </span>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1">

            <x-ui.nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
                icon="dashboard"
                wire:navigate
            >
                {{ __('Dashboard') }}
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('employee.edit')"
                :active="request()->routeIs('employee.edit')"
                icon="users"
                wire:navigate
            >
                {{ __('Kelola Karyawan') }}
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('payroll.calculator')"
                :active="request()->routeIs('payroll.calculator')"
                icon="calculator"
                wire:navigate
            >
                {{ __('Kalkulator Penggajian') }}
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('payroll.history')"
                :active="request()->routeIs('payroll.history')"
                icon="history"
                wire:navigate
            >
                {{ __('Riwayat Penggajian') }}
            </x-ui.nav-link>

        </nav>

        <!-- User Profile -->
        <div class="border-t border-border p-4">

            <x-dropdown align="top" width="48">

                <x-slot name="trigger">

                    <button class="flex items-center w-full gap-3 p-2 rounded-lg hover:bg-secondary transition-colors text-left focus:outline-none focus:ring-2 focus:ring-ring">

                        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>

                        <div class="flex-1 min-w-0">
                            <div
                                class="text-sm font-medium text-foreground truncate"
                                x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                                x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"
                            ></div>

                            <div class="text-xs text-muted-foreground truncate">
                                {{ auth()->user()->email }}
                            </div>
                        </div>

                        <x-ui.icon name="chevron-down" class="w-4 h-4 text-muted-foreground" />
                    </button>

                </x-slot>

                <x-slot name="content">

                    <x-dropdown-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <button wire:click="logout" class="w-full text-start">
                        <x-dropdown-link>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </button>

                </x-slot>

            </x-dropdown>

        </div>

    </aside>

</div>