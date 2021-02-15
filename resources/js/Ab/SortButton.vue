<template>
    <button class="focus:outline-none">
        <div class="flex font-medium text-grey-600 hover:text-grey-900">
            <div class="flex-none">
                <slot></slot>
            </div>
            <div class="flex-none ml-1">
                <icon-arrow-narrow-up v-if="direction == 'ASC'" />
                <svg v-else-if="direction == 'DESC'" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3"/></svg>
                <svg v-else class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/></svg>
            </div>
        </div>
    </button>
</template>

<script>
    import IconArrowNarrowUp from '../Icon/IconArrowNarrowUp'

    export default {
        components: {
            IconArrowNarrowUp,
        },
        props: {
            direction: {
                type: String,
                required: false,
            },
        }
    }
</script>
