<template>
<!--    <Toast />-->
    <Accordion value="0" class="mb-4">
        <AccordionPanel value="0">
            <AccordionHeader>Общая информация</AccordionHeader>
            <AccordionContent>
                <div class="grid grid-cols-5 gap-x-1 gap-y-2">
                    <div v-for="(component, index) in commonComponents" :key="index" class="mr-5">
                        <div v-if="component.type=='string'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <InputText v-model="defectData[component.id] as unknown as string" placeholder="Введите значение" class="w-full"/>
                        </div>
                        <div v-if="component.type=='number'"  class="w-full text-center">
                            <div class="mb-1">{{ component.name }}, {{ component.measure_unit }}</div>
                            <InputNumber v-model="defectData[component.id] as unknown as number" :min="0" placeholder="Введите число" class="w-1/2"/>
                        </div>
                        <div v-if="component.type=='select'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <Select v-model="defectData[component.id]" :options="component.values" optionLabel="name" optionValue="name" placeholder="Выберите значение" class="w-full" />
                        </div>
                    </div>
                </div>
            </AccordionContent>
        </AccordionPanel>
    </Accordion>
<!--    <Panel header="Общая информация" class="mb-3 px-3" >-->
<!--        <div class="flex justify-content-end align-items-center">-->
<!--            <div v-for="(component, index) in commonComponents" :key="index" class="mr-5">-->
<!--                <div class="mb-1">{{ component.name }}</div>-->
<!--                <InputText placeholder="Введите значение" :class="{'p-invalid': false}"/>-->
<!--            </div>-->
<!--        </div>-->
<!--    </Panel>-->

    <div class="flex justify-between">
        <div class="flex flex-col w-1/4 p-1">
            <ScrollPanel class="mr-3 pr-4" style="width: 100%; height: 57vh; z-index: 0">
                <div v-for="(detail, index) in buttons" :key="index">
                    <Button :label="detail.name" severity="secondary" variant="outlined" class="w-full mb-1" :class="{ 'active': activeBtn === index }" @click="btnDetailChange(index)"/>
                </div>
            </ScrollPanel>
        </div>
        <div  v-if="true" class="w-3/4 p-1">
            <ScrollPanel class="mr-3" style="width: 100%; height: 57vh; z-index: 0">
                <Card  v-for="(component, index) in btnComponents as Defect[]" :key="index" class="mb-1" style="overflow: hidden">
                    <template #content>
                        <div class="flex justify-between p-1">
                            <div class="flex justify-between w-full">
                                <img src="#" alt="adsf" class="mr-3" style="width: 200px; height: 300px; border: 1px solid green">
                                <div class="mr-3 flex flex-col justify-stretch w-full">
                                    <div>
                                        <div class="flex justify-between items-center">
                                            <div class="mb-3">
                                                <Checkbox v-model="defectData[component.id]" :binary="true" :value="component.id" :id="'label' + String(component.id)" name="defect" />
                                                <label :for="'label' + String(component.id)" class="ml-2">{{ component.name }}</label>
                                            </div>
                                            <Button label="Возможные причины" text raised severity="secondary" @click="isReasonVisible[component.id] = !isReasonVisible[component.id]" class="mb-2"/>
                                        </div>
                                        <p class="mb-2">
                                            {{ component.description }}
                                        </p>
                                        <div :id="String(component.id)" v-if="component.group_id && optionComponents.filter(res => res.group_id === component.group_id).length > 0" :class="{ 'm-hidden': !defectData[component.id] }" class="p-2 mb-2 border border-r rounded-lg" style="border-color: var(--novomet-light-gray-blue-1000)">
                                            <div class="grid grid-cols-3 gap-x-10 gap-y-2">
                                                <div v-for="(item, index) in optionComponents.filter(res => res.group_id === component.group_id)" :key="index">
                                                    <div v-if="item.type=='string'" >
                                                        <div class="mb-1">{{ item.name }}</div>
                                                        <InputText v-model="defectData[item.id] as unknown as string" placeholder="Введите значение" class="w-full"/>
                                                    </div>
                                                    <div v-if="item.type=='number'"  class="w-full text-center">
                                                        <div class="mb-1">{{ item.name }}, {{ item.measure_unit }}</div>
                                                        <InputNumber v-model="defectData[item.id] as unknown as number" :min="0" placeholder="Введите число" class="w-full"/>
                                                    </div>
                                                    <div v-if="item.type=='select' && filteredOptions(item.values).length > 0" >
                                                        <div class="mb-1">{{ item.name }}</div>
<!--                                                        <Select
                                                            v-model="defectData[item.id]"
                                                            :options="item.values.filter(res => res.visibility_defect_id === '0' || res.visibility_defect_value === defectData[res.visibility_defect_id])"
                                                            optionLabel="name" optionValue="name"
                                                            placeholder="Выберите значение" class="w-full"
                                                        />-->
                                                        <Select
                                                            v-model="defectData[item.id]"
                                                            :options = filteredOptions(item.values)
                                                            optionLabel="name" optionValue="name"
                                                            placeholder="Выберите значение" class="w-full"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <Dialog v-model:visible="isReasonVisible[component.id]" modal header="Возможные причины" :style="{ width: '50vw' }">
                                            <p class="mb-2">
                                                {{ component.reason }}
                                            </p>
                                        </Dialog>
                                    </div>
                                    <div class="flex-1 min-h-[100px]" >
