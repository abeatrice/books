<template>
    <svg :class="classObject" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path v-if="name === 'arrow-narrow-up'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
        <path v-else-if="name === 'arrow-narrow-down'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3"/>
        <path v-else-if="name === 'switch-vertical'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
        <path v-else-if="name === 'arrow-circle-up'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z"/>
        <path v-else-if="name === 'arrow-circle-down'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"/>
        <path v-else-if="name === 'x-circle'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: true
            },
            size: {
                required: false,
                default: 'sm'
            }
        },
        data() {
            return {
                sizes: {
                    sm: 'h-4 w-4',
                    md: 'h-6 w-6',
                    lg: 'h-12 w-12',
                    xl: 'h-24 w-24',
                }
            }
        },
        computed: {
            classObject: function() {
                return this.sizes[this.size]
            },
        },
    }
</script>
