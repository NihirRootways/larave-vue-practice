<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import FrontendLayout from '@/Layouts/Frontend.vue';
import Hero from '@/Components/Frontend/Hero.vue';
import Promote from '@/Components/Frontend/Promote.vue';
</script>

<template>
    <Head title="Welcome to portfolio" />
    <FrontendLayout>
        <!-- hero primary -->
        <Hero />
        <!-- Promot tail 100  -->
        <Promote />
        <!-- About secondary -->
        <!-- Skills tail-100 -->
        <!-- Portfolio primary -->
        <!-- Services secondary -->
        <!-- Contact Primary -->
    </FrontendLayout>
</template>
