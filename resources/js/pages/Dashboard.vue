<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import type { Jobs, Resume } from '@/types'; // Create this interface if needed
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/dashboard',
  },
];
interface PageProps {
  jobs: Jobs[];
  resume: Resume;
}
const props = defineProps<PageProps>();
const showModal = ref(false);
const selectedJobId = ref<number | null>(null);
const resume = ref<File | null>(null);

function apply(jobId: number) {
  selectedJobId.value = jobId;
  showModal.value = !props.resume ? true : false;
  if(!showModal.value){
    router.post(`/apply/${jobId}`);
  }
}

function closeModal() {
  showModal.value = false;
  selectedJobId.value = null;
  resume.value = null;
}
function handleFileChange(event: Event) {
  const target = event.target as HTMLInputElement;
  if (target && target.files && target.files.length > 0) {
    resume.value = target.files[0];
  }
}
function submitResume() {
  if (!resume.value || !selectedJobId.value) return;

  const formData = new FormData();
  formData.append('resume', resume.value);
  // formData.append('job_id', selectedJobId.value);

  router.post(`/apply/${selectedJobId.value}`, formData, {
    onSuccess: () => {
      closeModal();
    },
  });
}
</script>

<template>
  <Head title="Dashboard" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-6">
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Jobs</h1>
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
              <th class="py-2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="post in jobs" :key="post.id" class="border-b">
              <td class="py-2">{{ post.id }}</td>
              <td class="py-2">{{ post.title }}</td>
              <td class="py-2">{{ post.description }}</td>
              <td class="py-2">{{ new Date(post.created_at).toLocaleDateString() }}</td>
              <td class="py-2">
                <button
                  class="text-green-500 hover:underline mr-2"
                  @click="apply(post.id)"
                >
                  Apply
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Resume Upload Modal -->
<div v-if="showModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white rounded-lg p-6 w-full max-w-md">
    <h2 class="text-xl font-semibold mb-4">Upload Resume</h2>
    <input
      type="file"
      accept=".pdf,.doc,.docx"
      @change="handleFileChange"
      class="mb-4"
    />
    <div class="flex justify-end space-x-3">
      <button @click="closeModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
        Cancel
      </button>
      <button @click="submitResume" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Submit
      </button>
    </div>
  </div>
</div>

  </AppLayout>
</template>
