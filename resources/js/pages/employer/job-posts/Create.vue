<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { ref } from 'vue';
import { Input } from '@/components/ui/input';
import { cn } from '@/lib/utils'
import { LoaderCircle } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import { Head, useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Employer Dashboard',
        href: '/employer/dashboard',
    },
    {
        title: 'Create Job Posts',
        href: '/employer/job-posts/create',
    },
];

const form = useForm({
    title:'',
    description: ''
});

const submit = () => {
    form.post(route('job-posts.store'));
};
</script>

<template>
    <Head title="Job Post" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <Label for="title">Job Title</Label>
                    <Input
                        id="title"
                        type="text"
                        required
                        autofocus
                        :tabindex="1"
                        v-model="form.title"
                        placeholder="PHP Developer"
                    />
                </div>
                <div>
                    <Label for="description">Job Description</Label>
                    <textarea
                        id="description"
                        v-model="form.description"
                        :class="cn(
      'file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
      'focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
      'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
    )"
                        placeholder="Enter job description"
                    ></textarea>
                </div>
                <div>
                <Button type="submit" class="mt-4" :tabindex="4" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Submit
                </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
