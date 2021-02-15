<template>
    <button class="font-medium text-red-600 hover:text-red-900 focus:outline-none">
        <slot>
            <ab-icon name="x-circle" size="md" />
        </slot>
    </button>
</template>

<script>
    import AbIcon from './Icon'

    export default {
        components: {AbIcon},
    }
</script>
