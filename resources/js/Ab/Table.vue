<template>
    <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50 text-gray-500 uppercase tracking-wider text-xs leading-4">
                    <slot name="thead"></slot>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 leading-5 text-sm text-gray-900">
                <slot name="tbody"></slot>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
    }
</script>
