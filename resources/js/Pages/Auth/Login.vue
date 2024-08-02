<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import {useForm} from '@inertiajs/vue3';

import {useMeta} from '@/composables/use-meta';
import AuthLayout from "@/Layouts/AuthLayout.vue";

defineProps<{
    canResetPassword?: boolean;
    status?: string;
}>();


const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
        },
    });
};

import {computed, reactive} from 'vue';
import {useI18n} from 'vue-i18n';
import appSetting from '@/app-setting';
import {useAppStore} from '@/stores';

import IconCaretDown from '@/Components/theme/icon/icon-caret-down.vue';
import IconMail from '@/Components/theme/icon/icon-mail.vue';
import IconLockDots from '@/Components/theme/icon/icon-lock-dots.vue';

const store = useAppStore();
// multi language
const i18n = reactive(useI18n());
const changeLanguage = (item: any) => {
    i18n.locale = item.code;
    appSetting.toggleLanguage(item);
};
const currentFlag = computed(() => {
    return `/assets/images/flags/${i18n.locale.toUpperCase()}.svg`;
});

</script>

<template>
    <AuthLayout>
        <Head title="Login"/>
        <div>
            <div class="absolute inset-0">
                <img src="/assets/images/auth/bg-gradient.png" alt="image" class="h-full w-full object-cover"/>
            </div>

            <div
                class="relative flex min-h-screen items-center justify-center bg-[url(/assets/images/auth/map.png)] bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16"
            >
                <img src="/assets/images/auth/coming-soon-object1.png" alt="image"
                     class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2"/>
                <img src="/assets/images/auth/coming-soon-object2.png" alt="image"
                     class="absolute left-24 top-0 h-40 md:left-[30%]"/>
                <img src="/assets/images/auth/coming-soon-object3.png" alt="image"
                     class="absolute right-0 top-0 h-[300px]"/>
                <img src="/assets/images/auth/polygon-object.svg" alt="image" class="absolute bottom-0 end-[28%]"/>
                <div
                    class="relative w-full max-w-[870px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]"
                >
                    <div
                        class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6 lg:min-h-[758px] py-20">
                        <div class="absolute top-6 end-6">
                            <div class="dropdown">
                                <Popper :placement="store.rtlClass === 'rtl' ? 'bottom-start' : 'bottom-end'"
                                        offsetDistance="8">
                                    <button
                                        type="button"
                                        class="flex items-center gap-2.5 rounded-lg border border-white-dark/30 bg-white px-2 py-1.5 text-white-dark hover:border-primary hover:text-primary dark:bg-black"
                                    >
                                        <div>
                                            <img :src="currentFlag" alt="image"
                                                 class="h-5 w-5 rounded-full object-cover"/>
                                        </div>
                                        <div class="text-base font-bold uppercase">{{ store.locale }}</div>
                                        <span class="shrink-0">
                                        <icon-caret-down/>
                                    </span>
                                    </button>
                                    <template #content="{ close }">
                                        <ul class="!px-2 text-dark dark:text-white-dark grid grid-cols-2 gap-2 font-semibold dark:text-white-light/90 w-[280px]">
                                            <template v-for="item in store.languageList" :key="item.code">
                                                <li>
                                                    <button
                                                        type="button"
                                                        class="w-full hover:text-primary"
                                                        :class="{ 'bg-primary/10 text-primary': i18n.locale === item.code }"
                                                        @click="changeLanguage(item), close()"
                                                    >
                                                        <img
                                                            class="w-5 h-5 object-cover rounded-full"
                                                            :src="`/assets/images/flags/${item.code.toUpperCase()}.svg`"
                                                            alt=""
                                                        />
                                                        <span class="ltr:ml-3 rtl:mr-3">{{ item.name }}</span>
                                                    </button>
                                                </li>
                                            </template>
                                        </ul>
                                    </template>
                                </Popper>
                            </div>
                        </div>
                        <div class="mx-auto w-full max-w-[440px]">
                            <div class="mb-10">
                                <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">
                                    Se connecter</h1>
                                <p class="text-base font-bold leading-normal text-white-dark">Entrer votre Email et mot
                                    de passe </p>
                            </div>
                            <form class="space-y-5 dark:text-white" @submit.prevent="submit">
                                <div>
                                    <label for="Email">Email</label>
                                    <div class="relative text-white-dark">
                                        <input id="Email"
                                               v-model="form.email"
                                               required
                                               autofocus type="email" placeholder="Entrer votre Email"
                                               class="form-input ps-10 placeholder:text-white-dark"/>
                                        <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                        <icon-mail :fill="true"/>
                                    </span>
                                    </div>

                                    <InputError class="mt-2" :message="form.errors.email"/>
                                </div>
                                <div>
                                    <label for="Password">Password</label>
                                    <div class="relative text-white-dark">
                                        <input v-model="form.password"
                                               required
                                               autocomplete="current-password"
                                               id="Password" type="password"
                                               placeholder="Enter Password"
                                               class="form-input ps-10 placeholder:text-white-dark"/>
                                        <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                        <icon-lock-dots :fill="true"/>
                                    </span>
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.password"/>
                                </div>
                                <div>
                                    <label class="flex cursor-pointer items-center">
                                        <input type="checkbox" v-model="form.remember"
                                               class="form-checkbox bg-white dark:bg-black"/>
                                        <span class="text-white-dark">Remenber Me </span>
                                    </label>
                                </div>
                                <button type="submit"
                                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                        class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                    Sign in
                                </button>
                            </form>
                            <div class="relative my-7 text-center md:mb-9">
                                <span
                                    class="absolute inset-x-0 top-1/2 h-px w-full -translate-y-1/2 bg-white-light dark:bg-white-dark"></span>
                                <span
                                    class="relative bg-white px-2 font-bold uppercase text-white-dark dark:bg-dark dark:text-white-light">or</span>
                            </div>
                            <div class="text-center dark:text-white">
                                Vous avez oublié votre mot de passe ?
                                <InertiaLink :href="route('password.request')"
                                             class="uppercase text-primary underline transition hover:text-black dark:hover:text-white">
                                    Reset Password
                                </InertiaLink>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
