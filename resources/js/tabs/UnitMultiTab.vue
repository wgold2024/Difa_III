<template>
    <Toast />
    <Accordion value="-" class="mb-1">
        <AccordionPanel value="0">
            <AccordionHeader>Схема</AccordionHeader>
            <AccordionContent>
                <div class="flex justify-around items-center content-center h-full">
                    <div v-if="!single">
                        <h5 class="ml-2">Число секций</h5>
                        <InputNumber v-model="sections" showButtons buttonLayout="horizontal" :inputStyle="{'width':'3rem'}"
                                     decrementButtonClassName="p-button-secondary" incrementButtonClassName="p-button-secondary"
                                     incrementButtonIcon="pi pi-plus" decrementButtonIcon="pi pi-minus" class="mb-5"
                                     :min="1" :max="maxSections" @input="input"/>
                    </div>
                    <img :src="imagePath" :alt="`Изображение ${unit}`" class="w-2/3"/>
                </div>
            </AccordionContent>
        </AccordionPanel>
    </Accordion>
    <Tabs :value="tabActive" class="w-full">
        <TabList class="w-full relative">
            <div class="flex" :class="{'invisible': single}">
                <Tab  v-for="tab in tabs" :key="tab.title" :value="tab.value">{{ tab.title }}</Tab>
            </div>
            <div class="absolute right-3 top-1">
                <Button label="Cохранить" icon="pi pi-save" :loading="isSaving" @click="store"/>
            </div>
        </TabList>
        <TabPanels>
            <TabPanel v-for="(tab, index) in tabs" :key="index" :value="tab.value">
                <UnitMultiTabSec
                    :details="details"
                    :section-number="index + 1"
                    @updateData="updateData"
                    :section-data="sectionData || null"
                    :defectGroups="defectGroups"
                />
            </TabPanel>
        </TabPanels>
    </Tabs>
</template>


<script lang="ts" setup>
import { computed, defineProps, onMounted, ref, PropType } from 'vue';
import { useRoute } from 'vue-router'
import Accordion from 'primevue/accordion';
import AccordionPanel from 'primevue/accordionpanel';
import AccordionHeader from 'primevue/accordionheader';
import AccordionContent from 'primevue/accordioncontent';
import InputNumber from "primevue/inputnumber";
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';
import UnitMultiTabSec from "@/tabs/UnitMultiTabSec.vue";
import axios from "axios";
import Button from "primevue/button";
import { DefectDataMap, DefectData, EspData, SectionData, DefectGroup } from "@/types";
import Toast from "primevue/toast";
import { useToast } from 'primevue/usetoast';


const props = defineProps({
    unit: {
        type: String as PropType<'Input' | 'Pump' | 'Motor' | 'Mpp'>,
        required: true
    },
    imagePath: {
        type: String,
        required: true
    },
    maxSections: {
        type: Number,
        required: true
    },
    single: {
        type: Boolean,
        required: false
    },
    // details: {
    //     type: Array,
    //     required: true
    // }
});

const sections = ref(1)
const tabActive = ref(0)
const details = ref([])
const defectData = ref<DefectData | null>(null)
const defectGroups = ref<DefectGroup[]>([])

const sectionData = ref<SectionData[] | null>(null)

const isSaving = ref<boolean>(false)

// const defectData = ref<DefectData[]>([]);
const data = ref<DefectDataMap[]>([]);
const espData = ref<EspData>({
    Pump: [],
    Motor: [],
    Mpp: [],
});

const route = useRoute()
const toast = useToast()

const getImagePath = computed(() => {
    return new URL(`${props.imagePath}`, import.meta.url)
});

const tabs = computed(() => {
    const arr = []
    for (let i = 0; i < sections.value; i++) {
        arr.push({ title: `Секция ${i+1}`, content: `Content ${i+1}`, value: i })
    }
    tabActive.value = sections.value - 1;

    return arr
})

onMounted(() => {
    getDetails();
    show();
});

const input = () => {
    // console.log(sections.value)
}

const getDetails = () => {
    axios.get(`/api/esp?unit=${props.unit}`)
        .then(res => {
            details.value = res.data
            // console.log(res.data)
            // details.value = res.data.data;
        })
}

const store = () => {
    isSaving.value = true;
    //console.log(espData.value[props.unit]);
    // console.log(espData.value[props.unit][3].defects[1]);
    axios.post('/api/defect-data',{
        input_id: route.params.id,
        unit: props.unit,
        sections: espData.value[props.unit],
    }, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
        .then(res => {
            // console.log('res.data[props.unit]', res.data[props.unit]);
            // console.log('res', res.data[props.unit]);
            if (res.status >= 200 && res.status < 300) {
                sectionData.value = res.data[props.unit];
                toast.add({
                    severity: 'info',
                    summary: 'Данные успешно сохранены',
                    detail: `Id: ${route.params.id}`,
                    life: 3000,
                });
            } else {
                toast.add({
                    severity: 'error',
                    summary: 'Ошибка при сохранении',
                    detail: `Код ошибки: ${res.status}`,
                    life: 3000,
                });
            }
            isSaving.value = false;
        })
        .catch(e => {
            const serverError = e.response?.data?.error || e.response?.data?.message || JSON.stringify(e.response?.data?.errors) || e.message;
            toast.add({
                severity: 'error',
                summary: 'Ошибка на сервере',
                detail: `${serverError}`,
                life: 3000,
            });
            isSaving.value = false;
        })
}

const updateData = (sectionData: SectionData) => {
    const unitValue = espData.value[props.unit];

    if (Array.isArray(unitValue)) {
        // Обработка для Pump, Motor и т.п. исключая Input
        const existingIndex = unitValue.findIndex(
            item => item.section_number === sectionData.section_number
        );
        if (existingIndex !== -1) {
            unitValue[existingIndex] = sectionData;
        } else {
            unitValue.push(sectionData);
        }
    }
};

const show = () => {
    axios.get(`/api/defect-data/${route.params.id}?unit=${props.unit}`)
        .then(res => {
            const data: SectionData[] = res.data[props.unit] || [];

            sections.value = data.length > 0
                ? Math.max(...data.map((item: SectionData) => item.section_number))
                : 1;

            sectionData.value = data;
        })
        .catch(error => {
            console.error('Error fetching defect data:', error);
            sections.value = 1;
            sectionData.value = [];
        });

    axios.get(`/api/defect-group?unit=${props.unit}`)
        .then(res => {
            defectGroups.value = res.data
            // console.log('defectGroups.value', defectGroups.value)
        })
        .catch(error => {
            console.error('Error fetching defect group:', error);
        });
}

</script>

<style scoped>
:deep(.p-inputnumber-button) {
    background-color: #3B82F6;
    border-color: #3B82F6 !important;
    color: white ;
}

:deep(.p-inputnumber-input.p-inputtext) {
    text-align: center;
}

:deep(.p-accordionpanel) {
    border: 2px solid #e2e8f0;
    border-radius: 5px;
}

:deep(.p-accordionheader) {
    border-bottom: 2px solid #e2e8f0 !important;
    height: 10px;
}

:deep(.p-accordioncontent-content) {
    padding: 25px;
}

</style>

// https://ru.vuejs.org/guide/components/v-model

