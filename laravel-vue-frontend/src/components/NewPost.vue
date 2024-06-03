<template>
  <div class="max-w-md mx-auto mt-5 px-4">
    <form @submit.prevent="createPost">
      <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2"
          >Title:</label
        >
        <input
          type="text"
          id="title"
          v-model="post.title"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        />
      </div>
      <div class="mb-4">
        <label for="content" class="block text-gray-700 text-sm font-bold mb-2"
          >Content:</label
        >
        <textarea
          id="content"
          v-model="post.content"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          rows="5"
        ></textarea>
      </div>
      <div class="flex items-center justify-between">
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        >
          Add Post
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data () {
    return {
      post: {
        id: '',
        title: '',
        content: ''
      }
    }
  },
  methods: {
    createPost () {
      // Add logic to create a post
      axios
        .post('http://localhost:8000/api/post', this.post)
        .then(() => {
          alert('New Post Added')
          this.$router.push('/posts')
        })
        .catch(err => console.log(err))
    }
  }
}
</script>
