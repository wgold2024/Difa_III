<template>
    <Panel  header="Текущее состояние" toggleable>
        <div class="flex items-center relative">
            <div v-for="(item, index) in values.getSecurity()">
                <div
                    v-if="!['ОФЗ 29009', 'ОФЗ 26238'].includes(item.name)"
                    :key="index"
                    class="mr-5"
                >
                    <div class="flex flex-col">
                        <div class="ml-5">{{ item.name }}</div>
                        <Select v-model="securityCurrentLevel[item.value]" :options="values.getLevell()" optionLabel="name" optionValue="value" placeholder="Уровень"
                                style="width: 150px; padding: 0"
                        />
                        <div class="ml-5">
                            {{ securityCurrentLevelValue[item.value] }}
                            <span v-if="securityCurrentLevelValue[item.value]">%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card flex absolute right-0">
                <div class="flex flex-col mr-5">
                    <div class="mb-1 ml-5">Дата начала</div>
                    <DatePicker v-model="startDate" dateFormat="dd.mm.yy" showIcon placeholder="Выберите дату" style="width: 180px" />
                    <div class="ml-5" v-if="isCounted">Рассчитано</div>
                </div>
                <div :class="{'self-end': !isCounted, 'self-center': isCounted}">
                    <Button outlined label="Авто" @click="getLevels" />
                </div>
            </div>
        </div>
    </Panel>
    <Splitter style="height: 72vh">
        <SplitterPanel :size="50" :minSize="10" class="py-5">
            <div class="flex justify-center items-center px-5 mb-5">
                <div class="text-lg mr-5">Введите cумму:</div>
                <div class="">
                    <InputText v-model="amount" class="" />
                </div>
            </div>


            <div class="text-center text-lg">Выберите портфель</div>
                <Accordion @update:value="updateAccordion">
                    <AccordionPanel value="0">
                        <AccordionHeader>Header I</AccordionHeader>
                        <AccordionContent>
                            <p class="m-0 mb-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                            <div class="card mb-1">
                                <MeterGroup :value="valueSimpleRuble" />
                            </div>
                        </AccordionContent>
                    </AccordionPanel>
                    <AccordionPanel value="1">
                        <AccordionHeader>Header II</AccordionHeader>
                        <AccordionContent>
                            <p class="m-0 mb-5">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non numquam eius modi.
                            </p>
                            <div class="card mb-1">
                                <MeterGroup :value="valueMaxRuble" />
                            </div>
                        </AccordionContent>
                    </AccordionPanel>
                    <AccordionPanel value="2">
                        <AccordionHeader>Header III</AccordionHeader>
                        <AccordionContent>
                            <p class="m-0">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
                                qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.
                            </p>
                            <div class="card mb-1">
                                <MeterGroup :value="valueSimpleBalanced" />
                            </div>
                        </AccordionContent>
                    </AccordionPanel>
                    <AccordionPanel value="3">
                        <AccordionHeader>Header IV</AccordionHeader>
                        <AccordionContent class="p-3">
                            <p class="mb-3">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
                                qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.
                            </p>
                            <div class="card mb-1">
                                <MeterGroup :value="valueMaxBalanced" />
                            </div>
                            <div class="card">
                                <Button class="float-right" outlined label="Выбрать" />
                            </div>
                        </AccordionContent>
                    </AccordionPanel>
                </Accordion>
        </SplitterPanel>
        <SplitterPanel class="flex items-center justify-center" :size="75">
asd
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

import { values } from "@/Pages/Mmvb/data";
import { SecurityLevel } from "@/types/mmvb";

import { ref, computed } from "vue";
import DatePicker from "primevue/datepicker";
import axios from "axios";

const startDate = ref(new Date('2024-01-01'));

const securityCurrentLevel = ref<SecurityLevel>({
    USDRUBF: null,
    EURRUBF: null,
    CNYRUBF: null,
    GLDRUBF: null,
    IMOEXF: null,
    SBERF: null,
    GAZPF: null
});
const securityCurrentLevelValue = ref<SecurityLevel>({
    USDRUBF: null,
    EURRUBF: null,
    CNYRUBF: null,
    GLDRUBF: null,
    IMOEXF: null,
    SBERF: null,
    GAZPF: null
});

const isCounted = ref<Boolean>(false)
const amount = ref<number>(1000000)

const valueSimpleRuble = ref([
    { label: 'IMOEXF', color: '#34d399', value: 50 },
    { label: 'SU29009RMFS6', color: '#fbbf24', value: 50 },
]);
const valueMaxRuble = ref([
    { label: 'IMOEXF', color: '#34d399', value: 26 },
    { label: 'SBERF', color: '#fbbf24', value: 12 },
    { label: 'GAZPF', color: '#60a5fa', value: 12 },
    { label: 'SU29009RMFS6', color: '#c084fc', value: 25 },
    { label: 'SU26238RMFS4', color: '#f87171', value: 25 },
]);
const valueSimpleBalanced = ref([
    { label: 'IMOEXF', color: '#34d399', value: 25 },
    { label: 'CNYRUBF', color: '#fbbf24', value: 25 },
    { label: 'GLDRUBF', color: '#60a5fa', value: 25 },
    { label: 'SU29009RMFS6', color: '#c084fc', value: 25 },
]);
const valueMaxBalanced = ref([
    { label: 'IMOEXF', color: '#34d399', value: 26 },      // зеленый
    { label: 'SBERF', color: '#fbbf24', value: 12 },       // желтый
    { label: 'GAZPF', color: '#60a5fa', value: 12 },       // голубой
    { label: 'CNYRUBF', color: '#c084fc', value: 25 },     // фиолетовый
    { label: 'GLDRUBF', color: '#f87171', value: 25 },     // коралловый
    { label: 'SU29009RMFS6', color: '#22d3ee', value: 25 }, // бирюзовый
    { label: 'SU26238RMFS4', color: '#fb923c', value: 25 }  // оранжевый
]);

const getLevels = () => {
    const d = new Date(startDate.value);
    const year = d.getFullYear();
    const month = String(d.getMonth() + 1).padStart(2, '0');
    const day = String(d.getDate()).padStart(2, '0');
    let date = `${year}-${month}-${day}`;

    Object.entries(securityCurrentLevel.value).forEach(([key, value]) => {
        isCounted.value = false;
        axios.get('/api/mmvb/candles', {
            params: {
                security: key,
                interval: 24,
                from: date
            }
        })
            .then(res => {
                let candleData = res.data.candles.data || [];
                let max = Math.max(...candleData.map(candle => candle[2]));
                let close = candleData[candleData.length - 1][1]
                let k = (1 - close/max) * 100;
                console.log(res.data);
                console.log('max', max);
                console.log('close', close);
                console.log('k', close/max);
                securityCurrentLevelValue.value[key] = Number(k).toFixed(3);
                isCounted.value = true;
                if (k < 20) {
                    securityCurrentLevel.value[key] = 0;
                } else if (k >= 20 && k < 40) {
                    securityCurrentLevel.value[key] = 20;
                } else if (k >= 40 && k < 60) {
                    securityCurrentLevel.value[key] = 40;
                } else if (k >= 60 && k < 80) {
                    securityCurrentLevel.value[key] = 60;
                } else {
                    securityCurrentLevel.value[key] = 80;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                isCounted.value = true;
            });
        console.log(`Key: ${key}, Value: ${value}`);
        isCounted.value = false;
    });
}

const updateAccordion = (value) => {
    console.log('value:', value);
}

</script>

<style scoped>


</style>

