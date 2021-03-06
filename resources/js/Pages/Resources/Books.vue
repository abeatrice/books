<template>
    <app-layout>
        <div class="mb-5 px-8 align-middle inline-block min-w-full">
            <div class="flex justify-between mb-8">
                <h3 class="text-3xl leading-8 font-semibold text-gray-900 self-center">
                    Books
                </h3>
                <jet-button class="self-center" @click.native="creating = true">
                    Create
                </jet-button>
            </div>
            <ab-table class="table-fixed">
                <template #thead>
                    <ab-th class="w-1/6"><ab-sort-button :direction="sort_on == 'sort_order' ? sort_direction : 'unsorted'" @click.native="toggleSort('sort_order')">Read Order</ab-sort-button></ab-th>
                    <ab-th class="w-1/3"><ab-sort-button :direction="sort_on == 'title' ? sort_direction : 'unsorted'" @click.native="toggleSort('title')">Title</ab-sort-button></ab-th>
                    <ab-th class="w-1/4"><ab-sort-button :direction="sort_on == 'author' ? sort_direction : 'unsorted'" @click.native="toggleSort('author')">Author</ab-sort-button></ab-th>
                    <ab-th><ab-sort-button :direction="sort_on == 'published_on' ? sort_direction : 'unsorted'" @click.native="toggleSort('published_on')">Published</ab-sort-button></ab-th>
                    <ab-th />
                </template>
                <template #tbody>
                    <tr class="bg-white hover:bg-gray-100 cursor-pointer" v-for="(book, i) in books.data" :key="i">
                        <ab-td @click.native="showUpdate(book)">
                            <ab-edit-button>{{book.sort_order}}</ab-edit-button>
                        </ab-td>
                        <ab-td @click.native="showUpdate(book)">
                            <ab-edit-button>{{book.title}}</ab-edit-button>
                        </ab-td>
                        <ab-td @click.native="showUpdate(book)">
                            <ab-edit-button>{{book.author}}</ab-edit-button>
                        </ab-td>                        
                        <ab-td @click.native="showUpdate(book)">
                            <ab-edit-button>{{book.published_on}}</ab-edit-button>
                        </ab-td>
                        <ab-td class="text-right">
                            <ab-direction-button direction='up' @click.native="changeSortOrder(book, 'up')" />
                            <ab-direction-button direction='down' @click.native="changeSortOrder(book, 'down')" />
                            <ab-delete-button @click.native="confirmDeletion(book)" />
                        </ab-td>
                    </tr>
                </template>
            </ab-table>
            <pagination :links="books.links" />
        </div>

        <!-- Create Modal -->
        <jet-dialog-modal :show="creating" maxWidth="sm" @close="creating = false">
            <template #title>Create Book</template>

            <template #content>
                <div class="max-h-192 px-4 overflow-auto">
                    <div class="mb-4">
                        <jet-label for="title" value="Title" />
                        <jet-input id="title" type="text" class="mt-1 block w-full" v-model="createForm.title" />
                        <jet-input-error :message="createForm.error('title')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <jet-label for="author" value="Author" />
                        <jet-input id="author" type="text" class="mt-1 block w-full" v-model="createForm.author" />
                        <jet-input-error :message="createForm.error('author')" class="mt-2" />
                    </div>
                    <div class="flex justify-center mb-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <jet-label class="flex-1 self-center" for="published_on" value="Published" />
                                <ab-delete-button class="self-center" title="Clear Published On" @click.native="createForm.published_on = null" />
                            </div>
                            <datepicker wrapper-class="flex justify-center" :inline="true" v-model="createForm.published_on" />
                            <jet-input-error :message="createForm.error('published_on')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="creating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="createBook" :class="{ 'opacity-25': createForm.processing }" :disabled="createForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Update Modal -->
        <jet-dialog-modal :show="updating" maxWidth="sm" @close="updating = false">
            <template #title>Update Book</template>

            <template #content>
                <div class="max-h-192 px-4 overflow-auto">
                    <div class="mb-4">
                        <jet-label for="title" value="Title" />
                        <jet-input id="title" type="text" class="mt-1 block w-full" v-model="updateForm.title" />
                        <jet-input-error :message="updateForm.error('title')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <jet-label for="author" value="Author" />
                        <jet-input id="author" type="text" class="mt-1 block w-full" v-model="updateForm.author" />
                        <jet-input-error :message="updateForm.error('author')" class="mt-2" />
                    </div>
                    <div class="flex justify-center mb-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <jet-label class="flex-1 self-center" for="published_on" value="Published" />
                                <ab-delete-button class="self-center" title="Clear Published" @click.native="updateForm.published_on = null" />
                            </div>
                            <datepicker wrapper-class="flex justify-center" :inline="true" v-model="updateForm.published_on" />
                            <jet-input-error :message="updateForm.error('published_on')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="updating = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="updateBook" :class="{ 'opacity-25': updateForm.processing }" :disabled="updateForm.processing">
                    Update
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Delete Confirmation Modal -->
        <jet-confirmation-modal :show="deleting" @close="deleting = null">
            <template #title>Delete Book</template>

            <template #content>
                Are you sure you would like to delete this?
            </template>

            <template #footer>
                <jet-secondary-button @click.native="deleting = null">
                    Nevermind
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click.native="deleteBook" :class="{ 'opacity-25': deleteBookForm.processing }" :disabled="deleteBookForm.processing">
                    Delete
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </app-layout>
</template>

