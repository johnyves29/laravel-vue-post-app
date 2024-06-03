<template>
  <div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">{{ post.title }}</h1>
    <p>{{ post.content }}</p>
    <div class="mt-5">
      <router-link
        :to="`/post/${post.id}/edit`"
        class="mt-4 text-blue-500 hover:underline"
        >Edit Post</router-link
      >
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data () {
    return {
      post: {}
    }
  },
  created () {
    this.fetchPost()
  },
  methods: {
    fetchPost () {
      axios
        .get(`http://localhost:8000/api/post/${this.$route.params.id}`)
        .then(response => {
          this.post = response.data
        })
    }
  }
}
</script>
