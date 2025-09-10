<template>
    <Toast />
    <Accordion value="0" class="mb-4">
        <AccordionPanel value="0">
            <AccordionHeader>Общая информация</AccordionHeader>
            <AccordionContent>
                <div class="grid grid-cols-5 gap-x-1 gap-y-2 mb-2">
                    <div v-for="(component, index) in commonComponents" :key="index" class="mr-5">
                        <div v-if="component.type=='string'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <InputText v-model="defectDataMap[component.id] as unknown as string" :id="component.id" placeholder="Введите значение" class="w-full"/>
                        </div>
                        <div v-if="component.type=='number'"  class="w-full text-center">
                            <div class="mb-1">{{ component.name }}, {{ component.measure_unit }}</div>
                            <InputNumber v-model="defectDataMap[component.id] as unknown as number" :id="component.id" :min="0" :minFractionDigits="1" locale="ru-RU" placeholder="Введите число" class="w-1/2"/>
                        </div>
                        <div v-if="component.type=='select'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <Select v-model="defectDataMap[component.id]" :options="component.values" :id="component.id" optionLabel="name" optionValue="name" placeholder="Выберите значение" class="w-full" />
                        </div>
                        <div v-if="component.type=='boolean'" class="w-full text-center">
                            <div class="mb-3">
                                <Checkbox v-model="defectDataMap[component.id]" :binary="true" :value="component.id" :id="component.id" name="defect" />
                                <label :for="'label' + String(component.id)" class="ml-2">{{ component.name + ' (id = ' + component.id + ')' }}</label>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Выводим сгруппированные компоненты -->
                <Fieldset
                    v-for="(group, groupId) in commonGroupedComponents"
                    v-if="defectGroupsMap.size > 0"
                    :key="groupId"
                    :legend="getGroupName(groupId)"
                    style="margin-bottom: 10px;"
                >
                    <div class="flex justify-around"> <!-- Основной flex-контейнер -->
                        <div v-for="component in group" :key="component.id" class="flex items-center bg-white px-5 py-3 border border-r rounded-lg"
                            style="border-color: var(--novomet-light-gray-blue-800)"> <!-- Элемент группы -->
                            <Checkbox
                                v-model="defectDataMap[component.id]"
                                :binary="true"
                                :value="component.id"
                                :id="'label' + component.id"
                                name="defect"
                                class="mr-2"
                            />
                            <label :for="'label' + component.id">
                                {{ component.name }} (id = {{ component.id }})
                            </label>
                        </div>
                    </div>
                </Fieldset>
            </AccordionContent>
        </AccordionPanel>
    </Accordion>
