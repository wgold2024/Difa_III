<template>
<!--    <Button severity="info" label="Создать акт комиссионного разбора" @click.prevent="" />-->
<!--    <ToggleSwitch></ToggleSwitch>-->
    <div class="items-start w-full px-1 py-10">
        <div class="flex justify-center mb-10">
            <Button type="submit" @click="createAct" label="Создать акт комиссионного разбора" />
        </div>
        <div>
            <DataTable :value="dataTable" stripedRows selectionMode="single" dataKey="id" @row-dblclick="onRowDblClick " showGridlines tableStyle="min-width: 50rem"
                       paginator :rows="rowNumbers" :rowsPerPageOptions="[rowNumbers]"
                       paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
                       currentPageReportTemplate="{first} to {last} of {totalRecords}"
            >
                <Column field="id" header="№"  bodyStyle="text-align:center"></Column>
                <Column field="op" header="Подразделение" ></Column>
                <Column field="field" header="Месторождение" ></Column>
                <Column field="cluster" header="Куст" ></Column>
                <Column field="well" header="Скважина" ></Column>
                <Column field="created_at" header="Дата создания" ></Column>
                <Column field="updated_at" header="Дата изменения" ></Column>
                <Column field="user_name" header="Пользователь" headerStyle="text-align:center"></Column>
                <Column field="user_email" header="Email" ></Column>
            </DataTable>
        </div>
    </div>


<!--    <div class="flex justify-content-between w-full px-3">-->
<!--        <div>-->
<!--&lt;!&ndash;            <router-link :to="{name: 'layout.act', params: { id: +selectedRow.id }}">&ndash;&gt;-->
<!--&lt;!&ndash;                <Button severity="info" label="Открыть акт" :disabled="disabled" class="mr-3"/>&ndash;&gt;-->
<!--&lt;!&ndash;            </router-link>&ndash;&gt;-->
<!--&lt;!&ndash;            <Button severity="info" label="Удалить акт" @click="confirmDeleteAct(selectedRow.id)" :disabled="disabled" />&ndash;&gt;-->
<!--        </div>-->
<!--&lt;!&ndash;        <div v-if="$props.currentUserProp.id === adminId || $props.currentUserProp.id === zolotId" class="input-switch-container">&ndash;&gt;-->
<!--&lt;!&ndash;            <label for="inputSwitch" class="mr-3">Показать все акты</label>&ndash;&gt;-->
<!--&lt;!&ndash;            <InputSwitch id="inputSwitch" v-model="isAllActs" @change="filterActs" />&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--    </div>-->
</template>

<script lang="ts" setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from "primevue/button";
import ToggleSwitch from 'primevue/toggleswitch';
import router from "@/router";
import axios from "axios";
import { ref, onMounted } from "vue";
import { Input } from "@/types";
import type { DataTableRowClickEvent } from 'primevue/datatable';
import useAuth from '@/composables/useAuth.js'

const { inputObj } = useAuth();

const createAct = () => {
    router.push({ name: "act-tabs" })
}

const dataTable = ref<Array<Input>>();

const rowNumbers = 12;

onMounted(() => {
    index()
});

const index = () => {
    axios.get('/api/input')
        .then(res => {
            dataTable.value = res.data;

            // Добавление пустых строк до кратности 10, чтобы зафиксировать пагинатор
            const currentCount = dataTable.value?.length;
            const remainder = currentCount ? currentCount % rowNumbers : rowNumbers;
            const emptyRowsNeeded = remainder === 0 ? 0 : rowNumbers - remainder;
            for (let i = 0; i < emptyRowsNeeded; i++) {
                dataTable.value?.push(inputObj);
            }
            // -

            // for (const record of  res.data.data) {
            //     const obj = {};
            //     obj.id = record.id;
            //     obj.name = record.op;
            //     obj.field = record.field;
            //     obj.cluster = record.cluster;
            //     obj.well = record.well;
            //     obj.created_at = new Date(record.created_at).toLocaleString();
            //     obj.updated_at = new Date(record.updated_at).toLocaleString();
            //     obj.user_id = record.user_id
            //     obj.user_name = record.user_name
            //     obj.user_email = record.user_email
            //     this.table.push(obj);
            // }
            // this.getCurrentUser();
        })
}

const onRowDblClick = (event: DataTableRowClickEvent) => {
    router.push({ name: "act-tabs", params: { id: event.data.id } })
};

</script>

<style scoped>
:deep(.p-paginator-rpp-dropdown) {
    display: none;
}

:deep([role="cell"]) {
    padding-top: 10px;
    padding-bottom: 10px;
    height: 45px;
}

:deep(.p-datatable-header-cell) {
    //text-align: center;
    color: rgba(243, 112, 33, 1);
    background-color: rgba(204, 212, 219, 0.2);
}

:deep(.p-datatable-column-header-content) {
    //display: flex;
    justify-content: center;
}
</style>


