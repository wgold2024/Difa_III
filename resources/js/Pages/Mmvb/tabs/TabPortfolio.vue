<template>
    <Panel  header="Текущее состояние" toggleable>
        <div class="flex items-center relative">
            <div class="flex justify-between w-3/4">
                <div v-for="(item, index) in portfolio.securities" :key="item.name">
                    <div v-if="item.type === 'futures'">
                        <div class="flex flex-col">
                            <div class="ml-5">{{ item.name }}</div>
                            <Select v-model="portfolio.securities[index].level" :options="portfolio.levels" optionLabel="name" optionValue="value" placeholder="Уровень"
                                    style="width: 150px; padding: 0"
                            />
                            <div class="ml-5">
                                {{ item.price }}<span v-if="item.price"> / </span>
                                <b>{{ item.levelValue }}</b><span v-if="item.levelValue"> %</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card flex absolute right-0">
                <div class="flex flex-col mr-5">
                    <div class="mb-1 ml-5">Дата начала</div>
                    <DatePicker v-model="startDate" dateFormat="dd.mm.yy" showIcon placeholder="Выберите дату" style="width: 180px" />
                    <div class="ml-5" v-if="isCounted">Авто</div>
                </div>
                <div :class="{'self-end': !isCounted, 'self-center': isCounted}">
                    <Button outlined label="Расчет" @click="getLevels" />
                </div>
            </div>
        </div>
    </Panel>
    <Splitter style="height: 72vh">
        <SplitterPanel :size="50" :minSize="10" class="py-5">
            <div class="flex justify-center items-center px-5 mb-5">
                <div class="text-lg mr-5">Cумма:</div>
                <div class="mr-10">
                    <InputText v-model="amount" class="" />
                </div>
                <div class="text-lg mr-5">Степень риска:</div>
                <div class="">
                    <Select v-model="risk" :options="values.getRiskDegree()" optionLabel="name" optionValue="value"
                            style="width: 150px; padding: 0"
                    />
                </div>
            </div>
            <div class="text-center text-xl mt-10">Выберите портфель</div>
                <Accordion @update:value="updateAccordion">
                    <AccordionPanel value="accSimpleRuble">
                        <AccordionHeader>Header I</AccordionHeader>
                        <AccordionContent>
                            <p class="m-0 mb-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                            <div class="mb-3">Базовый</div>
                            <div class="card mb-5">
<!--                                <MeterGroup :value="portfolio.getValueSimpleRuble()" />-->
                                <MeterGroup :value="portfolio.getCollection()[0]" />
                            </div>
                            <div class="mb-3">Текущий</div>
                            <div class="card mb-1">
<!--                                <MeterGroup :value="valueSimpleRuble" />-->
                                <MeterGroup :value="portfolio.getCollection()[1]" />
                            </div>
                        </AccordionContent>
                    </AccordionPanel>
               </Accordion>
        </SplitterPanel>
        <SplitterPanel class="flex mt-5 justify-center" :size="75">
            <div class="card overflow-x-auto">
<!--                <OrganizationChart :value="data" collapsible>-->
<!--                    <template #security="slotProps">-->
<!--                        <div class="flex flex-col" :style="slotProps.node.data.style">-->
<!--                            <i :class="['pi', slotProps.node.data.icon]"></i>-->
<!--                            <div class="flex flex-col items-center p-4">-->
<!--                                <span class="font-bold mb-2">{{ slotProps.node.data.name }}</span>-->
<!--                                <span>{{ slotProps.node.data.title }}</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </template>-->
<!--                </OrganizationChart>-->
            </div>
        </SplitterPanel>
    </Splitter>

</template>

<script lang="ts" setup>
import Splitter from 'primevue/splitter';
import SplitterPanel from 'primevue/splitterpanel';
import Accordion from 'primevue/accordion';
import AccordionPanel from 'primevue/accordionpanel';
import AccordionHeader from 'primevue/accordionheader';
import AccordionContent from 'primevue/accordioncontent';
import MeterGroup from 'primevue/metergroup';
import Button from "primevue/button";
import Panel from 'primevue/panel';
import Select from "primevue/select";
import InputText from "primevue/inputtext";
import OrganizationChart from 'primevue/organizationchart';
import DatePicker from "primevue/datepicker";

import { values } from "@/Pages/Mmvb/data";
import { ref, computed, onMounted, nextTick } from "vue";

import Portfolio from "@/Pages/Mmvb/Portfolio";



const portfolio = ref(new Portfolio())
const startDate = ref<Date>(new Date('2024-01-01'));
const isCounted = ref<Boolean>(false)
const amount = ref<number>(1000000)
const risk = ref<number>(0)

const getLevels = async () => {
    await portfolio.value.getLevels(startDate.value);
    isCounted.value = true;
};


interface ChartNode {
    key: string;
    type: string;
    data: {
        name: string;
        title: string;
        style: string;
    };
    children?: ChartNode[];
}

const addNode = (
    name: string,
    title: string,
    color: string,
    width: string,
    parentPath: number[] = [], // путь к родителю [индекс1, индекс2, ...]
    selection: Boolean = false
): number[] => {
    // Глубокая копия данных
    const updatedData = JSON.parse(JSON.stringify(data.value));

    let currentNode = updatedData;

    // Проходим по пути к родителю
    for (const index of parentPath) {
        if (!currentNode.children || index >= currentNode.children.length) {
            throw new Error('Invalid parent path');
        }
        currentNode = currentNode.children[index];
    }

    let outlineColor = 'transparent'
    if (selection) {
        outlineColor = 'red'
    }

    const newChild: ChartNode = {
        key: `${currentNode.key}_${currentNode.children?.length || 0}`,
        type: 'security',
        data: {
            name,
            title,
            style: `outline: 3px solid ${outlineColor}; background-color: ${color}; width: ${width}; padding: 1rem;`
        }
    };

    if (!currentNode.children) {
        currentNode.children = [];
    }

    currentNode.children.push(newChild);

    data.value = updatedData;

    return [...parentPath, currentNode.children.length - 1];
};

</script>

<style scoped>
:deep(.p-organizationchart-node){
    padding: 3px !important;
}
:deep(.p-organizationchart-node div){
    padding: 10px !important;

}


</style>

