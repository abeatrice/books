<template>
    <icon v-bind="$props">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
    </icon>
</template>

<script>
    import Icon from './Icon'

    export default {
        props: ['size'],
        components: {Icon},
    }
</script>
