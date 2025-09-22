<template>
    <Toast />
    <div class="flex flex-col w-full items-center" style="min-width: 320px">
        <!-- Кнопка "Регистрация" и "Домашняя страница" справа -->
<!--        <div class="m-mobile_hide flex justify-end w-full">-->
<!--            <RouterLink to="/home" class="self-end mr-5">-->
<!--                <Button class="hover:underline" variant="text" label="Гостевая страница" />-->
<!--            </RouterLink>-->
<!--            <RouterLink to="/register" class="self-end mr-5">-->
<!--                <Button class="hover:underline" variant="text" label="Регистрация" />-->
<!--            </RouterLink>-->
<!--        </div>-->

        <!-- Остальной контент -->
        <div class="flex-col w-full items-center justify-items-center">
<!--            <img src="../../img/novomet-logo.png" class="m-mobile_logo mt-20 max-w-lg" alt="Логотип">-->
<!--            <div class="m-mobile_font block text-600 font-medium text-base mb-10">Программа анализа надежности "Novomet DIFA"</div>-->
<!--            <img src="../../img/test-logo.svg" class="m-mobile_logo mt-20 max-w-lg mb-9" alt="Логотип">-->
<!--            <div class="m-mobile_font block font-medium font-bold text-base mb-10">Приложение для тестирования</div>-->

            <img :src="appConfig.logo" class="m-mobile_logo mt-20 max-w-lg" alt="Логотип">
            <div class="m-mobile_font block text-600 font-medium text-base mb-10">
                {{ appConfig.titleLogo }}
            </div>

            <Form v-slot="$form" :initialValues :resolver @submit="onFormSubmit" class="flex-col w-full justify-items-center text-center">
                <div class="flex flex-col bg-white w-[90%] max-w-xl p-8 border border-gray-100 items-center mb-5 rounded-xl">
                    <FloatLabel class="mb-8 w-full flex flex-col items-center">
                        <InputText class="m-mobile_font w-full" id="email" name="email" type="text" />
                        <label for="email">Email</label>
                        <Message v-if="$form.email?.invalid" severity="error" size="small" variant="simple">{{ $form.email.error?.message }}</Message>
                    </FloatLabel>

                    <FloatLabel class="w-full flex flex-col items-center">
                        <InputText class="m-mobile_font w-full" id="password" name="password" type="password" />
                        <label for="password">Пароль</label>
                        <Message v-if="$form.password?.invalid" severity="error" size="small" variant="simple">{{ $form.password.error?.message }}</Message>
                    </FloatLabel>
                </div>
                <Button class="m-mobile_font w-[15rem]" type="submit" label="Войти"/>
            </Form>
        </div>
    </div>
</template>

<script setup>
import { Form } from '@primevue/forms';
import { Message } from "primevue";
import { FloatLabel } from "primevue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { reactive, inject } from 'vue';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast'; // надо без него не работает
import { useRouter } from 'vue-router';
import axios, { AxiosError } from "axios";
import useAuth from '@/composables/useAuth.js'
const { attempt } = useAuth();

const toast = useToast();
const router = useRouter();

const initialValues = reactive({
    // email: 'ivan.zolotarev@novometgroup.com',
    // password: '12345678',
});

const appConfig = inject('appConfig')

const resolver = ({ values }) => {
    const errors = {};

    if (!values.email) {
        errors.email = [{ message: '' }];
    }

    if (!values.password) {
        errors.password = [{ message: '' }];
    }

    return {
        values, // (Optional) Used to pass current form values to submit event.
        errors
    };
};

const onFormSubmit = ({ valid }) => {
    if (valid) {
        console.log(email.value)
        console.log(password.value)

        axios.get('/sanctum/csrf-cookie')
            .then(res => {
                axios.post('/login', { email: email.value, password: password.value })
                    .then(r => {
                        router.push('/')
                    })
                    .catch(e => {
                        toast.add({
                            severity: 'error',
                            summary: 'Login failed',
                            detail: `Err: ${e}`,
                            life: 3000,
                        })
                    })
            })
            .catch(e => {
                toast.add({
                    severity: 'error',
                    summary: 'Login failed',
                    detail: `Err: ${e}`,
                    life: 3000,
                });
            })
    }
};

</script>

<style scoped>
.p-button-text {
    color: #0071CE !important;
}

@media (max-width: 600px) {
    .m-mobile_hide {
        display: none;
    }
    .m-mobile_logo {
        width: 75%;
    }
    .m-mobile_font {
        font-size: 12px;
    }
}


</style>
