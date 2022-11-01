<script setup>
import HeaderVue from '@/Components/Frontend/Header.vue';
</script>
<template>
    <div class="bg-slate-200 dark:bg-slate-900">
        <!-- Header -->
        <HeaderVue />
        <main class="min-h-screen">
            <slot/>
        </main>
        <!-- Footer -->
    </div>
</template>
