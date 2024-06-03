<template>
  <div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <!-- <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
          From the blog
        </h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">
          Learn how to grow your business with our expert advice.
        </p>
        <router-link to="/post/new">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5"
          >
            Create Post
          </button></router-link
        >
      </div> -->

      <div
        class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 sm:mt-10 sm:pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3"
      >
        <article
          v-for="post in posts"
          :key="post.id"
          class="flex max-w-xl flex-col items-start justify-between"
        >
          <img
            class="w-full"
            src="https://placehold.co/600x400"
            alt="Post image"
          />
          <div class="group relative">
            <h3
              class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
            >
              <router-link :to="'/post/' + post.id">
                <span class="absolute inset-0" />
                {{ post.title }}
              </router-link>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
              {{ post.content }}
            </p>
          </div>
          <hr />

          <div class="flex space-x-2 mt-5">
            <!-- Edit Button -->
            <router-link :to="`/post/${post.id}/edit`" class="">
              <button
                class="flex items-center bg-yellow-500 hover:bg-yellow-700 text-white ffont-medium py-2 px-4 rounded"
              >
                Edit
              </button></router-link
            >

            <!-- Delete Button -->
            <button
              @click="deletePost(post.id)"
              class="flex items-center bg-red-500 hover:bg-red-700 text-white font-medium py-2 px-4 rounded"
            >
              Delete
            </button>
          </div>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data () {
    return {
      posts: []
    }
  },
  created () {
    this.fetchPosts()
  },
  methods: {
    fetchPosts () {
      axios.get('http://localhost:8000/api/posts').then(response => {
        this.posts = response.data
      })
    },
    deletePost (id) {
      if (confirm('Are You Sure?')) {
        axios
          .delete(`http://localhost:8000/api/post/${id}`)
          .then(() => {
            alert('Post Removed')
            this.fetchPosts()
          })
          .catch(err => console.log(err))
      }
    }
  }
}
</script>
