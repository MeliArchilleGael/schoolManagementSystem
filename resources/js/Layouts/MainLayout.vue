<template>
    <div
        class="main-section antialiased relative font-nunito text-sm font-normal"
        :class="[store.sidebar ? 'toggle-sidebar' : '', store.menu, store.layout, store.rtlClass]"
    >
        <authLayout v-if="store.mainLayout === 'auth'">
            <slot></slot>
        </authLayout>
        <appLayout v-else>
            <slot></slot>
        </appLayout>
    </div>
</template>

<script lang="ts" setup>

import appLayout from '@/Layouts/AppLayout.vue';
import authLayout from '@/Layouts/AuthLayout.vue';

import { useAppStore } from '@/stores';

const store = useAppStore();

</script>
