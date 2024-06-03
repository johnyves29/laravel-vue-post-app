import { createRouter, createWebHistory } from "vue-router";
import Posts from "../components/Posts.vue";
import Post from "../components/Post.vue";
import NewPost from "../components/NewPost.vue";
import EditPost from "../components/EditPost.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "posts",
      component: Posts,
    },
    {
      path: "/posts",
      name: "Posts",
      component: Posts,
    },
    {
      path: "/post/new",
      name: "NewPost",
      component: NewPost,
    },
    {
      path: "/post/:id",
      name: "Post",
      component: Post,
      props: true,
    },
    {
      path: "/post/:id/edit",
      name: "EditPost",
      component: EditPost,
      props: true,
    },
  ],
});

export default router;
