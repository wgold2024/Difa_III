<template>
    <div class="m-mobile_hide w-full h-full flex flex-col">
        <Splitter class="flex-1 h-full overflow-hidden">
            <SplitterPanel :size="15" :minSize="5" class="p-3 overflow-auto">
                <span class="p-component m-text text-lg text-center font-semibold mb-3 block">
                    Панель администратора
                </span>
                <div class="flex flex-col">
                    <Button v-for="(entity, index) in entities" :key="index" class="m-button mb-1" :class="{ 'm-button_active': entity.active }" outlined @click="setEntity(entity.api)">{{ entity.nameRus }}</Button>
                </div>
            </SplitterPanel>

            <SplitterPanel class="flex justify-center overflow-auto py-2" :size="85" :minSize="10">
                <div class="w-full">
                        <Toolbar class="w-[96%] ml-[2%] mb-2">
                            <template v-if="activeEntity.crud" #start>
                                <Button label="Добавить" icon="pi pi-plus" class="m-button-new mr-2" @click="addNew" />
                                <Button label="Изменить" icon="pi pi-pencil" class="mr-2" outlined @click="editRecord" :disabled="!(selectedData?.length === 1)" />
                                <Button label="Удалить" icon="pi pi-trash" severity="danger" variant="outlined" @click="deleteDatumDialog = true" :disabled="!selectedData || !selectedData.length" />
                            </template>

                            <template #suffix>
                                <InputIcon class="cursor-pointer" @click="strictSearch = !strictSearch">
                                    <i
                                        :class="strictSearch ? 'pi pi-equals cursor-pointer' : 'pi pi-arrow-right cursor-pointer'"
                                    />
                                </InputIcon>
                            </template>


                            <template #end>
                                <IconField>
                                    <InputIcon>
                                        <i class="pi pi-search" />
                                    </InputIcon>
                                    <InputText v-model="filters['global'].value" class="font-bold placeholder:font-normal" placeholder="Search..." />
                                    <InputIcon class="cursor-pointer" @click="deleteSearchString">
                                        <i class="pi pi-times" />
                                    </InputIcon>
                                </IconField>
                            </template>
                        </Toolbar>

                    <DataTable
                        ref="dt"
                        v-model:selection="selectedData"
                        :value="dataTable"
                        stripedRows
                        showGridlines
                        frozenHeader
                        scrollable
                        dataKey="id"
                        :paginator="true"
                        :rows="18"
                        :filters="filters"
                        :rowsPerPageOptions="[6, 12, 18, 24, 48, 96]"
                        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                        currentPageReportTemplate="Всего записей: {totalRecords}"
                        :sortField="sort.field"
                        :sortOrder="sort.direction"
                    >
                        <Column v-if="activeEntity.crud" selectionMode="multiple" style="width: 3rem" :exportable="false"></Column>
                        <Column v-for="(item, index) in columnsTable.filter(res => res.tableVisibility)" :key="item.field || index" field="table_search" :header="item.header" :sortable="item.sortable">
                            <template #body="{ data }">
                                <div v-if="Array.isArray(data[item.field])">
                                    <div v-for="item in data[item.field]" :key="item.id">
