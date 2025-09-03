<template>
    <div class="flex gap-5 justify-start items-end mb-5 relative">
        <div>
            <div class="mb-1">Инструмент</div>
            <Select v-model="security" :options="values.getSecurity()" optionLabel="name" optionValue="value" placeholder="Выберите инструмент" style="width: 250px"  @change="updateRequest" />
        </div>
        <div>
            <div class="mb-1">Интервал</div>
            <Select v-model="interval" :options="values.getInterval()" optionLabel="name" optionValue="value" placeholder="Выберите интервал" style="width: 250px" @change="updateRequest" />
        </div>
        <div>
            <div class="mb-1">Дата начала</div>
            <DatePicker v-model="startDate" dateFormat="dd.mm.yy" showIcon class="w-full"  placeholder="Выберите дату" />
        </div>
        <div class="absolute right-2">
            <Button type="submit" @click="updateRequest" label="Получить данные" />
        </div>
    </div>

    <DataTable
        :value="securities"
        scrollable
        scrollHeight="40rem"
        :rows="10"
        :rowsPerPageOptions="[5, 10, 20]"
        tableStyle="min-width: 50rem"
    >
        <Column field="number" header="№" :sortable="true" style="width: 100px" >
            <template #body="{ data }">
                {{ data.number }}
            </template>
        </Column>
        <Column field="open" header="Open" sortable="true"></Column>
        <Column field="close" header="Close" sortable="true"></Column>
        <Column field="high" header="High" sortable="true"></Column>
        <Column field="low" header="Low" sortable="true"></Column>
        <Column field="value" header="Value" sortable="true"></Column>
        <Column field="volume" header="Volume" sortable="true"></Column>
        <Column field="begin" header="Begin" sortable="true"></Column>
        <Column field="end" header="End" sortable="true"></Column>
    </DataTable>
</template>

<script lang="ts" setup>
import Button from "primevue/button";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Select from "primevue/select";
import { values } from "@/Pages/Mmvb/data";
import { ref } from "vue";
import axios from "axios";
import {Security} from "@/types/mmvb";
import DatePicker from "primevue/datepicker";

const security = ref('USDRUBF')
const interval = ref(24)
const startDate = ref(new Date('2025-01-01'));
const securities = ref<Security[]>([]);



const updateRequest = () => {
    const d = new Date(startDate.value);
    const year = d.getFullYear();
    const month = String(d.getMonth() + 1).padStart(2, '0');
    const day = String(d.getDate()).padStart(2, '0');
    let date = `${year}-${month}-${day}`;

    // console.log(interval.value, security.value, date)

    axios.get('/api/mmvb/candles', {
        params: {
            security: security.value,
            interval: interval.value,
            from: date
        }
    })
        .then(res => {
            securities.value = transformData(res.data);
            console.log(res.data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

const transformData = (apiData: any): Security[] => {
    const columns = apiData.candles.columns;
    const data = apiData.candles.data;

    return data.map((row: any[], index: number) => {
        const obj: Partial<Security> = {
            number: index + 1
        };

        columns.forEach((col: string, colIndex: number) => {
            obj[col as keyof Security] = row[colIndex];
        });

        return obj as Security;
    });
};

</script>

<style scoped>


</style>

