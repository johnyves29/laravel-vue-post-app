<template>
  <!-- <div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">Edit Post</h1>
    <form @submit.prevent="editPost">
      <div class="mb-4">
        <label for="title" class="block text-gray-700">Title</label>
        <input
          type="text"
          id="title"
          v-model="post.title"
          class="mt-1 block w-full border-gray-300 rounded-md"
        />
      </div>
      <div class="mb-4">
        <label for="content" class="block text-gray-700">Content</label>
        <textarea
          id="content"
          v-model="post.content"
          class="mt-1 block w-full border-gray-300 rounded-md"
        ></textarea>
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
        Save
      </button>
    </form>
  </div> -->
  <div class="max-w-md mx-auto mt-5 px-4">
    <form @submit.prevent="editPost">
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
          Save
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
        title: '',
        content: ''
      }
    }
  },
  created () {
    if (this.$route.params.id) {
      this.fetchPost()
    }
  },
  methods: {
    fetchPost () {
      axios
        .get(`http://localhost:8000/api/post/${this.$route.params.id}`)
        .then(response => {
          this.post = response.data
        })
    },
    editPost () {
      axios
        .put(
          `http://localhost:8000/api/post/${this.$route.params.id}`,
          this.post
        )
        .then(() => {
          alert('Post Updated')
          this.$router.push('/posts')
        })
        .catch(err => console.log(err))
    }
  }
}
</script>
