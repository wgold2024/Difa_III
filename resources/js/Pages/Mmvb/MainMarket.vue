<template>
    <div class="m-mobile_hide items-start w-full px-1 py-10">
        <div class="flex justify-center mb-10">
            <Button type="submit" @click="startTrain" label="Получить данные" />
        </div>
        <div>
            <DataTable
                :value="securities"
                paginator
                :rows="10"
                :rowsPerPageOptions="[5, 10, 20]"
                tableStyle="min-width: 50rem"
            >
                <Column field="secid" header="ID" sortable></Column>
                <Column field="shortname" header="Краткое название" sortable></Column>
                <Column field="name" header="Название" sortable></Column>
                <Column field="type" header="Тип" sortable></Column>
                <Column field="group" header="Группа" sortable></Column>
                <Column field="is_traded" header="Торгуется" sortable>
                    <template #body="{ data }">
                        {{ data.is_traded ? 'Да' : 'Нет' }}
                    </template>
                </Column>
                <Column field="emitent_id" header="emitent_id" sortable />
                <Column field="emitent_title" header="emitent_title" sortable />
            </DataTable>
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

