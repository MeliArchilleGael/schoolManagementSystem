<template>
    <div :class="{ 'dark text-white-dark': store.semidark }">
        <nav class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
            <div class="bg-white dark:bg-[#0e1726] h-full">
                <div class="flex justify-between items-center px-4 py-3">
                    <InertiaLink href="/" class="main-logo flex items-center shrink-0">
                        <img class="w-8 ml-[5px] ltr:ml-1.5 rtl:mr-1.5 flex-none" src="/assets/images/perso/logo_wise.png" alt="" />

                    </InertiaLink>
                    <a
                        href="javascript:;"
                        class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light transition duration-300 rtl:rotate-180 hover:text-primary"
                        @click="store.toggleSidebar()"
                    >
                        <icon-carets-down class="m-auto rotate-90" />
                    </a>
                </div>
                <div class="h-[calc(100vh-80px)] relative">
                    <ul class="relative font-semibold space-y-0.5 p-4 py-0">
                        <li class="nav-item">
                            <InertiaLink href="/" class="group" @click="toggleMobileMenu">
                                <div class="flex items-center">
                                    <icon-menu-dashboard class="group-hover:!text-primary shrink-0" />
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">
                                         {{ $t('dashboard') }}
                                    </span>
                                </div>
                            </InertiaLink>
                        </li>

                        <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">
                            <icon-minus class="w-4 h-5 flex-none hidden" />
                            <span>{{ $t('scolarite') }}</span>
                        </h2>

                        <li class="nav-item">
                            <ul>
                                <li class="nav-item">
                                    <InertiaLink href="/chat" class="group" @click="toggleMobileMenu">
                                        <div class="flex items-center">
                                            <icon-menu-chat class="group-hover:!text-primary shrink-0" />

                                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">{{
                                                $t('chat')
                                            }}</span>
                                        </div>
                                    </InertiaLink>
                                </li>
                                <li class="nav-item">
                                    <InertiaLink href="/mailbox" class="group" @click="toggleMobileMenu">
                                        <div class="flex items-center">
                                            <icon-menu-mailbox class="group-hover:!text-primary shrink-0" />

                                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">{{
                                                $t('mailbox')
                                            }}</span>
                                        </div>
                                    </InertiaLink>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script lang="ts" setup>
    import { ref, onMounted } from 'vue';

    import { useAppStore } from '@/stores';
    import VueCollapsible from 'vue-height-collapsible/vue3';

    import IconCaretsDown from '@/Components/theme/icon/icon-carets-down.vue';
    import IconMenuDashboard from '@/Components/theme/icon/menu/icon-menu-dashboard.vue';
    import IconMinus from '@/Components/theme/icon/icon-minus.vue';
    import IconMenuChat from '@/Components/theme/icon/menu/icon-menu-chat.vue';
    import IconMenuMailbox from '@/Components/theme/icon/menu/icon-menu-mailbox.vue';

    const store = useAppStore();
    const activeDropdown: any = ref('');
    const subActive: any = ref('');

    onMounted(() => {
        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
        if (selector) {
            selector.classList.add('active');
            const ul: any = selector.closest('ul.sub-menu');
            if (ul) {
                let ele: any = ul.closest('li.menu').querySelectorAll('.nav-link') || [];
                if (ele.length) {
                    ele = ele[0];
                    setTimeout(() => {
                        ele.click();
                    });
                }
            }
        }
    });

    const toggleMobileMenu = () => {
        if (window.innerWidth < 1024) {
            store.toggleSidebar();
        }
    };
</script>
