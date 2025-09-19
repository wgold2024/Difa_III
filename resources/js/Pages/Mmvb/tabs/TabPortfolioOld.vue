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
                                <MeterGroup :value="portfolio.getValueSimpleRuble()" />
                            </div>
                            <div class="mb-3">Текущий</div>
                            <div class="card mb-1">
<!--                                <MeterGroup :value="valueSimpleRuble" />-->
                                <MeterGroup :value="portfolio.getValueSimpleRubleAuto()" />
                            </div>
                        </AccordionContent>
                    </AccordionPanel>
                    <AccordionPanel value="accMaxRuble">
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
                    <AccordionPanel value="accSimpleBalanced">
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
                    <AccordionPanel value="accMaxBalanced">
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
        <SplitterPanel class="flex mt-5 justify-center" :size="75">
            <div class="card overflow-x-auto">
                <OrganizationChart :value="data" collapsible>
                    <template #security="slotProps">
                        <div class="flex flex-col" :style="slotProps.node.data.style">
                            <i :class="['pi', slotProps.node.data.icon]"></i>
                            <div class="flex flex-col items-center p-4">
                                <span class="font-bold mb-2">{{ slotProps.node.data.name }}</span>
                                <span>{{ slotProps.node.data.title }}</span>
                            </div>
                        </div>
                    </template>
                </OrganizationChart>
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
import axios from "axios";

import { values } from "@/Pages/Mmvb/data";
import { securityColor } from "@/Pages/Mmvb/colors";
import { SecurityLevel } from "@/types/mmvb";

import {ref, computed, onMounted, nextTick} from "vue";

import Portfolio from "@/Pages/Mmvb/Portfolio";

const startDate = ref(new Date('2024-01-01'));

// const securityParam = ref(values.getSecurity())

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
const risk = ref<number>(0)

const portfolio = ref(new Portfolio('Иван', 1, 'futures'))

const valueSimpleRuble = ref(values.getValueSimpleRuble());
const valueMaxRuble = ref([
    { label: 'IMOEXF', color: securityColor.imoexf, value: 25, type: 'futures' },
    { label: 'SBERF', color: securityColor.sberf, value: 15, type: 'futures' },
    { label: 'GAZPF', color: securityColor.gazpf, value: 10, type: 'futures' },
    { label: 'SU29009RMFS6', color: securityColor.su29009rmfs6, value: 25, type: 'ofz' },
    { label: 'SU26238RMFS4', color: securityColor.su26238rmfs4, value: 25, type: 'ofz' },
]);
const valueSimpleBalanced = ref([
    { label: 'IMOEXF', color: securityColor.imoexf, value: 25, type: 'futures' },
    { label: 'CNYRUBF', color: securityColor.cnyrubf, value: 25, type: 'futures' },
    { label: 'GLDRUBF', color: securityColor.gldrubf, value: 25, type: 'futures' },
    { label: 'SU29009RMFS6', color: securityColor.su29009rmfs6, value: 25, type: 'ofz' },
]);
const valueMaxBalanced = ref([
    { label: 'IMOEXF', color: securityColor.imoexf, value: 12.5, type: 'futures' },
    { label: 'SBERF', color: securityColor.sberf, value: 7.5, type: 'futures' },
    { label: 'GAZPF', color: securityColor.gazpf, value: 5, type: 'futures' },
    { label: 'CNYRUBF', color: securityColor.cnyrubf, value: 12.5, type: 'futures' },
    { label: 'GLDRUBF', color: securityColor.gldrubf, value: 12.5, type: 'futures' },
    { label: 'SU29009RMFS6', color: securityColor.su29009rmfs6, value: 25, type: 'ofz' },
    { label: 'SU26238RMFS4', color: securityColor.su26238rmfs4, value: 25, type: 'ofz' }
]);

const data = ref({
    key: '0',
    type: 'security',
    styleClass: '!bg-gray-200 text-white rounded-xl',
    data: {
        icon: 'pi-shopping-bag',
        name: 'Portfolio',
        style: `padding-top: 10px; width: 200px`
    },
    children: [
        // {
        //     key: '0_0',
        //     type: 'security',
        //     styleClass: '!bg-gray-100 rounded-xl w-full',
        //     data: {
        //         name: 'pump',
        //         title: '60%',
        //         style: `background-color: ${securityColor.imoexf}; width: 200px`
        //     },
        //     children: [
        //         {
        //             label: 'Sales',
        //             styleClass: '!bg-purple-100 text-white rounded-xl'
        //         },
        //         {
        //             label: 'Marketing',
        //             styleClass: '!bg-purple-100 text-white rounded-xl'
        //         }
        //     ]
        // }

    ]
});

// const portfolio = ref({
//     info: {
//         type: '',
//         risk: 0,
//         securities: [
//             { name: 'IMOEXF', level: 0, type: 'futures', summaBase: 10000, summaLeverage: 2500 },
//         ]
//     }
// })

onMounted(() => {
    console.log('portfolio', portfolio.value.getValueSimpleRuble());
})


