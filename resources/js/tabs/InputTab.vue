<template>
    <Toast />
    <div class="flex justify-content-between gap-3 w-full mb-3">
        <Fieldset legend="Общая информация" class="m-flex">
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
        <Fieldset legend="Этапы эксплуатации" class="m-flex">
            <div class="mb-3">
                <div class="mb-1">Дата монтажа</div>
                <DatePicker v-model="input.installationDateAt" @date-select="changeInstallationDate" dateFormat="dd.mm.yy" :minDate="minDate" :maxDate="maxDate" :manualInput="false" class="w-full" :invalid="Boolean(inputError.installationDateAt)"  placeholder="Выберите дату монтажа" />
            </div>
            <div class="mb-3">
                <div class="mb-1">Дата запуска</div>
                <DatePicker v-model="input.startDateAt"  @date-select="changeStartDate" dateFormat="dd.mm.yy" :maxDate="maxDate" :manualInput="false" class="w-full" :invalid="Boolean(inputError.startDateAt)" placeholder="Выберите дату запуска" :disabled="isDisabled.startDateAt" :min-date="input.installationDateAt ? new Date(input.installationDateAt) : minDate" />
            </div>
            <div class="mb-3">
                <div class="mb-1">Дата остановки</div>
                <DatePicker v-model="input.stopDateAt" @date-select="changeStopDate" dateFormat="dd.mm.yy" :maxDate="maxDate" :manualInput="false" class="w-full" :invalid="Boolean(inputError.stopDateAt)" placeholder="Выберите дату остановки" :disabled="isDisabled.stopDateAt" :min-date="input.startDateAt ? new Date(input.startDateAt) : minDate" />
            </div>
            <div class="mb-3">
                <div class="mb-1">Дата демонтажа</div>
                <DatePicker v-model="input.dismantlingDateAt" @date-select="changeDismantlingDate" dateFormat="dd.mm.yy" :maxDate="maxDate" :manualInput="false" class="w-full" :invalid="Boolean(inputError.dismantlingDateAt)" placeholder="Выберите дату демонтажа" :disabled="isDisabled.dismantlingDateAt" :min-date="input.stopDateAt ? new Date(input.stopDateAt) : minDate" />
            </div>
            <div class="mb-3">
                <div class="mb-1">Наработка</div>
                <InputNumber v-model="input.operatingTime" @input="changeOperatingTime" :min="0" :max="10000" suffix=" сут" class="operating-time-datepicker w-full" placeholder="Вычисляемое поле" disabled/>
            </div>
            <div class="mb-3">
                <div class="mb-1">Дата проведения разбора</div>
                <DatePicker v-model="input.analysisDateAt" @date-select="changeAnalysisDate" dateFormat="dd.mm.yy" :maxDate="maxDate" :manualInput="false" class="w-full" :invalid="Boolean(inputError.analysisDateAt)" placeholder="Выберите дату разбора" :disabled="isDisabled.analysisDateAt" :min-date="input.dismantlingDateAt ? new Date(input.dismantlingDateAt) : minDate" />
            </div>
        </Fieldset>
        <div class="flex flex-col">
            <Fieldset legend="Дополнительная информация" class="mb-5">
                <div class="mb-3">
                    <div class="mb-1">Причина остановки</div>
                    <Select v-model="input.stopReason" :options="locations.getStopReasons()" optionLabel="name" optionValue="name" placeholder="Выберите причину" class="w-full md:w-14rem" :class="{ 'p-invalid': Boolean(inputError.stopReason) }" />
                </div>
                <div class="mb-3">
                    <div class="mb-1">Режим работы</div>
                    <Select v-model="input.mode" :options="locations.getModes()" optionLabel="name" optionValue="name" placeholder="Выберите режим" class="w-full md:w-14rem" :class="{ 'p-invalid': Boolean(inputError.mode) }"  />
                </div>
                <div class="mb-3">
                    <div class="mb-1">Ключ SL</div>
                    <InputText v-model="input.slKey" placeholder="Введите ключ SyteLine" />
                </div>
            </Fieldset>
            <Fieldset legend="Примечание к разбору" class="h-full">
                <textarea v-model="input.note" class="w-full p-2" style="resize: none; outline: none" rows="13" placeholder="Введите общее примечание к разбору"></textarea>
            </Fieldset>
        </div>
    </div>
    <Button label="Сохранить" @click="store" />
<!--    <Button label="Сохранить" @click="store" :disabled="isBtnSaveDisabled" />-->
</template>


<script lang="ts" setup>
import Fieldset from 'primevue/fieldset';
import Select from 'primevue/select';
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import DatePicker from 'primevue/datepicker';
import InputNumber from 'primevue/inputnumber';
import { computed, onMounted, ref, toRaw, watch } from "vue";
import { locations } from "@/data";
import { Input, InputError } from "@/types";
import axios, { type RawAxiosRequestConfig } from 'axios';
import { useRoute } from 'vue-router'
import useAuth from '@/composables/useAuth.js'
import Toast from "primevue/toast";
import { useToast } from 'primevue/usetoast';


const { inputObj, inputErrorObj, convertCamelToSnake } = useAuth();
const route = useRoute()
const toast = useToast();

const input = ref<Input>(inputObj);
const inputError = ref<InputError>(inputErrorObj);

// Работа с датами
const isDisabled = ref({
    startDateAt: true,
    stopDateAt: true,
    dismantlingDateAt: true,
    analysisDateAt: true
})

const minDate = computed(() => {
    let dt = new Date();
    dt.setDate(1);
    dt.setMonth(0);
    dt.setFullYear(1950);
    return dt;
})