<!--                                        {{ item.breadcrumb_string }}-->
                                        <Breadcrumb :model="item.breadcrumb">
                                            <template #item="{ item }">
                                                <a href="javascript:void(0)" @click="onBreadcrumbClick(item)">
                                                    {{ item.label }}
                                                </a>
                                            </template>
                                        </Breadcrumb>
                                    </div>
                                </div>
                                <div v-else>
                                    {{ data[item.field] }}
                                </div>
                            </template>
                        </Column>
                    </DataTable>

                    <Dialog v-model:visible="dataDialog" :style="{ width: '450px' }" :header="'Данные ' + activeEntity?.nameRusAdd || ''" :modal="true" @hide="hideDialog">
                        <div class="flex flex-col items-center gap-3">
                            <div v-for="(column, index) in columnsTable" :key="index" class="w-3/4">
                                <div v-if="column.formVisibility">
                                    <div class="block">
                                        <label for="name" class="mb-1">{{ column.header }}</label>
                                        <span v-if="column.required"> *</span>
                                    </div>
                                    <div class="text-red-500 text-sm">
                                        {{ dataError[column.field] ? dataError[column.field][0] : '' }}
                                    </div>
                                    <InputText v-model="column.data" class="w-full"/>
                                </div>
                            </div>
                        </div>

                        <template #footer>
                            <div class="flex flex-col items-end w-full">
                                <div v-if="isSaveSuccess" class="text-green-600 self-center mb-5">
                                    <div v-if="mode === 'new'" class="text-center">Добавление прошло успешно</div>
                                    <div v-if="activeEntity.name === 'user' && selectedData && selectedData[0].id === user!!.id" class="text-center">Данные вашей учетной записи изменены, необходимо повторно войти в систему</div>
                                    <div v-else v-if="mode === 'edit'" class="text-center">Изменение прошло успешно</div>
                                </div>

                                <div class="flex gap-2">
                                    <Button label="Закрыть" icon="pi pi-times" text @click="hideDialog" />
                                    <Button v-if="mode === 'new'" label="Добавить" icon="pi pi-check" @click="saveData" :disabled="!isFormChanged" />
                                    <Button v-if="mode === 'edit'" label="Изменить" icon="pi pi-check" @click="updateData" :disabled="!isFormChanged" />
                                </div>
                            </div>
                        </template>
                    </Dialog>

                    <Dialog v-model:visible="deleteDatumDialog" :style="{ width: '450px' }" header="Предупреждение" :modal="true">
                        <div class="text-center mb-2">Подтвердите удаление:</div>
                        <div class="flex items-center">
                            <i class="pi pi-exclamation-triangle !text-3xl" />
                            <ul v-if="selectedData" class="ml-10 max-h-32 overflow-y-auto" style="min-width: 80%">
                                <li v-for="(data, index) in selectedData" :key="index">
                                    <del v-if="data.id === user!!.id"><i>{{ data.name }}</i></del>
                                    <i v-else>{{ data.name }}</i>
                                </li>
                            </ul>
                        </div>
                        <div v-if="deleteInfo" class="text-green-600 text-center">
                            {{ deleteInfo }}
                        </div>
                        <template #footer>
                            <Button label="Нет" icon="pi pi-times" text @click="deleteDatumDialog = false" severity="secondary" variant="text" autofocus/>
                            <Button label="Да" icon="pi pi-check" @click="deleteData" severity="danger" />
                        </template>
                    </Dialog>
                </div>
            </SplitterPanel>
        </Splitter>
    </div>
</template>

<script lang="ts" setup>
import Button from "primevue/button";
import Splitter from 'primevue/splitter';
import SplitterPanel from 'primevue/splitterpanel';
import Toolbar from 'primevue/toolbar';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Dialog from 'primevue/dialog'
import Breadcrumb from 'primevue/breadcrumb';


import { FilterMatchMode } from '@primevue/core/api';

import axios from "axios";
import {computed, onMounted, ref} from "vue";
import { Entity, ColumnsEntity, ColumnTable } from "@/types";
import useAuth from "@/composables/useAuth";
import router from "@/router";

const { authenticated, user } = useAuth()

const entities = ref<Entity[]>([
    { name: 'user-group', nameRus: 'Группы', nameRusAdd: 'группы', api: 'user-groups', active: false, crud: true },
    // { name: 'role', nameRus: 'Роли', nameRusAdd: 'роли' , api: 'role',  active: false, crud: true },
    { name: 'user', nameRus: 'Пользователи', nameRusAdd: 'пользователя', api: 'users',  active: false, crud: true },
    { name: 'session', nameRus: 'Активность', nameRusAdd: 'сессию', api: 'sessions',  active: false, crud: false },
    { name: 'user-activity', nameRus: 'История', nameRusAdd: '', api: 'user-activities',  active: false, crud: false },
])

const dt = ref();
const dataTable = ref();
const selectedData = ref<ColumnsEntity[] | null>(null)
const columnsTable = ref<ColumnTable[]>([]);
const dataDialog = ref(false);
const isSaveSuccess = ref<boolean>(false);
const dataError = ref<ColumnsEntity>([]);
const mode = ref<'new' | 'edit'>();
const deleteDatumDialog = ref(false);
const deleteInfo = ref<string | null>(null);
const originalData = ref<ColumnsEntity>({});

const activeEntity = computed(() => {
    return entities.value.find(res => res.active === true) || entities.value[2]
})

const isFormChanged = computed(() => {
    if (!originalData.value) return false
    return columnsTable.value.some(col => col.data !== originalData.value[col.field])
})

const sort = computed(() => {
    return {
        'field': columnsTable.value.find(res => res.sorted)?.field || 'id',
        'direction': columnsTable.value.find(res => res.sorted)?.sortDirection === 'desc' ? -1 : 1,
    }
})

onMounted(() => {

    // Установка отображаетмой сущности по умолчанию
    setEntity('users')
})

const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
});

const setEntity = (api: string) => {
    const entity = entities.value.find(res => res.api === api)
    if (!entity) return
    for (const entity of entities.value) {
        entity.active = false
    }
    entity.active = true

    getEntity()
}

const getEntity = () => {
    dataTable.value = null
    columnsTable.value = []

    axios.get(`/api/admin/${activeEntity.value.api}`)
        .then(res => {
            columnsTable.value = res.data.columns;
            dataTable.value = res.data.data;
            console.log(res);
        })
};

