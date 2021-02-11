<template>
    <app-layout>
        <div class="flex justify-center">
            <div class="min-w-xs mx-4">
                <ab-table>
                    <template #thead>
                        <ab-th>Guest</ab-th>
                    </template>
                    <template #tbody>
                        <tr>
                            <ab-td>
                                <inertia-link :href="route('testimonials.index')">
                                    Testimonials
                                </inertia-link>
                            </ab-td>
                        </tr>
                        <tr>
                            <ab-td>
                                <inertia-link :href="route('contact-emails.index')">
                                    Contact Emails
                                </inertia-link>
                            </ab-td>
                        </tr>
                    </template>
                </ab-table>
            </div>
            <div class="min-w-xs mx-4">
                <ab-table>
                    <template #thead>
                        <ab-th>Resume</ab-th>
                    </template>
                    <template #tbody>
                        <tr>
                            <ab-td>
                                <inertia-link :href="route('experiences.index')">
                                    Experience
                                </inertia-link>
                            </ab-td>
                        </tr>
                        <tr>
                            <ab-td>
                                <inertia-link :href="route('education.index')">
                                    Education
                                </inertia-link>
                            </ab-td>
                        </tr>
                    </template>
                </ab-table>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    import AbTable from './../Ab/Table'
    import AbTh from './../Ab/Th'
    import AbTd from './../Ab/Td'

    export default {
        components: {
            AppLayout,
            AbTable,
            AbTh,
            AbTd,
        },
    }
</script>