const maxDate = computed(() => {
    let dt = new Date();
    dt.setDate(1);
    dt.setMonth(0);
    dt.setFullYear(3000);
    return dt;
})
const changeInstallationDate = () => { inputError.value.installationDateAt = false; isDisabled.value.startDateAt = false; checkDateSequence() }
const changeStartDate = () => { inputError.value.startDateAt = false; operatingTimeCount(); isDisabled.value.stopDateAt = false; checkDateSequence() }
const changeStopDate = () => { inputError.value.stopDateAt = false; operatingTimeCount(); isDisabled.value.dismantlingDateAt = false; checkDateSequence() }
const changeDismantlingDate = () => { inputError.value.dismantlingDateAt = false; isDisabled.value.analysisDateAt = false; checkDateSequence() }
const changeOperatingTime = () => { inputError.value.operatingTime = false; }
const changeAnalysisDate = () => { inputError.value.analysisDateAt = false; checkDateSequence() }
const checkDateSequence = () => {
    if (input.value.dismantlingDateAt !== null && input.value.analysisDateAt !== null && new Date(input.value.dismantlingDateAt) > new Date(input.value.analysisDateAt)) {
        inputError.value.analysisDateAt = true;
        toast.add({ severity: 'error', summary: 'Последовательность дат', detail: 'Ошибка: время демонтажа позднее, чем время проведения разбора', life: 5000 });
    } else {
        if(input.value.analysisDateAt) inputError.value.analysisDateAt = false;
    }
    if (input.value.stopDateAt !== null && input.value.dismantlingDateAt !== null && new Date(input.value.stopDateAt) > new Date(input.value.dismantlingDateAt)) {
        inputError.value.dismantlingDateAt = true;
        toast.add({ severity: 'error', summary: 'Последовательность дат', detail: 'Ошибка: время остановки позднее, чем время демонтажа', life: 5000 });
    } else {
        if(input.value.dismantlingDateAt) inputError.value.dismantlingDateAt = false;
    }
    if (input.value.startDateAt !== null && input.value.stopDateAt !== null && new Date(input.value.startDateAt) > new Date(input.value.stopDateAt)) {
        inputError.value.stopDateAt = true;
        toast.add({ severity: 'error', summary: 'Последовательность дат', detail: 'Ошибка: время запуска позднее, чем время остановки', life: 5000 });
    } else {
        if(input.value.stopDateAt) inputError.value.stopDateAt = false;
    }
    if (input.value.installationDateAt !== null && input.value.startDateAt !== null && new Date(input.value.installationDateAt) > new Date(input.value.startDateAt)) {
        inputError.value.startDateAt = true;
        toast.add({ severity: 'error', summary: 'Последовательность дат', detail: 'Ошибка: время монтажа позднее, чем время запуска', life: 5000 });
    } else {
        if(input.value.startDateAt) inputError.value.startDateAt = false;
    }
}
const operatingTimeCount = () => {
    if (input.value.stopDateAt && input.value.startDateAt) {
        input.value.operatingTime = Number(new Date(input.value.stopDateAt).getTime() - new Date(input.value.startDateAt).getTime()) / (1000 * 60 * 60 * 24);
        if (input.value.operatingTime < 0) {
            toast.add({ severity: 'warn', summary: 'Предупреждение', detail: 'Наработка отрицательная', life: 3000 });
        }
        inputError.value.operatingTime = false;
    }
}
// -------


onMounted(() => {
    const id = route.params.id;
    if (id) {
        axios.get(`/api/input/${id}`)
            .then(res => {
                input.value = convertCamelToSnake(res.data);
                Object.keys(isDisabled.value).forEach((key) => {
                    (isDisabled.value as Record<string, boolean>)[key] = false;
                });
            })
            .catch(e => {
                const serverError = e.response?.data?.error || e.response?.data?.message || JSON.stringify(e.response?.data?.errors) || e.message;
                toast.add({
                    severity: 'error',
                    summary: 'Проблема чтения данных',
                    detail: `${serverError}`,
                    life: 3000,
                });
            })
    }
})
const store = () => {
    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

    const config: RawAxiosRequestConfig = {
        headers: {
            'X-Timezone': timeZone,
            'Content-Type': 'application/json'
        }
    };

    axios.post('/api/input', toRaw(input.value), config)
        .then(res => {
            toast.add({
                severity: 'info',
                summary: 'Данные успешно сохранены',
                detail: `Id: ${res.data.id}`,
                life: 3000,
            })
        })
        .catch(e => {
            const serverError = e.response?.data?.error || e.response?.data?.message || JSON.stringify(e.response?.data?.errors) || e.message;
            toast.add({
                severity: 'error',
                summary: 'Данные не сохранены',
                detail: `${serverError}`,
                life: 3000,
            });

            inputError.value = convertCamelToSnake(e.response.data.errors);
        })
}

// ['op', 'city', 'company', 'field', 'cluster', 'well'].forEach(key => {
//     watch(
//         () => input.value[key],
//         (newVal) => {
//             inputError.value[key] = !newVal;
//         }
//     );
// });

(Object.keys(input.value) as Array<keyof Input>).forEach((key) => {
    watch(
        () => input.value[key],
        (newVal) => {
            inputError.value[key] = !newVal;
        }
    );
});

</script>

<style scoped>
:deep(.operating-time-datepicker .p-inputnumber-input) {
    background-color: white;
}

.m-flex {
    flex-grow: 1;
}
.m-flex-doc {
    flex-grow: 3;
}

</style>

