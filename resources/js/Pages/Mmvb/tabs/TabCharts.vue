<template>
    <div class="m-mobile_hide items-start w-full px-1 py-10">
        <div class="w-full p-1">
            <Tabs value="tab0_input" scrollable>
                <TabList>
                    <Tab value="tab0_securities">
                        <i class="pi pi-th-large mr-2"></i>
                        <span>Портфель</span>
                    </Tab>
                    <Tab value="tab1_charts">
                        <div class="flex items-center">
                            <i class="pi pi-chart-bar mr-2"></i>
                            <span>Графики</span>
                        </div>
                    </Tab>
                    <Tab value="tab2_trades">
                        <div class="flex items-center">
                            <i class="pi pi-link mr-2"></i>
                            <span>Сделки</span>
                        </div>
                    </Tab>
                </TabList>
                <TabPanels>
                    <TabPanel value="tab0_securities" class="w-full">
                        Портфель
                        <p class="m-0">
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
                            qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.
                        </p>
                    </TabPanel>
                    <TabPanel value="tab1_charts">
                        Графики
                        <p class="m-0">
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
                            qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.
                        </p>
                    </TabPanel>
                    <TabPanel value="tab2_trades">
                        Сделки
                        <p class="m-0">
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
                            qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.
                        </p>
                    </TabPanel>
                 </TabPanels>
            </Tabs>
        </div>

        <div class="flex justify-center mb-10">
            <Button type="submit" @click="startTrain" label="Получить данные" />
        </div>

    </div>
</template>

<script lang="ts" setup>
import Button from "primevue/button";
import axios from "axios";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import { ref, onMounted } from "vue";
import { securitiesTranslations } from '@/locales/ruMmvb'
import {Input} from "@/types";
import { Security } from "@/types/mmvb";
import Tabs from "primevue/tabs";
import TabList from "primevue/tablist";
import Tab from "primevue/tab";
import TabPanel from "primevue/tabpanel";
import TabPanels from "primevue/tabpanels";

const dataTable = ref<Array<string>>();
const selectedProduct = ref();
const rowNumbers = 12;

const columns = ref<{ field: string; header: string }[]>([]);
const securities = ref<Security[]>([]);

const transformData = (apiData: any): Security[] => {
    const columns = apiData.securities.columns;
    const data = apiData.securities.data;

    return data.map((row: any[]) => {
        const obj: Partial<Security> = {};
        columns.forEach((col: string, index: number) => {
            obj[col as keyof Security] = row[index];
        });
        return obj as Security;
    });
};
const startTrain = () => {
    axios.get('/api/moex/securities')
        .then(res => {
            securities.value = transformData(res.data);
            console.log(res.data.securities.columns);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

const onRowDblClick = () => {

}

</script>

<style scoped>
:deep(.p-datatable-tbody > tr > td) {
    padding: 3px 10px;
}

</style>

