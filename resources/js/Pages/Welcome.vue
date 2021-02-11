<template>
    <app-layout>
        <div class="bg-gray-100">
            <div class="py-12 lg:py-24">
                <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
                    <h3 class="max-w-3xl text-2xl leading-8 font-semibold font-display text-gray-900 sm:text-3xl sm:leading-9 lg:max-w-4xl lg:text-4xl lg:leading-10 lg:mx-auto lg:text-center">
                        Order Monitoring
                    </h3>
                    <div class="mt-6 md:mt-10 lg:mt-16">
                        <div class="grid grid-flow-row grid-cols-1 grid-rows-2 md:grid-cols-2 md:grid-rows-1">
                            <div class="text-sm text-gray-500 md:pr-6 lg:pr-8">
                                <p class="mt-2">This application provides the business with order monitoring across multiple systems on a dashboard.</p>
                                <p class="mt-2 md-mt-0">It has automated alerting that has left shifted the time it takes to resolve problems with order processing.</p>
                                <p class="mt-2 md-mt-0">A custom access control list determines user authority. Administrators assign users to roles that have permissions to various data. Users are able to request access to components within the application generating emails to administrators.</p>
                            </div>
                            <div class="flex flex-col justify-between mt-8 md:mt-0 md:ml-4 lg:ml-8">
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Systems:</span>
                                    <span class="text-sm">Linux Redhat, IBMi</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Languages:</span>
                                    <span class="text-sm">PHP 7.2, JavaScript ES6, RPG ILE</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Databases:</span>
                                    <span class="text-sm">MySQL, DB2, SqlSrv, Oracle</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Frameworks:</span>
                                    <span class="text-sm">Laravel, Vue.js</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Libraries:</span>
                                    <span class="text-sm">Bootstrap, Axios, Chart.js</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-12 lg:py-24 bg-gray-900 text-gray-500">
                <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
                    <h3 class="max-w-3xl text-2xl leading-8 font-semibold font-display sm:text-3xl sm:leading-9 lg:max-w-4xl lg:text-4xl lg:leading-10 lg:mx-auto lg:text-center">
                        Table Driven Queues
                    </h3>
                    <div class="mt-6 md:mt-10 lg:mt-16">
                        <div class="grid grid-flow-row grid-cols-1 grid-rows-2 md:grid-cols-2 md:grid-rows-1">
                            <div class="text-sm text-gray-500 md:pr-6 lg:pr-8">
                                <p class="mt-2">This application creates table driven queues with workers monitoring tables and jobs that send messages to Amazon Web Services Simple Queue Service.</p>
                                <p class="mt-2 md-mt-0">Amazon does not provide an sdk for IBM's proprietary language ILE RPG. The business needed a way to quickly interface their existing RPG applications with third party software in the cloud.</p>
                                <p class="mt-2 md-mt-0">It works as a service that creates a relationship between a table and an aws sqs queue. Inserting a record to a table will send a message to the associated sqs queue.</p>
                            </div>
                            <div class="flex flex-col justify-between mt-8 md:mt-0 md:ml-4 lg:ml-8">
                                <div class="flex justify-between border-b border-gray-700">
                                    <span class="font-semibold">System:</span>
                                    <span class="text-sm">Linux Redhat</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-700">
                                    <span class="font-semibold">Language:</span>
                                    <span class="text-sm">PHP 7.2</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-700">
                                    <span class="font-semibold">Database:</span>
                                    <span class="text-sm">DB2</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-700">
                                    <span class="font-semibold">Memory Cache:</span>
                                    <span class="text-sm">Redis</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-700">
                                    <span class="font-semibold">Framework:</span>
                                    <span class="text-sm">Symfony</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-12 lg:py-24">
                <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 font-semibold">
                    <h3 class="max-w-3xl text-2xl leading-8 font-display text-gray-900 sm:text-3xl sm:leading-9 lg:max-w-4xl lg:text-4xl lg:leading-10 lg:mx-auto lg:text-center">
                        Artist Portfolio
                    </h3>
                    <div class="mt-6 md:mt-10 lg:mt-16">
                        <div class="grid grid-flow-row grid-cols-1 grid-rows-2 md:grid-cols-2 md:grid-rows-1">
                            <div class="text-sm text-gray-500 md:pr-6 lg:pr-8">
                                <p class="mt-2">This application is a custom CMS for an artist's online portfolio. It was created with Test Driven Development using PHPUnit.</p>
                                <p class="mt-2 md-mt-0">The artist can create, update, edit, and delete posts. The post sort order and published status can also be updated. This is accessible from an authenticated admin dashboard.</p>
                                <p class="mt-2 md-mt-0">Email is sent to the artist using the mailgun api and the page's contact form.</p>
                            </div>
                            <div class="flex flex-col justify-between mt-8 md:mt-0 md:ml-4 lg:ml-8">
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">System:</span>
                                    <span class="text-sm">Ubuntu 20.04</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Language:</span>
                                    <span class="text-sm">PHP 7.4</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Database:</span>
                                    <span class="text-sm">MySQL</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Framework:</span>
                                    <span class="text-sm">Laravel, Vue.js</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-300">
                                    <span class="font-semibold">Libraries:</span>
                                    <span class="text-sm">PHPUnit, Bootstrap</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    }
</script>
