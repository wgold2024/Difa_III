<template>
    <Toast />
    <div class="flex flex-col w-full items-center">
        <!-- Кнопка "Регистрация" и "Домашняя страница" справа -->
        <div class="flex justify-end w-full">
            <RouterLink to="/home" class="self-end mr-5">
                <Button class="hover:underline" variant="text" label="Гостевая страница" />
            </RouterLink>
            <RouterLink to="/login" class="self-end mr-25">
                <Button class="hover:underline" variant="text" label="Вход" />
            </RouterLink>
        </div>

        <!-- Остальной контент -->
        <div class="m-text block text-600 font-medium text-base mb-10 mt-10">Страница регистрации "Novomet DIFA"</div>
        <Form v-slot="$form" :initialValues :resolver @submit="onFormSubmit" class="flex-col w-full justify-items-center">
            <div class="flex flex-col bg-white w-[50rem] p-8 border border-gray-100 items-center mb-5 rounded-xl">
                <FloatLabel class="mb-8">
                    <InputText class="w-[25rem]" id="userName" name="userName" type="text" />
                    <label for="userName">ФИО</label>
                    <Message v-if="$form.userName?.invalid" severity="error" size="small" variant="simple">{{ $form.userName.error?.message }}</Message>
                </FloatLabel>

                <FloatLabel class="mb-8">
                    <InputText class="w-[25rem]" id="email" name="email" type="text" />
                    <label for="email">Email</label>
                    <Message v-if="$form.email?.invalid" severity="error" size="small" variant="simple">{{ $form.email.error?.message }}</Message>
                </FloatLabel>

                <FloatLabel class="mb-8">
                    <InputText class="w-[25rem]" id="password" name="password" type="password" />
                    <label for="password">Пароль</label>
                    <Message v-if="$form.password?.invalid" severity="error" size="small" variant="simple">{{ $form.password.error?.message }}</Message>
                </FloatLabel>

                <FloatLabel class="mb-8">
                    <InputText class="w-[25rem]" id="password_confirmation" name="password_confirmation" type="password" />
                    <label for="password_confirmation">Подтверждение пароля</label>
                    <Message v-if="$form.password_confirmation?.invalid" severity="error" size="small" variant="simple">{{ $form.password_confirmation.error?.message }}</Message>
                </FloatLabel>

                <FloatLabel>
                    <InputText class="w-[25rem]" id="admin_password" name="admin_password" type="password" />
                    <label for="admin_password">Пароль администратора</label>
                    <Message v-if="$form.admin_password?.invalid" severity="error" size="small" variant="simple">{{ $form.admin_password.error?.message }}</Message>
                </FloatLabel>
            </div>
            <Button class="w-[15rem]" type="submit" label="Зарегистрировать"/>
        </Form>

    </div>

</template>

<script setup>
import { Form } from '@primevue/forms';
import { Message } from "primevue";
import { FloatLabel } from "primevue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { reactive } from 'vue';
import { useToast } from 'primevue/usetoast';
import { Password } from "primevue";
import Toast from 'primevue/toast';

import axios from "axios";

const toast = useToast();

const initialValues = reactive({
    userName: 'Ivan',
    email: 'ivan.zolotarev@novometgroup.com',
    password: '12345678',
    password_confirmation: '12345678',
    admin_password: '12345678'
});

const resolver = ({ values }) => {
    const errors = {};

    if (!values.userName) {
        errors.userName = [{ message: '' }];
    }

    if (!values.email) {
        errors.email = [{ message: '' }];
    }

    if (!values.password) {
        errors.password = [{ message: '' }];
    }

    if (!values.password_confirmation) {
        errors.password_confirmation = [{ message: '' }];
    }

    if (!values.password_confirmation) {
        errors.password_confirmation = [{ message: '' }];
    }

    if (!values.admin_password) {
        errors.admin_password = [{ message: '' }];
    }

    return {
        values, // (Optional) Used to pass current form values to submit event.
        errors
    };
};

const onFormSubmit = ({ valid }) => {
    if(password.value !== password_confirmation.value) {
        toast.add({
            severity: 'warn',
            summary: 'Введенные пароли не совпадают',
            life: 3000
        });
        return
    }

    if(admin_password.value !== '12345678') {
        toast.add({
            severity: 'warn',
            summary: 'Пароль администратора введён неверно',
            life: 3000
        });
        return
    }


    if (valid) {
        console.log(email.value)
        console.log(password.value)
        console.log(userName.value)

        axios.post('/register', {
            name: userName.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmation.value
        })
            .then(res => {
                toast.add({
                    severity: 'success',
                    summary: 'Регистрация прошла успешно',
                    life: 3000
                });
            })
            .catch(err => {
                toast.add({
                    severity: 'error',
                    summary: 'Регистрация провалилась',
                    life: 3000
                });
            })
    }
};
</script>

<style scoped>
.m-text {
    color: #0071CE !important;
    font-size: 1.2rem;
}


</style>
