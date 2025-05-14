<template>
    <Toast />
    <div class="w-full mb-3">
        <Fieldset legend="Общая информация" class="my-flex mr-3">
            <div class="mb-3">
                <div class="mb-1">Обособленное подразделение</div>
                <div>
                    <Select v-model="input.op" :options="locations.getOps()" optionLabel="name" optionValue="name" placeholder="Выберите ОП" class="w-full md:w-14rem" :class="{ 'p-invalid': Boolean(inputError.op) }"/>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-1">Город</div>
                <div>
                    <Select v-model="input.city" :options="locations.getCities()" optionLabel="name" optionValue="name" placeholder="Выберите город" class="w-full md:w-14rem" :class="{ 'p-invalid': Boolean(inputError.city) }"/>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-1">Компания</div>
                <div>
                    <Select v-model="input.company" :options="locations.getCompanies()" optionLabel="name" optionValue="name" placeholder="Выберите компанию" class="w-full md:w-14rem" :class="{ 'p-invalid': Boolean(inputError.company) }"/>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-1">Месторождение</div>
                <div>
                    <Select v-model="input.field" :options="locations.getFields()" optionLabel="name" optionValue="name" placeholder="Выберите месторождение" class="w-full md:w-14rem" :class="{ 'p-invalid': Boolean(inputError.field) }"/>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-1">Куст</div>
                <InputText v-model="input.cluster" class="w-full" placeholder="Введите куст" :class="{ 'p-invalid': Boolean(inputError.cluster) }"/>
            </div>
            <div class="mb-3">
                <div class="mb-1">Скважина</div>
                <InputText v-model="input.well" class="w-full" placeholder="Введите скважину" :class="{ 'p-invalid': Boolean(inputError.well) }"/>
            </div>
        </Fieldset>
    </div>
    <Button label="Сохранить" @click="store" />
<!--    <Button label="Сохранить" @click="store" :disabled="isBtnSaveDisabled" />-->
</template>


<script lang="ts" setup>
import Fieldset from 'primevue/fieldset';
import Select from 'primevue/select';
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { onMounted, ref, toRaw, watch } from "vue";
import { locations } from "@/data";
import { Input, InputError } from "@/types";
import axios from "axios";
import { useRoute } from 'vue-router'
import useAuth from '@/composables/useAuth.js'
import Toast from "primevue/toast";
import { useToast } from 'primevue/usetoast';


const { inputObj } = useAuth();
const route = useRoute()
const toast = useToast();

const input = ref<Input>({ op: '', city: '', company: '', field: '', cluster: '', well: '' });
const inputError = ref<InputError>({ op: '', city: '', company: '', field: '', cluster: '', well: '' });


onMounted(() => {
    const id = route.params.id;
    if (id) {
        axios.get(`/api/input/${id}`)
            .then(res => {
                input.value = res.data;
            })
            .catch(e => {
                console.log('e', e.toString());
            })
    }
})
const store = () => {
    axios.post('/api/input', toRaw(input.value))
        .then(res => {
            toast.add({
                severity: 'info',
                summary: 'Данные успешно сохранены',
                detail: `Id: ${res.data.id}`,
                life: 3000,
            })
        })
        .catch(e => {
            toast.add({
                severity: 'error',
                summary: 'Данные не сохранены',
                detail: `Err: ${e}`,
                life: 3000,
            })
            inputError.value = e.response.data.errors;
        })
}

['op', 'city', 'company', 'field', 'cluster', 'well'].forEach(key => {
    watch(
        () => input.value[key],
        (newVal) => {
            inputError.value[key] = !newVal;
        }
    );
});

</script>

<style scoped>

</style>

