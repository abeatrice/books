<template>
    <div class="py-8 md:py-12 lg:py-24 bg-gray-900 text-teal-500">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="max-w-3xl text-2xl leading-8 font-semibold font-display sm:text-3xl sm:leading-9 lg:max-w-4xl lg:text-4xl lg:leading-10 lg:mx-auto lg:text-center">
                Contact Information
            </h3>
            <p class="text-base leading-6 font-semibold uppercase tracking-wide lg:text-center">
                Lets talk about your next project
            </p>

            <!-- email form -->
            <div class="my-5 mx-auto max-w-2xl">
                <div class="my-5 md:my-5 grid grid-flow-row grid-cols-1 grid-rows-3 md:grid-cols-2 md:grid-rows-2 md:gap-x-6">
                    <div>
                        <label for="email-name" class="self-center">Name: </label>
                        <input 
                            id="email-name" 
                            type="text" 
                            class="mt-1 flex-1 self-center block appearance-none placeholder-gray-500 placeholder-opacity-50 border border-gray-700 rounded-md w-full py-3 px-4 bg-gray-800 text-gray-300 leading-5 focus:outline-none focus:ring-2 focus:border-gray-500 focus:ring-gray-400" 
                            v-model="emailForm.name" 
                            placeholder="John Doe">
                        <jet-input-error :message="emailForm.error('name')" class="mt-1" />
                    </div>
                    <div>
                        <label for="email-email" class="self-center">Email: </label>
                        <input 
                            id="email-email" 
                            type="email" 
                            class="mt-1 flex-1 self-center block appearance-none placeholder-gray-500 placeholder-opacity-50 border border-gray-700 rounded-md w-full py-3 px-4 bg-gray-800 text-gray-300 leading-5 focus:outline-none focus:ring-2 focus:border-gray-500 focus:ring-gray-400" 
                            v-model="emailForm.email" 
                            placeholder="john@company.com">
                        <jet-input-error :message="emailForm.error('email')" class="mt-1" />
                    </div>
                    <div class="md:col-span-2">
                        <label for="email-message" class="self-center">Message: </label>
                        <textarea
                            id="email-message" 
                            class="mt-1 flex-1 self-center resize-none block appearance-none placeholder-gray-500 placeholder-opacity-50 border border-gray-700 rounded-md w-full py-3 px-4 bg-gray-800 text-gray-300 leading-5 focus:outline-none focus:ring-2 focus:border-gray-500 focus:ring-gray-400"
                            v-model="emailForm.message"
                            placeholder="Hey Andrew, I could use another developer on my team. Let's chat!">
                        </textarea>
                        <jet-input-error :message="emailForm.error('message')" class="mt-1" />
                    </div>
                </div>
                <div class="mt-2 flex justify-between">
                    <jet-button class="self-center" @click.native="sendEmail" :class="{ 'opacity-25': emailForm.processing }" :disabled="emailForm.processing">
                        Send
                    </jet-button>
                    <transition leave-active-class="transition ease-in duration-500" leave-class="opacity-100" leave-to-class="opacity-0">
                        <p class="ml-5 self-center" v-show="emailForm.recentlySuccessful">Thank you for the message, I will be in touch shortly.</p>
                    </transition>
                </div>
            </div>

            <!-- social media links -->
            <div class="m-6 md:m-10 lg:m-16">
                <div class="flex justify-center">
                    <div class="grid grid-flow-row grid-cols-2 grid-rows-2 lg:grid-cols-4 lg:grid-rows-1 gap-x-16 gap-y-4 md:gap-x-24 md:gap-y-12">
                        <!-- linked in -->
                        <a class="mt-4 md:mt-0 md:ml-8 flex flex-row" href="https://www.linkedin.com/in/abeatrice/" target="_blank">
                            <div class="flex-shrink-0">
                                <svg class="h-12 w-12 self-center fill-current" viewBox="0 0 430 430">
                                    <path d="M398.355 0H31.782C14.229 0 .002 13.793.002 30.817v368.471c0 17.025 14.232 30.83 31.78 30.83h366.573c17.549 0 31.76-13.814 31.76-30.83V30.817C430.115 13.798 415.904 0 398.355 0zM130.4 360.038H65.413V165.845H130.4v194.193zM97.913 139.315h-.437c-21.793 0-35.92-14.904-35.92-33.563 0-19.035 14.542-33.535 36.767-33.535 22.227 0 35.899 14.496 36.331 33.535 0 18.663-14.099 33.563-36.741 33.563zm266.746 220.723h-64.966v-103.9c0-26.107-9.413-43.921-32.907-43.921-17.973 0-28.642 12.018-33.327 23.621-1.736 4.144-2.166 9.94-2.166 15.728v108.468h-64.954s.85-175.979 0-194.192h64.964v27.531c8.624-13.229 24.035-32.1 58.534-32.1 42.76 0 74.822 27.739 74.822 87.414v111.351zM230.883 193.99c.111-.182.266-.401.42-.614v.614h-.42z"/>
                                </svg>
                            </div>
                            <span class="ml-4 self-center">
                                Linked In
                            </span>
                        </a>
                        <!-- GitHub -->
                        <a class="mt-4 md:mt-0 md:ml-8 flex flex-row" href="https://github.com/abeatrice" target="_blank">
                            <div class="flex-shrink-0">
                                <svg class="h-12 w-12 self-center fill-current" viewBox="0 0 438 438">
                                    <path d="M409.132 114.573c-19.608-33.596-46.205-60.194-79.798-79.8-33.598-19.607-70.277-29.408-110.063-29.408-39.781 0-76.472 9.804-110.063 29.408-33.596 19.605-60.192 46.204-79.8 79.8C9.803 148.168 0 184.854 0 224.63c0 47.78 13.94 90.745 41.827 128.906 27.884 38.164 63.906 64.572 108.063 79.227 5.14.954 8.945.283 11.419-1.996 2.475-2.282 3.711-5.14 3.711-8.562 0-.571-.049-5.708-.144-15.417a2549.81 2549.81 0 01-.144-25.406l-6.567 1.136c-4.187.767-9.469 1.092-15.846 1-6.374-.089-12.991-.757-19.842-1.999-6.854-1.231-13.229-4.086-19.13-8.559-5.898-4.473-10.085-10.328-12.56-17.556l-2.855-6.57c-1.903-4.374-4.899-9.233-8.992-14.559-4.093-5.331-8.232-8.945-12.419-10.848l-1.999-1.431c-1.332-.951-2.568-2.098-3.711-3.429-1.142-1.331-1.997-2.663-2.568-3.997-.572-1.335-.098-2.43 1.427-3.289 1.525-.859 4.281-1.276 8.28-1.276l5.708.853c3.807.763 8.516 3.042 14.133 6.851 5.614 3.806 10.229 8.754 13.846 14.842 4.38 7.806 9.657 13.754 15.846 17.847 6.184 4.093 12.419 6.136 18.699 6.136 6.28 0 11.704-.476 16.274-1.423 4.565-.952 8.848-2.383 12.847-4.285 1.713-12.758 6.377-22.559 13.988-29.41-10.848-1.14-20.601-2.857-29.264-5.14-8.658-2.286-17.605-5.996-26.835-11.14-9.235-5.137-16.896-11.516-22.985-19.126-6.09-7.614-11.088-17.61-14.987-29.979-3.901-12.374-5.852-26.648-5.852-42.826 0-23.035 7.52-42.637 22.557-58.817-7.044-17.318-6.379-36.732 1.997-58.24 5.52-1.715 13.706-.428 24.554 3.853 10.85 4.283 18.794 7.952 23.84 10.994 5.046 3.041 9.089 5.618 12.135 7.708 17.705-4.947 35.976-7.421 54.818-7.421s37.117 2.474 54.823 7.421l10.849-6.849c7.419-4.57 16.18-8.758 26.262-12.565 10.088-3.805 17.802-4.853 23.134-3.138 8.562 21.509 9.325 40.922 2.279 58.24 15.036 16.18 22.559 35.787 22.559 58.817 0 16.178-1.958 30.497-5.853 42.966-3.9 12.471-8.941 22.457-15.125 29.979-6.191 7.521-13.901 13.85-23.131 18.986-9.232 5.14-18.182 8.85-26.84 11.136-8.662 2.286-18.415 4.004-29.263 5.146 9.894 8.562 14.842 22.077 14.842 40.539v60.237c0 3.422 1.19 6.279 3.572 8.562 2.379 2.279 6.136 2.95 11.276 1.995 44.163-14.653 80.185-41.062 108.068-79.226 27.88-38.161 41.825-81.126 41.825-128.906-.01-39.771-9.818-76.454-29.414-110.049z"/>
                                </svg>
                            </div>
                            <span class="ml-4 self-center">
                                GitHub
                            </span>
                        </a>
                        <!-- Twitter -->
                        <a class="mt-4 md:mt-0 md:ml-8 flex flex-row" href="https://twitter.com/abeatricet" target="_blank">
                            <div class="flex-shrink-0">
                                <svg class="h-12 w-12 self-center fill-current" viewBox="0 0 543 543">
                                    <path d="M527.657 106.697a231.362 231.362 0 01-8.041 2.191c-16.384 4.137-17.89-1.322-6.028-13.366a109.306 109.306 0 0014.082-17.607c9.137-14.217 1.212-20.417-14.333-13.776a224.853 224.853 0 01-16.897 6.432c-16.017 5.379-38.746-2.735-53.018-11.787-18.018-11.426-38.495-17.136-61.438-17.136-32.137 0-59.529 11.334-82.192 33.984-22.656 22.662-33.99 50.062-33.99 82.191 0 4.394.251 8.855.747 13.378.814 7.362-11.585 12.699-28.317 10.336-36.194-5.11-70.582-16.077-103.171-32.889-32.32-16.671-60.845-37.65-85.57-62.938-11.819-12.086-27.804-11.045-32.217 5.27-2.644 9.78-3.959 19.951-3.959 30.515 0 19.908 4.675 38.372 14.027 55.392 4.651 8.47 10.098 16.138 16.353 22.999 10.521 11.549 8.911 18.25-5.734 14.144-14.639-4.106-25.367-10.202-25.367-9.804v.722c0 28.048 8.807 52.693 26.432 73.911 10.857 13.072 23.47 23.17 37.834 30.282 15.147 7.503 22.203 11.688 13.733 12.784-5.11.661-10.251.991-15.422.991-3.5 0-7.172-.159-11.003-.483-6.059-.514-7.148 12.111 2.038 26.298 7.301 11.273 16.646 21.193 28.03 29.762 11.579 8.721 24.058 14.981 37.417 18.794 16.255 4.633 19.517 13.073 5.024 21.763-35.863 21.519-75.551 32.277-119.058 32.277-4.902 0-9.578-.11-14.045-.324-7.754-.373-2.552 6.456 12.417 14.296 46.775 24.499 97.43 36.738 151.972 36.738 41.237 0 79.964-6.529 116.176-19.596 36.199-13.066 67.136-30.576 92.791-52.516 25.655-21.94 47.779-47.173 66.365-75.711 18.581-28.537 32.424-58.33 41.543-89.376 9.106-31.053 13.666-62.167 13.666-93.342 0-2.809-.024-5.331-.067-7.552-.086-4.174 10.955-15.472 23.28-27.032a242.397 242.397 0 0015.937-16.444c11.179-12.688 6.228-18.502-9.997-13.771z"/>
                                </svg>
                            </div>
                            <span class="ml-4 self-center">
                                Twitter
                            </span>
                        </a>
                        <!-- Leetcode -->
                        <a class="mt-4 md:mt-0 md:ml-8 flex flex-row" href="https://leetcode.com/abeatrice/" target="_blank">
                            <div class="flex-shrink-0">
                                <svg class="h-12 w-12 self-center fill-current" viewBox="0 0 24 24">
                                    <path d="M16.102 17.93l-2.697 2.607c-.466.467-1.111.662-1.823.662s-1.357-.195-1.824-.662l-4.332-4.363c-.467-.467-.702-1.15-.702-1.863s.235-1.357.702-1.824l4.319-4.38c.467-.467 1.125-.645 1.837-.645s1.357.195 1.823.662l2.697 2.606c.514.515 1.365.497 1.9-.038.535-.536.553-1.387.039-1.901l-2.609-2.636a5.055 5.055 0 00-2.445-1.337l2.467-2.503c.516-.514.498-1.366-.037-1.901-.535-.535-1.387-.552-1.902-.038l-10.1 10.101c-.981.982-1.494 2.337-1.494 3.835 0 1.498.513 2.895 1.494 3.875l4.347 4.361c.981.979 2.337 1.452 3.834 1.452s2.853-.512 3.835-1.494l2.609-2.637c.514-.514.496-1.365-.039-1.9s-1.386-.553-1.899-.039zm4.709-4.92H10.666c-.702 0-1.27.604-1.27 1.346s.568 1.346 1.27 1.346h10.145c.701 0 1.27-.604 1.27-1.346s-.569-1.346-1.27-1.346z"/>
                                </svg>
                            </div>
                            <span class="ml-4 self-center">
                                LeetCode
                            </span>
                        </a>
                    </div>  
                </div>  
            </div>
            <div class="mt-6 md:mt-10 lg:mt-16 text-teal-500 text-xs md:text-base text-center">
                This 
                    <a class="underline" href="https://github.com/abeatrice/andrewbeatrice.com" target="_blank">site</a>
                was built with 
                    <a class="underline" href="https://vuejs.org/" target="_blank">Vue.js</a>,
                    <a class="underline" href="https://laravel.com/" target="_blank">Laravel</a>,
                and 
                    <a class="underline" href="https://tailwindcss.com/" target="_blank">Tailwind CSS</a>
            </div>
        </div>
    </div>
</template>

<script>
    import JetButton from './../Jetstream/Button'
    import JetInputError from './../Jetstream/InputError'
    import AbFlashMessage from './../Ab/FlashMessage'

    export default {
        components: {
            JetButton,
            JetInputError,
            AbFlashMessage,
        },

        data() {
            return {
                emailForm: this.$inertia.form({
                    name: '',
                    email: '',
                    message: '',
                }, {
                    bag: 'createEmailBag',
                    resetOnSuccess: true,
                }),
            }
        },

        methods: {
            sendEmail() {
                this.emailForm.post(route('contact-emails.store'), {
                    preserveScroll: true,
                    preserveState: true,
                }).then(response => {})
            },
        },
    }
</script>
