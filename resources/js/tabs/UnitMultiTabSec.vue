<template>
<!--    <Toast />-->
    <Accordion value="0" class="mb-4">
        <AccordionPanel value="0">
            <AccordionHeader>Общая информация</AccordionHeader>
            <AccordionContent>
                <div v-if="commonComponents !== null" class="grid grid-cols-5 gap-x-1 gap-y-1">
                    <div v-for="(component, index) in commonComponents" :key="index" class="mr-5">
                        <div v-if="component.type=='string'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <InputText placeholder="Введите значение" class="w-full"/>
                        </div>
                        <div v-if="component.type=='number'"  class="w-full text-center">
                            <div class="mb-1">{{ component.name }}, {{ component.measure_unit }}</div>
                            <InputNumber  :min="0" placeholder="Введите число" class="w-1/2"/>
                        </div>
                        <div v-if="component.type=='select'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <Select :options="component.values" optionLabel="name" optionValue="name" placeholder="Выберите значение" class="w-full" />
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


    <div v-for="(detail, index) in buttons" :key="index">
        <Button :label="detail.name" severity="secondary" variant="outlined" class="w-1/4 mb-1" :class="{ 'active': activeBtn === index }" @click="btnDetailChange(index)"/>
    </div>

</template>


<script lang="ts" setup>
import { ref, defineProps, onMounted, computed, PropType  } from "vue";
import Accordion from 'primevue/accordion';
import AccordionPanel from 'primevue/accordionpanel';
import AccordionHeader from 'primevue/accordionheader';
import AccordionContent from 'primevue/accordioncontent';
import Button from 'primevue/button';
import InputText from "primevue/inputtext";
import { Detail, Defect } from "@/types";
import InputNumber from "primevue/inputnumber";
import {locations} from "@/data";
import Select from "primevue/select";


const props = defineProps<{
    details?: Detail[];
}>();



onMounted(() => {
    // console.log(props.details);
})

const activeBtn = ref<number | null>(null);
// const commonComponents = ref<Defect[] | null>(null);

const buttons = computed<Detail[]>(() => {
    return props.details?.filter((res: Detail) => res.name !== 'Общая информация') ?? [];
});

const commonComponents = computed<Defect[]>(() => {
    const data = props.details?.find((res: Detail) => res.name === 'Общая информация');
    return data?.defects ?? []; // Вернёт пустой массив если defects нет
});

const btnDetailChange = (index: number) => {
    activeBtn.value = index;
    // if (props.details?.length) {
    //     const defects = props.details[index].defects
    //     commonComponents.value = defects.filter(res => res.group_id === 1)
    //     console.log(commonComponents);
    // }
}

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


</style>