const getLevels = () => {
    const d = new Date(startDate.value);
    const year = d.getFullYear();
    const month = String(d.getMonth() + 1).padStart(2, '0');
    const day = String(d.getDate()).padStart(2, '0');
    let date = `${year}-${month}-${day}`;

    // console.log('securityParam', securityParam.value)

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
                securityCurrentLevelValue.value[key] = Number(k).toFixed(3);
                isCounted.value = true;
                if (k < 20) {
                    securityCurrentLevel.value[key] = 20;
                } else if (k >= 20 && k < 40) {
                    securityCurrentLevel.value[key] = 40;
                } else if (k >= 40 && k < 60) {
                    securityCurrentLevel.value[key] = 60;
                } else if (k >= 60 && k < 80) {
                    securityCurrentLevel.value[key] = 80;
                } else {
                    securityCurrentLevel.value[key] = 100;
                }



                let kOfz  = valueSimpleRuble.value.filter(res => res.type === 'ofz').length
                let level = 0
                for (const item of valueSimpleRuble.value) {
                    if (item.type === 'futures') {

                        item.value = securityCurrentLevel.value[item.label]
                        level = item.value
                    } else if (item.type === 'ofz') {
                        item.value = 100 - level
                    }
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
    let kOfz  = null
    let summFutures = 0
    let kFutures = 4

    switch (value) {
        case 'accSimpleRuble':
            data.value.children = [];
            data.value.data.name = 'Simple ruble';

            kOfz  = valueSimpleRuble.value.filter(res => res.type === 'ofz').length
            console.log('kOfz', kOfz)
            summFutures = 0


            for (const item of valueSimpleRuble.value) {
                const parentPath = addNode(item.label, `${item.value} % / ${amount.value * Number(item.value) / 100} руб`, item.color,'250px');

                let summ
                [summ, summFutures] = calculateSumWithUpdate(item, kFutures, kOfz, summFutures)

                addNode('Уровни',``, item.color,'150px', parentPath)

                // addNode('Доля, руб',`${amount.value * Number(item.value) / 100}`, item.color,'150px', parentPath)
                // addNode('Сумма, руб',`${Number(summ).toFixed(0)}`,item.color,'100px', [...parentPath, 0])
                addNode('0: 20%',`${Number(summ).toFixed(0)}`, item.color,'100px',[...parentPath, 0], true);
                addNode('1: 40%',`${Number(summ).toFixed(0) * 2}`, item.color,'100px',[...parentPath, 0]);
                addNode('2: 60%',`${Number(summ).toFixed(0) * 3}`, item.color,'100px',[...parentPath, 0]);
                addNode('3: 80%',`${Number(summ).toFixed(0) * 4}`, item.color,'100px',[...parentPath, 0]);
                addNode('4: 100%',`${Number(summ).toFixed(0) * 5}`, item.color,'100px',[...parentPath, 0]);
            }

            console.log('data.value', data.value)
            break;
        case 'accMaxRuble':
            data.value.children = [];

            kOfz  = valueMaxRuble.value.filter(res => res.type === 'ofz').length
            console.log('kOfz', kOfz)
            summFutures = 0
            k = 3
            for (const item of valueMaxRuble.value) {
                let index = addChildWithAutoKeys(item.label, `${item.value} %`, item.color, '150px', null)

                let summ = 0
                console.log('item.type', item.type)
                console.log('item.label', item.label)
                if (item.type === 'futures') {
                    summ = amount.value * Number(item.value) / 100 / k
                    summFutures += summ
                    console.log('summ', summ)
                    console.log('summFutures', summFutures)
                } else if (item.type === 'ofz') {
                    summ = (amount.value - summFutures) / kOfz
                    console.log('summ2', summ)
                } else {
                    summ = 0
                }

                addChildWithAutoKeys('Доля, руб', `${amount.value * Number(item.value) / 100}`, item.color, '150px', index)
                addChildWithAutoKeys('Сумма, руб', `${Number(summ).toFixed(0)}`, item.color, '150px', index)
            }
            // addChildWithAutoKeys('IMOEXF', '50 %', `background-color: ${securityColor.imoexf}; width: 150px`)
            // addChildWithAutoKeys('SBERF', '50 %', `background-color: ${securityColor.su29009rmfs6}; width: 150px`)
            // addChildWithAutoKeys('GAZPF', '50 %', `background-color: ${securityColor.su29009rmfs6}; width: 150px`)
            // addChildWithAutoKeys('SU29009RMFS6', '50 %', `background-color: ${securityColor.su29009rmfs6}; width: 150px`)
            // addChildWithAutoKeys('SU26238RMFS4', '50 %', `background-color: ${securityColor.su29009rmfs6}; width: 150px`)
            // data.value.data.name = 'Max ruble';
            //
            // data.value.children[0].data.name = value + 1;
            // data.value.children[1].data.title = value + 2;

            break;
        case 'accSimpleBalanced':
            data.value.data.name = 'Simple balanced';
            break;
        case 'accMaxBalanced':
            data.value.data.name = 'Max balanced';
            break;
        default:
            data.value.children = [];
            // data.value.data.name = '';
            // data.value.children[0].data.name = '';
            // data.value.children[0].data.title = '';
            // data.value.children[0].data.style = `background-color: white; width: 0px`;
            // data.value.children[1].data.name = '';
            // data.value.children[1].data.title = '';
            // data.value.children[1].data.style = `background-color: white; width: 0px`;
            break;
    }



    console.log(value);
}

const calculateSumWithUpdate = (item: any, kFutures: number, kOfz: number, summFutures: number): number[] => {
    let summ = 0;

    if (item.type === 'futures') {
        summ = amount.value * Number(item.value) / 100 / kFutures;
        summFutures += summ;
    } else if (item.type === 'ofz') {
        summ = (amount.value - summFutures) / kOfz;
    }

    return [summ, summFutures];
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

