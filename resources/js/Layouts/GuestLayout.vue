<template>
    <div class="flex flex-col h-screen justify-between">
        <nav class="fixed w-full z-10 top-0 bg-white border-b-2 border-red-500">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="w-full flex justify-between">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <inertia-link :href="route('welcome')">
                                <jet-application-mark class="block h-9 w-auto" />
                            </inertia-link>
                            <span class="ml-2 text-2xl font-semibold tracking-wide">Andrew Beatrice</span>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:flex space-x-8 sm:-my-px sm:ml-10">
                            <jet-nav-link :href="route('books.index')" :active="$page.currentRouteName == 'books'">
                                Books
                            </jet-nav-link>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <jet-responsive-nav-link :href="route('books.index')" :active="$page.currentRouteName == 'books'">
                        Books
                    </jet-responsive-nav-link>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="mb-auto mt-16">
            <slot></slot>
        </main>

        <ab-footer />
    </div>
</template>

<script>
    import JetApplicationMark from './../Jetstream/ApplicationMark'
    import JetNavLink from './../Jetstream/NavLink'
    import JetResponsiveNavLink from './../Jetstream/ResponsiveNavLink'
    import AbFooter from './../Ab/Footer'

    export default {
        components: {
            JetApplicationMark,
            JetNavLink,
            JetResponsiveNavLink,
            AbFooter,
        },
        data() {
            return {
                showingNavigationDropdown: false,
            }
        }
    }
</script>
