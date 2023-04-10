<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>

    <!-- Main navigation container -->
<nav
  class="flex-no-wrap relative flex w-full items-center justify-between bg-neutral-100 py-4 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start"
  data-te-navbar-ref>
  <div class="flex w-full flex-wrap items-center justify-between px-6">
    <!-- Hamburger button for mobile view -->
    <button
      class="block border-0 bg-transparent px-2.5 py-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
      type="button"
      data-te-collapse-init
      data-te-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1"
      aria-expanded="false"
      aria-label="Toggle navigation">
    </button>

    <!-- Collapsible navigation container -->
    <div
      class="flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"

      data-te-collapse-item>
      <!-- Left navigation links -->
      <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row">
        <li class="lg:pr-2">
            <Link :href="route('users')" class="ml-4 text-sm text-gray-700"> Users </Link>
        </li>
      </ul>
      <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row">
        <li class="lg:pr-2">
            <Link :href="route('weather')" class="ml-4 text-sm text-gray-700"> Weather </Link>
        </li>
      </ul>
    </div>

    <!-- Right elements -->
    <div class="relative flex items-center">
     
    </div>
  </div>
</nav>

    <div> <slot /> </div>
</template>