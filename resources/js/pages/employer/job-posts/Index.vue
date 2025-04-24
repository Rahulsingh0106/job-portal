<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import type { JobPost } from '@/types'; // Create this interface if needed
import AppLayout from '@/layouts/AppLayout.vue';
import { Button } from '@/components/ui/button';
import { router } from '@inertiajs/vue3';

interface PageProps {
    jobPosts: JobPost[];
}

const props = defineProps<PageProps>();
const goToCreatePost = () => {
  router.visit('/employer/job-posts/create');
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

<div class="p-6">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold">Job Posts</h1>
      <Button
        @click="goToCreatePost"
        class="mt-4"
      >
        + Create Post
      </Button>
    </div>

    <!-- Job Post Listing -->
    <div class="bg-white shadow rounded p-4">
      <table class="w-full text-left">
        <thead>
          <tr class="border-b">
            <th class="py-2">ID</th>
            <th class="py-2">Title</th>
            <th class="py-2">Description</th>
            <th class="py-2">Created At</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="post in jobPosts" :key="post.id" class="border-b">
            <td class="py-2">{{ post.id }}</td>
            <td class="py-2">{{ post.title }}</td>
            <td class="py-2">{{ post.description }}</td>
            <td class="py-2">{{ new Date(post.created_at).toLocaleDateString() }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    </AppLayout>
</template>
