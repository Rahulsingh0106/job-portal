<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import type { JobPost } from '@/types'; // Create this interface if needed
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Admin Dashboard',
    href: '/admin/dashboard',
  },
];
interface PageProps {
  jobPosts: JobPost[];
}
const props = defineProps<PageProps>();

function acceptPost(postId: number) {
router.post(`/admin/job-post-status/${postId}`, {
    status: 'Accepted',
  });
}

function rejectPost(postId: number) {
  router.post(`/admin/job-post-status/${postId}`, {
    status: 'Rejected',
  });
}
</script>

<template>
  <Head title="Dashboard" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-6">
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Job Posts</h1>
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
              <th class="py-2">Status</th>
              <th class="py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="post in jobPosts" :key="post.id" class="border-b">
              <td class="py-2">{{ post.id }}</td>
              <td class="py-2">{{ post.title }}</td>
              <td class="py-2">{{ post.description }}</td>
              <td class="py-2">{{ new Date(post.created_at).toLocaleDateString() }}</td>
              <td class="py-2">{{ post.status }}</td>
              <td class="py-2">
                <button
                  class="text-green-500 hover:underline mr-2"
                  @click="acceptPost(post.id)"
                >
                  Accept
                </button>
                <button
                  class="text-red-500 hover:underline"
                  @click="rejectPost(post.id)"
                >
                  Reject
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>