<!--                                        <Textarea autoResize placeholder="Добавьте комментарий" class="w-full h-full " />-->
                                        <textarea class="w-full h-full p-2 border border-r rounded-lg" style="resize: none; outline: none; border-color: var(--novomet-light-gray-blue-1000)" rows="3" placeholder="Введите общее примечание к разбору"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <img src="#" alt="adsf" style="width: 200px; height: 200px; border: 1px solid green">
                            </div>
                        </div>
                    </template>
                </Card>
            </ScrollPanel>
        </div>
    </div>
</template>

<script lang="ts" setup>
import {ref, defineProps, onMounted, computed, PropType, watch, watchEffect, defineEmits} from "vue";
import Accordion from 'primevue/accordion';
import AccordionPanel from 'primevue/accordionpanel';
import AccordionHeader from 'primevue/accordionheader';
import AccordionContent from 'primevue/accordioncontent';
import Button from 'primevue/button';
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import Select from "primevue/select";
import Card from 'primevue/card';
import ScrollPanel from 'primevue/scrollpanel';
import Checkbox from 'primevue/checkbox';
import Dialog from 'primevue/dialog';
import Textarea from 'primevue/textarea';
import { Detail, Defect, DefectData, Value, Data, SectionData, DefectData2 } from "@/types";
import Fieldset from 'primevue/fieldset';
import axios from "axios";
import {toRaw} from "vue/dist/vue";
// import {locations} from "@/data";

// const model = defineModel()


const props = defineProps<{
    details?: Detail[];
    sectionId: number
}>();



onMounted(() => {
    // console.log(props.sectionId);
})

const activeBtn = ref<number>(0);
const btnComponents = ref<Defect[] | null>(null);
// const optionComponents = ref<Defect[]>([]);
const isReasonVisible = ref<boolean[]>([]);
const defectData = ref<DefectData[]>([]);
// const defectData = defineModel<DefectData[]>({
//     default: () => [] as DefectData[]
// })

const data = defineModel<Data[]>({
    default: () => [] as Data[]
})

const sectionData = ref<SectionData>()
const sectionId = ref<number>(props.sectionId)

const buttons = computed<Detail[]>(() => {
    return props.details?.filter((res: Detail) => res.name !== 'Общая информация') ?? [];
});

const commonComponents = computed<Defect[]>(() => {
    const data = props.details?.find((res: Detail) => res.name === 'Общая информация');
    return data?.defects ?? []; // Вернёт пустой массив если defects нет
});

const filteredOptions = (item: Value[]) => {
    return item.filter(res =>
        res.visibility_defect_id === 0 ||
        res.visibility_defect_value === defectData.value[res.visibility_defect_id] )
}


// const optionComponents = (groupId: number) => {
//     computed<Defect[]>(() => {
//         console.log(props.details[activeBtn + 1].defects.filter(res => res.is_option && res.group_id === groupId));
//         return props.details[activeBtn + 1].defects.filter(res => res.is_option && res.group_id === groupId)
//     })
// }

// const optionComponents = computed<Defect[]>(() => {
//     // console.log(props.details[activeBtn + 1].defects.filter(res => res.is_option && res.group_id === 5));
//     if ((props.details?.[activeBtn + 1]?.defects as Defect[] | undefined)?.length) {
//         console.log(props.details[activeBtn + 1].defects.filter(res => res.group_id === 5))
//         return props.details[activeBtn + 1].defects.filter(res => res.group_id === 5)
//     } else {
//         return []
//     }
// })
const optionComponents = computed<Defect[]>(() => {
    const targetItem = props.details?.[activeBtn.value + 1];
    if (!targetItem?.defects) return [];

    return targetItem.defects.filter(res => res.is_option);
})


// const getOptionComponents = () => {
//     const data = props.details[activeBtn.value + 1].defects.filter(res => res.is_option)
//     console.log(data)
//     return data
// }

const btnDetailChange = (index: number) => {
    activeBtn.value = index;
    if (props.details?.length) {
        btnComponents.value = props.details[index + 1].defects.filter(res => !res.is_option)
    }
}

const emit = defineEmits(['updateData'])

watch(defectData, () => {
    // console.log(defectData.value)
    // console.log(props.details)

    // console.log(defectData.value[28])
    // Скрыитие отображение доп. полей для Слома вала
    const el93 = document.getElementById('93')
    // el93.classList.add('mr-9')
    // if (el28 === null) return
    // if (defectData.value[28] === true) {
    //     el28.classList.remove('m-hidden')
    // } else {
    //     el28.classList.add('m-hidden')
    // }

    const arr: DefectData2[] = [];

    for (const [key, value] of Object.entries(defectData.value)) {
        // Проверяем, что ключ и значение существуют и имеют правильный тип
        if (typeof key !== 'undefined' && typeof value !== 'undefined' && !isNaN(Number(key))) {
                arr.push({
                    defect_id: Number(key),
                    value: String(value)
                });
        } else {
            console.warn(`Invalid defect data: key=${key}, value=${value}`);
        }
    }

    sectionData.value = {
        section_id: sectionId.value,
        defects: arr
    }

    emit('updateData', sectionData.value)
    // console.log(sectionId.value)

}, { deep: true })

watchEffect(() => {
    btnDetailChange(0);
});



</script>

<style scoped>
.active {
    //background-color: #3b82f6 !important;
    color: var(--novomet-orange-800) !important;
    border-color: var(--novomet-orange-800) !important;
}

:deep(.p-accordioncontent-content) {
    background-color: var(--novomet-light-gray-blue-200);
}

:deep(.p-inputtext.p-component.p-inputnumber-input) {
    width: 100%;
}

:deep(.p-accordioncontent-content) {
    padding: 20px !important;
}

:deep(.p-card-body) {
    padding: 5px 10px;
    border: 2px solid var(--novomet-light-gray-blue-400);
}

.m-hidden {
    display: none;
}


</style>