const addNew = () => {
    mode.value = 'new'

    // Очистка полей формы
    columnsTable.value.forEach((item) => {
        // item.data = ''
    })
    dataError.value = []

    originalData.value = {}
    columnsTable.value.forEach(col => {
        originalData.value[col.field] = col.data
    })

    dataDialog.value = true;
};

const saveData = () => {
    isSaveSuccess.value = false
    const data: ColumnsEntity = {}
    for (const column of columnsTable.value) {
        data[column.field] = column.data
    }

    axios.post(`/api/admin/${activeEntity.value?.api}`,
        data
    // {
    //         id: 2000,
    //         name: 'test',
    //         email: 'r@r.com',
    //         password: '12345678',
    //         password_confirmation: '12345678',
    //       }
    )
        .then(res => {
            isSaveSuccess.value = true
            dataError.value = []
        })
        .catch(err => {
            isSaveSuccess.value = false
            dataError.value = err.response.data.errors
        })
}

const editRecord = () => {
    mode.value = 'edit'
    dataError.value = []
    columnsTable.value.forEach((item) => {
        item.data = selectedData.value!![0][item.field]
    })
    dataDialog.value = true;

    originalData.value = {}
    columnsTable.value.forEach(col => {
        originalData.value[col.field] = col.data
    })
}

const updateData = () => {
    isSaveSuccess.value = false
    dataError.value = []
    const data: ColumnsEntity = {}
    for (const column of columnsTable.value) {
        data[column.field] = column.data
    }

    axios.patch(`/api/admin/${activeEntity.value?.api}/${data.id}`,
        data
    )
        .then(res => {
            isSaveSuccess.value = true
            dataError.value = []
        })
        .catch(err => {
            isSaveSuccess.value = false
            dataError.value = err.response.data.errors
        })
}

const deleteData = async () => {
    if (!selectedData.value || selectedData.value.length === 0) {
        return;
    }

    try {
        await Promise.all(
            selectedData.value.map(async (item) => {
                if (item.id === user.value?.id) {
                    deleteInfo.value = `Нельзя удалить самого себя: ${item.name}`;
                    return;
                }

                try {
                    deleteInfo.value = null;
                    const res = await axios.delete(`/api/admin/${activeEntity.value?.api}/${item.id}`);
                    deleteInfo.value = res.data.message + ': ' + item.name;
                } catch (err) {
                    deleteInfo.value = `Ошибка удаления ${item.name}: ${err}`;
                }
            })
        );

        setTimeout(() => {
            selectedData.value = null;
            deleteInfo.value = null;
            deleteDatumDialog.value = false;
            getEntity()
        }, 1000)
    } catch (err) {
        console.error(err);
    }
};
const hideDialog = () => {
    if (
        activeEntity.value?.name === 'user' &&
        mode.value === 'edit' &&
        selectedData.value?.length &&
        selectedData.value[0].id === user.value?.id &&
        isSaveSuccess.value
    ) {
        axios.post('/logout')
            .then(() => {
                router.push({ name: 'login' })
            })
            .catch(err => {
                console.error('Ошибка при logout:', err)
            })
    } else {
        getEntity()
        dataDialog.value = false
        isSaveSuccess.value = false
        selectedData.value = null
    }
}

const onBreadcrumbClick = (crumb) => {
    filters.value['global'].value = crumb.label;
};

const deleteSearchString = () => {
    filters.value['global'].value = null;
};

</script>

<style scoped>
.m-text {
    color: var(--custom-first-color) !important;
}

.m-button {
    padding-top: 5px;
    padding-bottom: 5px;
}

.m-button_active {
    border-color: var(--custom-second-color);
    color: var(--custom-second-color);
}

.m-button-new {
    background-color:  var(--custom-first-color);
}

:deep(.p-datatable-header-cell) {
    color: var(--custom-second-color);
    background-color: var(--custom-gray-color);
    padding-top: 7px;
    padding-bottom: 7px;
}

:deep([role="cell"]) {
    padding-top: 4.5px;
    padding-bottom: 4.5px;
}

:deep(.p-select-label) {
    padding-top: 5px;
    padding-bottom: 5px;
}

:deep(.p-paginator-content) {
    display: flex;
    align-items: center;
    width: 100%;
}

:deep(.p-paginator-current) {
    margin-right: auto;
}

:deep(.p-datatable) {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    height: 100%;
    width: 100%;
    padding-bottom: 90px;
}

:deep(.p-datatable-table-container) {
    width: 100%;
}

:deep(.p-paginator) {
    margin-left: 10%;
    width: 80%;
    border: 1px solid transparent !important;
}

:deep(.p-datatable-paginator-bottom) {
    margin-top: 15px;
    width: 110%;
    border: 1px solid var(--custom-gray-color) !important;
}

:deep(.p-toolbar) {
   border: none;
}

:deep(.p-breadcrumb.p-component) {
    background-color: transparent;
    padding: 0;
}

:deep(.p-breadcrumb-item-link) {
    cursor: default;
}

</style>

