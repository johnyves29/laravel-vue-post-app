<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { BsPencilSquare } from '@kalimahapps/vue-icons'
</script>

<template>
  <header>
    <div class="wrapper bg-gray-800">
      <nav>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <RouterLink to="/">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <img
                    class="h-8 w-8"
                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Your Company"
                  />
                </div>
                <h1 class="m-3 text-white font-medium">Laravel Vue Tailwind</h1>
              </div>
            </RouterLink>
            <div class="">
              <div class="ml-4 flex items-center md:ml-6">
                <router-link to="/post/new">
                  <button class="text-white font-medium py-2 px-4 inline-flex">
                    <BsPencilSquare class="h-6 w-6 text-white mr-2" />
                    <span class="hidden md:block">Create Post</span>
                  </button></router-link
                >
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <RouterView />
</template>

<style scoped></style>