<script>
    import { Inertia } from '@inertiajs/inertia'
    import AppLayout from './../../Layouts/AppLayout'
    import Datepicker from 'vuejs-datepicker'
    import AbTable from './../../Ab/Table'
    import AbTh from './../../Ab/Th'
    import AbTd from './../../Ab/Td'
    import AbDeleteButton from './../../Ab/DeleteButton'
    import AbDirectionButton from './../../Ab/DirectionButton'
    import AbSortButton from './../../Ab/SortButton'
    import AbEditButton from './../../Ab/EditButton'
    import JetLabel from './../../Jetstream/Label'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetDialogModal from './../../Jetstream/DialogModal'
    import JetConfirmationModal from './../../Jetstream/ConfirmationModal'
    import JetButton from './../../Jetstream/Button'
    import JetSecondaryButton from './../../Jetstream/SecondaryButton'
    import JetDangerButton from './../../Jetstream/DangerButton'
    import Pagination from './../../Ab/Pagination'

    export default {
        components: {
            AppLayout,
            Datepicker,
            AbTable,
            AbTh,
            AbTd,
            AbDeleteButton,
            AbDirectionButton,
            AbSortButton,
            AbEditButton,
            JetLabel,
            JetInput,
            JetInputError,
            JetDialogModal,
            JetConfirmationModal,
            JetButton,
            JetSecondaryButton,
            JetDangerButton,
            Pagination,
        },

        props: ['books', 'sort_on', 'sort_direction'],

        data() {
            return {
                creating: false,
                updating: false,
                deleting: null,

                createForm: this.$inertia.form({
                    title: '',
                    author: '',
                    published_on: null,
                }, {
                    bag: 'createBag',
                    resetOnSuccess: true,
                }),

                updateForm: this.$inertia.form({
                    id: null,
                    title: '',
                    author: '',
                    published_on: null,
                }, {
                    bag: 'updateBag',
                    resetOnSuccess: false,
                }),

                deleteBookForm: this.$inertia.form(),
                BookSortOrderForm: this.$inertia.form(),
            }
        },

        methods: {
            createBook() {
                this.createForm.published_on = this.createForm.published_on ? new Date(this.createForm.published_on).toDateString() : null
                this.createForm.post(route('books.store'))
                .then(() => this.creating = this.createForm.hasErrors())
            },

            showUpdate(book) {
                this.updateForm.id = book.id
                this.updateForm.title = book.title
                this.updateForm.author = book.author
                this.updateForm.published_on = new Date(book.published_on + 'T00:00:00').toDateString()
                this.updating = true
            },

            updateBook() {
                this.updateForm.put(route('books.update', this.updateForm.id))
                .then(() => this.updating = this.updateForm.hasErrors())
            },

            changeSortOrder(book, direction) {
                this.BookSortOrderForm.post(route('books.changeSortOrder', {book: book.id, direction: direction}))
            },

            toggleSort(field) {
                if (this.sort_on === field) {
                    if(this.sort_direction === 'DESC') {
                        this.sort_direction = 'ASC'
                    } else {
                        this.sort_direction = 'DESC'
                    }
                } else {
                    this.sort_on = field
                }

                Inertia.visit('/books', { data: {sort_on: this.sort_on, sort_direction: this.sort_direction} })
            },

            confirmDeletion(book) {
                this.deleting = book
            },

            deleteBook() {
                this.deleteBookForm.delete(route('books.destroy', this.deleting))
                .then(() => this.deleting = null)
            }
        },
    }
</script>
