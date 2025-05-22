<template>
<!--    <Toast />-->
    <Accordion value="-">
        <AccordionPanel value="0">
            <AccordionHeader>Схема</AccordionHeader>
            <AccordionContent>
                <div class="flex justify-around items-center content-center h-full">
                    <div>
                        <h5 class="ml-2">Число секций</h5>
                        <InputNumber v-model="sections" showButtons buttonLayout="horizontal" :inputStyle="{'width':'3rem'}"
                                     decrementButtonClassName="p-button-secondary" incrementButtonClassName="p-button-secondary"
                                     incrementButtonIcon="pi pi-plus" decrementButtonIcon="pi pi-minus" class="mb-5"
                                     :min="1" :max="maxSections" @input="input"/>
                    </div>
                    <img :src="getImagePath as unknown as string" :alt="`Изображение ${unit}`" class="ml-9 w-2/3"/>
                </div>
            </AccordionContent>
        </AccordionPanel>
    </Accordion>
    <Tabs :value="tabActive">
        <TabList>
            <Tab v-for="tab in tabs" :key="tab.title" :value="tab.value">{{ tab.title }}</Tab>
        </TabList>
        <TabPanels>
            <TabPanel v-for="tab in tabs" :key="tab.content" :value="tab.value">
<!--                <p class="m-0">{{ tab.content }}</p>-->
                <UnitMultiTabSec :details="details" />
            </TabPanel>
        </TabPanels>
    </Tabs>


</template>


<script lang="ts" setup>
import { computed, defineProps, onMounted, ref } from 'vue';
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


const props = defineProps({
    unit: {
        type: String
    },
    imagePath: {
        type: String,
        required: true
    },
    maxSections: {
        type: Number,
        required: true
    },
    // details: {
    //     type: Array,
    //     required: true
    // }
});

const sections = ref(1)
const tabActive = ref(0)
const details = ref([])

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
});

const input = () => {
    console.log(sections.value)
}

const getDetails = () => {
    axios.get(`/api/esp?unit=${props.unit}`)
        .then(res => {
            details.value = res.data
            // console.log(res.data)
            // details.value = res.data.data;
        })
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

