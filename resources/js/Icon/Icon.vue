<template>
    <svg :class="classObject" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <slot></slot>
    </svg>
</template>

<script>
    export default {
        props: {
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
