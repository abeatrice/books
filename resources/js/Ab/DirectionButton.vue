<template>
    <button class="font-medium text-blue-600 hover:text-blue-900 focus:outline-none">
        <slot>
            <ab-icon v-if="direction == 'up'" name="arrow-circle-up" size="md" />
            <ab-icon v-else name="arrow-circle-down" size="md" />
        </slot>
    </button>
</template>

<script>
    import AbIcon from './Icon'

    export default {
        components: {
            AbIcon,
        },
        props: {
            direction: {
                type: String,
                required: true,
            },
        }
    }
</script>
