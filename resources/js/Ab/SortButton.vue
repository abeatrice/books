<template>
    <button class="focus:outline-none">
        <div class="flex font-medium text-grey-600 hover:text-grey-900">
            <div class="flex-none">
                <slot></slot>
            </div>
            <div class="flex-none ml-1">
                <ab-icon v-if="direction == 'ASC'" name="arrow-narrow-up" />
                <ab-icon v-else-if="direction == 'DESC'" name="arrow-narrow-down" />
                <ab-icon v-else name="switch-vertical" />
            </div>
        </div>
    </button>
</template>

<script>
    import AbIcon from '../Ab/Icon'

    export default {
        components: {
            AbIcon,
        },
        props: {
            direction: {
                type: String,
                required: false,
            },
        }
    }
</script>