<!--    <Panel header="Общая информация" class="mb-3 px-3" >-->
<!--        <div class="flex justify-content-end align-items-center">-->
<!--            <div v-for="(component, index) in commonComponents" :key="index" class="mr-5">-->
<!--                <div class="mb-1">{{ component.name }}</div>-->
<!--                <InputText placeholder="Введите значение" :class="{'p-invalid': false}"/>-->
<!--            </div>-->
<!--        </div>-->
<!--    </Panel>-->

    <div class="flex justify-between">
        <div class="flex flex-col w-1/4 p-1">
            <ScrollPanel class="mr-3 pr-4" style="width: 100%; height: 57vh; z-index: 0">
                <div v-for="(detail, index) in buttons" :key="index">
                    <Button :id="'btn' + index" :label="detail.name" severity="secondary" variant="outlined" class="w-full mb-1" :class="{ 'active': activeBtn === index, 'm-hidden': isBtnHidden[index] }" @click="btnDetailChange(index)"/>
                </div>
            </ScrollPanel>
        </div>
        <div  v-if="true" class="w-3/4 p-1">
            <ScrollPanel class="mr-3" style="width: 100%; height: 57vh; z-index: 0">
                <Card  v-for="(component, index) in btnComponents as Defect[]" :key="index" class="mb-1" style="overflow: hidden">
                    <template #content>
                        <div class="flex justify-between p-1">
                            <div class="flex justify-between w-full">
                                <img
                                    v-lazy
                                    :data-src="defectImage(component.id)"
                                    :alt="`&nbsp;Ждем фото, id = ${component.id}`"
                                    :key="component.id"
                                    class="border border-r rounded-lg mr-3"
                                    style="min-width: 350px; max-width: 350px; height: 300px; object-fit: cover;"
                                >
                                <div class="mr-3 flex flex-col justify-stretch w-full">
                                    <div>
                                        <div class="flex justify-between items-center">
                                            <div class="mb-3">
                                                <Checkbox v-model="defectDataMap[component.id]" :binary="true" :value="component.id" :id="'label' + String(component.id)" name="defect" :disabled="false && defectDataMap[idInNorm] ? idInNorm !== component.id : false"/>
                                                <label :for="'label' + String(component.id)" class="ml-2">{{ component.name + ' (id = ' + component.id + ')'}}</label>
                                            </div>
                                            <Button label="Возможные причины" text raised severity="secondary" @click="isReasonVisible[component.id] = !isReasonVisible[component.id]" class="mb-2" :class="{ 'm-hidden': component.name === 'В норме'}"/>
                                        </div>
                                        <p class="mb-2">
                                            {{ component.description }}
                                        </p>
                                        <div :id="String(component.id)" v-if="component.group_id && optionComponents.filter(res => res.group_id === component.group_id).length > 0" :class="{ 'm-hidden': !defectDataMap[component.id] }" class="p-2 mb-2 border border-r rounded-lg" style="border-color: var(--novomet-light-gray-blue-1000)">
                                            <div class="grid grid-cols-3 gap-x-10 gap-y-2">
                                                <div v-for="(item, index) in optionComponents.filter(res => res.group_id === component.group_id)" :key="index">
                                                    <div v-if="item.type=='string'" >
                                                        <div class="mb-1">{{ item.name }}</div>
                                                        <div class="mb-1" style="color: var(--novomet-orange-1000)">{{ item.hint }}</div>
                                                        <InputText v-model="defectDataMap[item.id] as unknown as string" placeholder="Введите значение" class="w-full"/>
                                                    </div>
                                                    <div v-if="item.type=='number'"  class="w-full text-center">
                                                        <div class="mb-1">{{ item.name }}, {{ item.measure_unit }}</div>
                                                        <InputNumber v-model="defectDataMap[item.id] as unknown as number" :min="0" :minFractionDigits="1" placeholder="Введите число" class="w-full"/>
                                                    </div>
                                                    <div v-if="item.type=='select' && filteredOptions(item.values).length > 0" >
                                                        <div class="mb-1">{{ item.name }}</div>
