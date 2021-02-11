<template>
    <transition leave-active-class="transition ease-in duration-500" leave-class="opacity-100" leave-to-class="opacity-0">
        <div v-show="on" class="absolute top-20 right-10 rounded border px-5 py-2" :class="typeClass">
            <slot />
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            on: {
                default: false
            },
            type: {
                default: 'success'
            },
        },
        computed: {
            typeClass() {
                return {
                    'success': 'bg-green-300 border-green-500 text-gray-800',
                    'danger': 'bg-red-300 border-red-500 text-gray-800',
                    'warning': 'bg-yellow-300 border-yellow-500 text-gray-800',
                    'info': 'bg-indigo-300 border-indigo-500 text-gray-800',
                }[this.type]
            }
        },
    }
</script>