<!--                                                        <Select
                                                            v-model="defectDataMap[item.id]"
                                                            :options="item.values.filter(res => res.visibility_defect_id === '0' || res.visibility_defect_value === defectDataMap[res.visibility_defect_id])"
                                                            optionLabel="name" optionValue="name"
                                                            placeholder="Выберите значение" class="w-full"
                                                        />-->
                                                        <Select
                                                            v-model="defectDataMap[item.id]"
                                                            :options = filteredOptions(item.values)
                                                            optionLabel="name" optionValue="name"
                                                            placeholder="Выберите значение" class="w-full"
                                                        />
                                                    </div>
                                                    <div v-if="item.type=='boolean'" class="w-full text-center">
                                                        <div class="mb-3 flex mt-3">
                                                            <Checkbox v-model="defectDataMap[item.id]" :binary="true" :value="item.id" :id="'label' + String(item.id)" name="defect" />
                                                            <label :for="'label' + String(item.id)" class="ml-2">{{ item.name + ' (id = ' + item.id + ')' }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <Dialog v-model:visible="isReasonVisible[component.id]" modal header="Возможные причины" :style="{ width: '50vw' }">
                                            <p class="mb-2">
                                                {{ component.reason }}
                                            </p>
                                        </Dialog>
                                    </div>
                                    <div class="flex-1 min-h-[100px]" >
                                        <textarea v-model="defectDataMapComment[component.id]  as unknown as string" class="w-full h-full p-2 border border-r rounded-lg" style="resize: none; outline: none; border-color: var(--novomet-light-gray-blue-1000)" placeholder="Введите комментарий"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="w-[400px] min-h-[200px] flex flex-col justify-between" >
                                <div v-if="isAiActive[component.id]" class="flex justify-center items-center h-full border border-r rounded-lg mb-2" style="color: var(--novomet-black-800); border-color: var(--novomet-light-gray-blue-1000)">
                                    <div class="w-1/2 text-center">
                                        <i class="pi pi-spin pi-cog mb-3" style="font-size: 3rem; color: var(--novomet-orange-600)"></i>
                                        <div class="text-lg">Подождите идет анализ изображения</div>
                                    </div>
                                </div>
                                <div v-else class="h-full mb-2">
                                    <div v-if="Object.keys(defectDataMapImages[component.id] ?? {}).length > 0">
                                        <Galleria :value="defectDataMapImages[component.id] as unknown as any[] || []"
                                                  v-model:active-index="galleryIndex[component.id]"
                                                  :numVisible="5" containerStyle="max-width: 640px"
                                                  :showItemNavigators="true" :showThumbnails="false">
                                            <template #item="slotProps">
                                                <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" style="width: 100%; max-height: 240px; object-position: center; object-fit: cover; display: block;" />
                                            </template>
                                        </Galleria>
                                    </div>
                                    <div v-else class="flex justify-center items-center h-full text-gray-700 border border-r rounded-lg" style="color: var(--novomet-black-400); border-color: var(--novomet-light-gray-blue-1000)">
                                        <div class="w-1/2 text-center">Добавьте изображения дефектов</div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <input type="file"  :ref="(el) => fileInputs['fileInput' + String(component.id)] = el as HTMLInputElement | null" multiple class="file-upload-button" @change="setImages(component.id, $event)" style="display: none">
                                    <input type="file"  :ref="(el) => fileInputs['fileInputAI' + String(component.id)] = el as HTMLInputElement | null" class="file-upload-button" @change="setImagesAI(component.id, $event)" style="display: none">
                                    <div>
                                        <Button icon="pi pi-plus" class="w-[35%] mr-1" severity="primary" @click="addImages(component.id)" outlined />
                                        <Button
                                            v-show="false"
                                            v-if="component.detail_id === 2 || component.detail_id === 4 || component.detail_id === 5 || component.detail_id === 6  || component.detail_id === 7"
                                            class="w-[50%]" severity="primary" @click="addImagesAI(component.id)" outlined style="padding-left: 5px;"
                                        >
                                            <span style="position: relative; left: 7px; top: -10px;">+</span>
                                            AI
                                        </Button>
                                    </div>
                                    <div
                                        v-if="Object.keys(defectDataMapImages[component.id] ?? {}).length > 0"
                                        class="text-gray-700 font-bold"
                                        style="color: var(--novomet-navy-blue-600)"
                                    >
                                        {{ (galleryIndex[component.id] ?? 0) + 1 }} / {{ Object.keys(defectDataMapImages[component.id] ?? {}).length }}
                                    </div>
                                    <Button icon="pi pi-minus" class="w-[35%]" severity="primary" @click="deleteImage(component.id)" outlined/>
                                </div>
                            </div>
                        </div>
                    </template>
                </Card>
            </ScrollPanel>
        </div>
    </div>
</template>

<script lang="ts" setup>
import {ref, defineProps, onMounted, computed, PropType, watch, watchEffect, defineEmits} from "vue";
import Accordion from 'primevue/accordion';
import AccordionPanel from 'primevue/accordionpanel';
import AccordionHeader from 'primevue/accordionheader';
import AccordionContent from 'primevue/accordioncontent';
import Button from 'primevue/button';
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import Select from "primevue/select";
import Card from 'primevue/card';
import ScrollPanel from 'primevue/scrollpanel';
import Checkbox from 'primevue/checkbox';
import Dialog from 'primevue/dialog';
import Textarea from 'primevue/textarea';
import {
    Detail,
    Defect,
    DefectDataMap,
    Value,
    Data,
    SectionData,
    DefectData,
    DefectDataMapImages,
    ImageData,
    Image, DefectGroup
} from "@/types";
import Galleria from 'primevue/galleria';
import { PhotoService } from "@/servicies/PhotoService";

import Fieldset from 'primevue/fieldset';
import axios from "axios";
import {toRaw} from "vue/dist/vue";
// import {locations} from "@/data";

// const model = defineModel()

import Toast from 'primevue/toast';
import { h } from 'vue';

import { useConfirm } from "primevue/useconfirm";
import { useToast } from 'primevue/usetoast';

const confirm = useConfirm();
const toast = useToast();


const props = defineProps<{
    details?: Detail[];
    sectionNumber: number;
    sectionData: SectionData[] | null;
    defectGroups: DefectGroup[];
    unit: 'Input' | 'Pump' | 'Motor' | 'Mpp';
}>();


onMounted(() => {
    // console.log(props.sectionNumber);
    // PhotoService.getImages().then((data: ImageData[]) => ((defectDataMapImages.value[21] as unknown as ImageData[]) = data));
    // PhotoService.getImages().then((data: ImageData[]) => ((defectDataMapImages.value[21]) = data));
    // console.log('onMounted', defectDataMapImages.value)

})

const activeBtn = ref<number>(0);
const btnComponents = ref<Defect[] | null>(null);
// const optionComponents = ref<Defect[]>([]);
const isReasonVisible = ref<boolean[]>([]);
const defectDataMap = ref<DefectDataMap[]>([]);
const defectDataMapComment = ref<DefectDataMap[]>([]);
const defectDataMapImages = ref<DefectDataMapImages>({});
const defectDataMapDelImages = ref<DefectDataMapImages>({});
const fileInputs = ref<{[key: string]: HTMLInputElement | null}>({});
const isBtnHidden = ref<boolean[]>([]);


// const defectDataMap = defineModel<defectDataMap[]>({
//     default: () => [] as defectDataMap[]
// })

const galleryIndex = ref<number[]>([])
const isImagesUpdating = ref(false)
const isAiActive = ref<boolean[]>([])

const data = defineModel<Data[]>({
    default: () => [] as Data[]
})

const sectionData = ref<SectionData>()
const sectionNumber = ref<number>(props.sectionNumber)

const buttons = computed<Detail[]>(() => {
    return props.details?.filter((res: Detail) => res.name !== 'Общая информация') ?? [];
});

const commonComponents = computed<Defect[]>(() => {
    // console.log('props.details', props.details);
    const data = props.details?.find((res: Detail) => res.name === 'Общая информация');
    // console.log('defects', data?.defects ?? []);
    return data?.defects.filter(res => res.group_id === null) ?? []; // Вернёт пустой массив если defects нет
});

const commonGroupedComponents = computed(() => {
    const data = props.details?.find(d => d.name === 'Общая информация');
    const defects = data?.defects.filter(d => d.group_id !== null) ?? [];

    return defects.reduce((acc, defect) => {
        const groupId = defect.group_id!;
        acc[groupId] = acc[groupId] || [];
        acc[groupId].push(defect);
        return acc;
    }, {} as Record<number, Defect[]>);
});

const defectGroupsMap = computed(() => {
    const map = new Map();
    props.defectGroups.forEach(item => map.set(item.id, item.name));

    return map;
});

const getGroupName = (groupId: number) => {
    // console.log('props.defectGroups', props.defectGroups);
    // console.log('props.defectGroups', props.defectGroups.find((res: DefectGroup) => res.id == groupId).name);

    return props.defectGroups.find((res: DefectGroup) => res.id == groupId)?.name || `Группа ${groupId}`;
};

const filteredOptions = (item: Value[]) => {
    return item.filter(res =>
        res.visibility_defect_id === 0 ||
        res.visibility_defect_value === defectDataMap.value[res.visibility_defect_id] )
}


// const optionComponents = (groupId: number) => {
//     computed<Defect[]>(() => {
//         console.log(props.details[activeBtn + 1].defects.filter(res => res.is_option && res.group_id === groupId));
//         return props.details[activeBtn + 1].defects.filter(res => res.is_option && res.group_id === groupId)
//     })
// }

// const optionComponents = computed<Defect[]>(() => {
//     // console.log(props.details[activeBtn + 1].defects.filter(res => res.is_option && res.group_id === 5));
//     if ((props.details?.[activeBtn + 1]?.defects as Defect[] | undefined)?.length) {
//         console.log(props.details[activeBtn + 1].defects.filter(res => res.group_id === 5))
//         return props.details[activeBtn + 1].defects.filter(res => res.group_id === 5)
//     } else {
//         return []
//     }
// })
const optionComponents = computed<Defect[]>(() => {
    const targetItem = props.details?.[activeBtn.value + 1];
    if (!targetItem?.defects) return [];

    // console.log(targetItem.defects.filter(res => res.is_option));

    return targetItem.defects.filter(res => res.is_option);
})

// const defectImage = (componentId: number) => {
//     return `http://localhost:8000/storage/img/defects/${componentId}.png`
// }

const defectImageCache = new Map<number, string>();
const defectImage = (componentId: number) => {
    if (defectImageCache.has(componentId)) {
        return defectImageCache.get(componentId)!;
    }

    const url = `/storage/img/defects/${componentId}.png`;
    defectImageCache.set(componentId, url);

    return url;
};


// const getOptionComponents = () => {
//     const data = props.details[activeBtn.value + 1].defects.filter(res => res.is_option)
//     console.log(data)
//     return data
// }

const btnDetailChange = (index: number) => {
    activeBtn.value = index;
    if (props.details?.length) {
        btnComponents.value = props.details[index + 1].defects.filter(res => !res.is_option && res.id < 10000) //33

    }
    // Отображение изображений дефектов
}

const idInNorm = computed(() => {
    return btnComponents.value?.find(res => res.name === 'В норме')?.id ?? 0
})

const disabledElement = () => {
    const idInNorm: number = btnComponents.value?.find(res => res.name === 'В норме')?.id ?? 0
    // console.log('idInNorm', idInNorm);
    // console.log('defectDataMap', defectDataMap.value[idInNorm] ?? false);
    return defectDataMap.value[idInNorm] ?? false
}

const addImages = (defectId: number) => {
    // Иммитируем клик для скрытого элемента Input - file, и, соотвественно вызываем другую функцию setImages()
    const fileInput = fileInputs.value['fileInput' + String(defectId)];

    if (!fileInput) return

    fileInput.value = '' // Сбрасываем значение, чтобы можно было выбирать те же файлы повторно
    fileInput.click() // Триггерим клик по скрытому input
};

const setImages = (defectId: number, event: Event) => {
    const files = (event.target as HTMLInputElement).files

    if (files === null) return

    for (const file of files ) {
        attachImage(defectId, file)
    }
}

const addImagesAI = (defectId: number) => {
    // Иммитируем клик для скрытого элемента Input - file, и, соотвественно вызываем другую функцию setImages()
    const fileInput = fileInputs.value['fileInputAI' + String(defectId)];

    if (!fileInput) return

    fileInput.value = '' // Сбрасываем значение, чтобы можно было выбирать те же файлы повторно
    fileInput.click() // Триггерим клик по скрытому input
};

const setImagesAI = (defectId: number, event: Event) => {
    isAiActive.value[defectId] = true
    // console.log("event", event);

    const files: FileList | null = (event.target as HTMLInputElement).files;

    if (files === null) return

    axios.post('/api/ai-image',{
        image: files.length > 0 ? files : null,
        defectId
    }, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
        .then(res => {
            isAiActive.value[defectId] = false
            // console.log(res.data);
            if (res.data.result) {
                toast.add({
                    severity: 'info',
                    summary: 'Изображение принято',
                    detail: `Класс: ${res.data.class}\nДеталь: ${res.data.detail}`,
                    life: 5000,
                });
                attachImage(defectId, files[0])
            } else {
                confirm.require({
                    message: `Анализ показал, что изображение не относится к детали: ${res.data.detail.toLowerCase()}.\n` +
                        `Полученные класс: ${res.data.class}. Принять принудительно?`,
                    header: 'Подтверждение действия',
                    icon: 'pi pi-exclamation-triangle',
                    acceptLabel: 'Да',
                    rejectLabel: 'Нет',
                    rejectProps: {
                        severity: 'secondary',
                    },
                    acceptProps: {
                        severity: 'secondary',
                        outlined: true
                    },
                    accept: () => {
                        attachImage(defectId, files[0])
                    },
                    reject: () => {

                    }
                });
            }
        })
        .catch(e => {
            const serverError = e.response?.data?.error || e.response?.data?.message || JSON.stringify(e.response?.data?.errors) || e.message;
            toast.add({
                severity: 'error',
                summary: 'Ошибка на сервере',
                detail: `${serverError}`,
                life: 3000,
            });
        })
}

const attachImage = (defectId: number, image: File) => {
    let obj = {
        itemImageSrc: URL.createObjectURL(image),
        file: image
    }

    if (!defectDataMapImages.value[defectId]) {
        defectDataMapImages.value[defectId] = [];
    }
    (defectDataMapImages.value[defectId] as Array<any>).push(obj);

    // Установка индекса галереи для отображения последнего добавленного изображения
    galleryIndex.value[defectId] = defectDataMapImages.value[defectId].length - 1
}

const deleteImage = (defectId: number) => {
    isImagesUpdating.value = true;
    let index: number = 0
    if (galleryIndex.value[defectId] !== undefined) {
        index = galleryIndex.value[defectId];
        index !== 0 ? galleryIndex.value[defectId] = index - 1 : null;
    }

    const deletedImages = defectDataMapImages.value[defectId][index]
    // console.log('deletedImages', deletedImages)
    if (deletedImages !== undefined && !deletedImages.itemImageSrc.startsWith('blob:')) {
        // console.log('пишем массив')
        // deletedImages.itemImageSrc = deletedImages.itemImageSrc.replace('/storage/', '');
        if (!defectDataMapDelImages.value[defectId]) {
            defectDataMapDelImages.value[defectId] = [];
        }
        (defectDataMapDelImages.value[defectId] as Array<any>).push({ itemImageSrc: deletedImages.itemImageSrc.replace('/storage/', '') });
    }

    defectDataMapImages.value[defectId] = defectDataMapImages.value[defectId].filter((_, key) => key != index);

    // console.log('defectDataMapImages', defectDataMapImages.value);
    // console.log('defectDataMapDelImages', defectDataMapDelImages.value[defectId]);




    //console.log('defectDataMapImages',defectDataMapImages.value[defectId]);


    // let obj = { itemImageSrc: defectDataMapImages.value[defectId] }
    //

}


// const galleryUpdate = (index: number) => {
//     console.log(index);
//     console.log(galleryIndex.value);
// }


const emit = defineEmits(['updateData'])

watch([defectDataMap, defectDataMapComment, defectDataMapImages], () => {
    if (props.unit === 'Motor') {
        if (defectDataMap.value[504] === "Вентильный") {
            isBtnHidden.value[8] = true
            isBtnHidden.value[7] = false
            if (activeBtn.value === 8) {
                activeBtn.value = 7
                btnDetailChange(7)
            }
            for (let i = 652; i <= 661; i++) {
                defectDataMap.value[i] = ''
            }
        } else if(defectDataMap.value[504] === "Асинхронный") {
            isBtnHidden.value[8] = false
            isBtnHidden.value[7] = true
            if (activeBtn.value === 7) {
                activeBtn.value = 8
                btnDetailChange(8)
            }
            for (let i = 636; i <= 651; i++) {
                defectDataMap.value[i] = ''
            }
        } else {
            isBtnHidden.value[7] = true
            isBtnHidden.value[8] = true
        }
    }


    // const el93 = document.getElementById('93')
    // el93.classList.add('mr-9')
    // if (el28 === null) return
    // if (defectDataMap.value[28] === true) {
    //     el28.classList.remove('m-hidden')
    // } else {
    //     el28.classList.add('m-hidden')
    // }

    const arrMap = new Map<number, DefectData>();

    // Обработка defectDataMap
    Object.entries(defectDataMap.value).forEach(([key, value]) => {
        const numKey = Number(key);
        if (!isNaN(numKey)) {
            arrMap.set(numKey, {
                defect_id: numKey,
                value: value !== undefined ? String(value) : null,
                comment: defectDataMapComment.value?.[numKey] !== undefined
                    ? String(defectDataMapComment.value[numKey])
                    : null,
                images: defectDataMapImages.value?.[numKey]?.map(item => item.file) ?? null,
                deletedImages: defectDataMapDelImages.value?.[numKey]?.map(item => item.itemImageSrc) ?? null
            });
        }
    });

    // Обработка defectDataMapComment
    Object.entries(defectDataMapComment.value).forEach(([key, value]) => {
        const numKey = Number(key);
        if (!isNaN(numKey)) {
            const existing = arrMap.get(numKey);
            if (existing) {
                existing.comment = String(value);
            } else {
                arrMap.set(numKey, {
                    defect_id: numKey,
                    value: defectDataMap.value?.[numKey] !== undefined
                        ? String(defectDataMap.value[numKey])
                        : null,
                    comment: String(value),
                    images: defectDataMapImages.value?.[numKey]?.map(item => item.file) ?? null,
                    deletedImages: defectDataMapDelImages.value?.[numKey]?.map(item => item.itemImageSrc) ?? null
                });
            }
        }
    });

    // Обработка defectDataMapImages
    Object.entries(defectDataMapImages.value).forEach(([key, value]) => {
        const numKey = Number(key);
        if (!isNaN(numKey)) {
            const existing = arrMap.get(numKey);
            if (existing) {
                existing.images = value.map((item: ImageData) => item.file);
            } else {
                arrMap.set(numKey, {
                    defect_id: numKey,
                    value: defectDataMap.value?.[numKey] !== undefined
                        ? String(defectDataMap.value[numKey])
                        : null,
                    comment: defectDataMapComment.value?.[numKey] !== undefined
                        ? String(defectDataMapComment.value[numKey])
                        : null,
                    images: value.map((item: ImageData) => item.file),
                    deletedImages: defectDataMapDelImages.value?.[numKey]?.map(item => item.itemImageSrc) ?? null
                });
            }
        }
    });

    sectionData.value = {
        section_number: sectionNumber.value,
        defects: Array.from(arrMap.values())
    };

    emit('updateData', sectionData.value);
}, { deep: true });

// watch([defectDataMap, defectDataMapComment, defectDataMapImages], () => {
//     //console.log(defectDataMap.value)
//     // console.log(props.details)
//     // console.log(1)
//
//     // console.log(defectDataMap.value[28])
//     // Скрыитие отображение доп. полей для Слома вала
//     const el93 = document.getElementById('93')
//     // el93.classList.add('mr-9')
//     // if (el28 === null) return
//     // if (defectDataMap.value[28] === true) {
//     //     el28.classList.remove('m-hidden')
//     // } else {
//     //     el28.classList.add('m-hidden')
//     // }
//
//     const arr: DefectData[] = [];
//
//     for (const [key, value] of Object.entries(defectDataMap.value)) {
//         if (typeof key !== 'undefined' && typeof value !== 'undefined' && !isNaN(Number(key))) {
//                 arr.push({
//                     defect_id: Number(key),
//                     value: defectDataMap.value?.[Number(key)] !== undefined ? String(defectDataMap.value[Number(key)]) : null,
//                     comment: defectDataMapComment.value?.[Number(key)] !== undefined ? String(defectDataMapComment.value[Number(key)]) : null,
//                     images: defectDataMapImages.value?.[Number(key)] !== undefined ? defectDataMapImages.value[Number(key)].map(item => item.file) : null,
//                     deletedImages: defectDataMapDelImages.value?.[Number(key)] !== undefined ? defectDataMapDelImages.value[Number(key)].map((item: ImageData) => item.itemImageSrc) : null,
//                 });
//         }
//     }
//
//     for (const [key, value] of Object.entries(defectDataMapComment.value)) {
//         if (typeof key !== 'undefined' && typeof value !== 'undefined' && !isNaN(Number(key))) {
//             const existingIndex = arr.findIndex(
//                 item => item.defect_id === Number(key)
//             );
//             if (existingIndex !== -1) {
//                 arr[existingIndex].comment = String(value);
//             } else {
//                 arr.push({
//                     defect_id: Number(key),
//                     value: defectDataMap.value?.[Number(key)] !== undefined ? String(defectDataMap.value[Number(key)]) : null,
//                     comment: defectDataMapComment.value?.[Number(key)] !== undefined ? String(defectDataMapComment.value[Number(key)]) : null,
//                     images: defectDataMapImages.value?.[Number(key)] !== undefined ? defectDataMapImages.value[Number(key)].map(item => item.file) : null,
//                     deletedImages: defectDataMapDelImages.value?.[Number(key)] !== undefined ? defectDataMapDelImages.value[Number(key)].map((item: ImageData) => item.itemImageSrc) : null,
//                 });
//             }
//
//         }
//     }
//
//     for (const [key, value] of Object.entries(defectDataMapImages.value)) {
//         if (typeof key !== 'undefined' && typeof value !== 'undefined' && !isNaN(Number(key))) {
//             // console.log('key', key, 'value', value)
//             const existingIndex = arr.findIndex(
//                 item => item.defect_id === Number(key)
//             );
//             if (existingIndex !== -1) {
//                 arr[existingIndex].images = value.map((item: ImageData) => item.file) ;
//             } else {
//                 arr.push({
//                     defect_id: Number(key),
//                     value: defectDataMap.value?.[Number(key)] !== undefined ? String(defectDataMap.value[Number(key)]) : null,
//                     comment: defectDataMapComment.value?.[Number(key)] !== undefined ? String(defectDataMapComment.value[Number(key)]) : null,
//                     images: defectDataMapImages.value?.[Number(key)] !== undefined ? defectDataMapImages.value[Number(key)].map((item: ImageData) => item.file) : null,
//                     deletedImages: defectDataMapDelImages.value?.[Number(key)] !== undefined ? defectDataMapDelImages.value[Number(key)].map((item: ImageData) => item.itemImageSrc) : null,
//                 });
//             }
//
//         }
//     }
//     sectionData.value = {
//         section_number: sectionNumber.value,
//         defects: arr
//     }
//
//     emit('updateData', sectionData.value)
//     // console.log(sectionData.value)
//     // console.log('defectDataMapImages',defectDataMapImages.value);
//
// }, { deep: true })


watch(
    () => [...props.sectionData || []],
    (newVal) => {
        if (props.sectionData !== null) {
            // console.log('props.sectionData', props.sectionData);
            const data: SectionData[] = props.sectionData.filter(res => res.section_number === sectionNumber.value)
            // console.log('data', data[0].defects)

            const result: DefectDataMap[] = [];
            const comments: DefectDataMap[] = [];
            const images = [];

            for (const item of data as SectionData[]) {
                item.defects.forEach(item => {
                    // if (item.id == 40) {
                    //     console.log('item', item)
                    // }
                    let convertedValue;
                    switch(item.type) {
                        case 'boolean':
                            convertedValue = item.value === 'true' || item.value === '1';
                            break;
                        case 'number':
                            convertedValue = item.value !== 'null' ? Number(item.value) : null;
                            break;
                        case 'string':
                        default:
                            convertedValue = String(item.value);
                    }

                    result[item.defect_id] = convertedValue as DefectDataMap;
                    comments[item.defect_id] = item.comment !== null ? String(item.comment) : '';

                    defectDataMapImages.value[item.defect_id] = [];
                    defectDataMapDelImages.value[item.defect_id] = [];
                    // if (!isImagesUpdating.value) {
                    if(true){
                        const images = item.images as (File | Image)[] | undefined;
                        images?.forEach(image => {
                            if ('path' in image) { // Проверяем, что это Image
                                const obj = {
                                    itemImageSrc: '/storage/' + image.path
                                };
                                (defectDataMapImages.value[item.defect_id] as Array<any>).push(obj);
                            }
                        });

                        // for (const image of item.images) {
                        //     let obj = {
                        //         itemImageSrc: '/storage/' + (image as Image).path
                        //     };
                        //     (defectDataMapImages.value[item.defect_id] as Array<any>).push(obj);
                        // }
                        // images[item.defect_id] = item.images !== null ? String(item.images) : '';
                        // console.log('item.images', item.images);
                    }

                });
            }

            defectDataMap.value = result
            defectDataMapComment.value = comments

            // console.log('defectDataMapImages', sectionNumber.value, defectDataMapImages.value)
            // console.log('defectDataMap', sectionNumber.value, defectDataMap.value)




            // let obj = {
            //     itemImageSrc: '/storage/' + 'img/defect-data/T7GWEKTiJZaELmuPAQck7v5Ow4zgMBha8iyOiN3K.png'
            // }
            // if (!defectDataMapImages.value[22]) {
            //     defectDataMapImages.value[22] = [];
            // }
            // (defectDataMapImages.value[22] as Array<any>).push(obj);

            // console.log('images', images);

            // const result = Object.fromEntries(
            //     data[0].defects.map(item => {
            //         console.log(item.type);
            //         // Приведение типов в зависимости от type
            //         let convertedValue;
            //
            //         switch(item.type) { // предполагаем, что defect.type доступен
            //             case 'boolean':
            //                 convertedValue = item.value === 'true' || item.value === '1';
            //                 break;
            //             case 'number':
            //                 convertedValue = Number(item.value);
            //                 break;
            //             case 'string':
            //             default:
            //                 convertedValue = item.value.toString();
            //         }
            //
            //         return [item.defect_id, convertedValue];
            //     })
            // );


            //defectDataMap.value = result
            //
            //console.log('result', result);
            // btnDetailChange(0);
        }
    }, {
        deep: true,
        immediate: true
    }
);

// watch((props.details) => {
//     btnDetailChange(0);
// })

watchEffect(() => {
    btnDetailChange(0);
    //console.log('props.sectionData: ', props.sectionData)


});



</script>

<style scoped>
.active {
    //background-color: #3b82f6 !important;
    color: var(--novomet-orange-800) !important;
    border-color: var(--novomet-orange-800) !important;
}

:deep(.p-accordioncontent-content) {
    background-color: var(--novomet-light-gray-blue-200);
}

:deep(.p-inputtext.p-component.p-inputnumber-input) {
    width: 100%;
}

:deep(.p-accordioncontent-content) {
    padding: 20px !important;
}

:deep(.p-card-body) {
    padding: 5px 10px;
    border: 2px solid var(--novomet-light-gray-blue-400);
}

.m-hidden {
    display: none !important;
}

:deep(.p-galleria) {
    .p-galleria-prev-button,
    .p-galleria-next-button {
        background-color: var(--novomet-black-200);
        font-size: 50px !important;
    }
}

:deep(.p-fieldset-legend) {
    background-color: transparent;
}
:deep(.p-fieldset.p-component) {
    background-color: transparent;
    border: 2px solid var(--novomet-light-gray-blue-800);
}



</style>

// https://stackoverflow.com/questions/74525054/primevue-confirmdialog-opens-multiple-times
