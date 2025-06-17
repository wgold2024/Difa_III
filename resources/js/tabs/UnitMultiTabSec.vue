<template>
<!--    <Toast />-->
    <Accordion value="-1" class="mb-4">
        <AccordionPanel value="0">
            <AccordionHeader>Общая информация</AccordionHeader>
            <AccordionContent>
                <div class="grid grid-cols-5 gap-x-1 gap-y-2">
                    <div v-for="(component, index) in commonComponents" :key="index" class="mr-5">
                        <div v-if="component.type=='string'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <InputText v-model="defectDataMap[component.id] as unknown as string" placeholder="Введите значение" class="w-full"/>
                        </div>
                        <div v-if="component.type=='number'"  class="w-full text-center">
                            <div class="mb-1">{{ component.name }}, {{ component.measure_unit }}</div>
                            <InputNumber v-model="defectDataMap[component.id] as unknown as number" :min="0" placeholder="Введите число" class="w-1/2"/>
                        </div>
                        <div v-if="component.type=='select'" >
                            <div class="mb-1">{{ component.name }}</div>
                            <Select v-model="defectDataMap[component.id]" :options="component.values" optionLabel="name" optionValue="name" placeholder="Выберите значение" class="w-full" />
                        </div>
                    </div>
                </div>
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
                    <Button :label="detail.name" severity="secondary" variant="outlined" class="w-full mb-1" :class="{ 'active': activeBtn === index }" @click="btnDetailChange(index)"/>
                </div>
            </ScrollPanel>
        </div>
        <div  v-if="true" class="w-3/4 p-1">
            <ScrollPanel class="mr-3" style="width: 100%; height: 57vh; z-index: 0">
                <Card  v-for="(component, index) in btnComponents as Defect[]" :key="index" class="mb-1" style="overflow: hidden">
                    <template #content>
                        <div class="flex justify-between p-1">
                            <div class="flex justify-between w-full">
                                <img src="#" alt="adsf" class="mr-3" style="width: 200px; height: 300px; border: 1px solid green">
                                <div class="mr-3 flex flex-col justify-stretch w-full">
                                    <div>
                                        <div class="flex justify-between items-center">
                                            <div class="mb-3">
                                                <Checkbox v-model="defectDataMap[component.id]" :binary="true" :value="component.id" :id="'label' + String(component.id)" name="defect" />
                                                <label :for="'label' + String(component.id)" class="ml-2">{{ component.name }}</label>
                                            </div>
                                            <Button label="Возможные причины" text raised severity="secondary" @click="isReasonVisible[component.id] = !isReasonVisible[component.id]" class="mb-2"/>
                                        </div>
                                        <p class="mb-2">
                                            {{ component.description }}
                                        </p>
                                        <div :id="String(component.id)" v-if="component.group_id && optionComponents.filter(res => res.group_id === component.group_id).length > 0" :class="{ 'm-hidden': !defectDataMap[component.id] }" class="p-2 mb-2 border border-r rounded-lg" style="border-color: var(--novomet-light-gray-blue-1000)">
                                            <div class="grid grid-cols-3 gap-x-10 gap-y-2">
                                                <div v-for="(item, index) in optionComponents.filter(res => res.group_id === component.group_id)" :key="index">
                                                    <div v-if="item.type=='string'" >
                                                        <div class="mb-1">{{ item.name }}</div>
                                                        <InputText v-model="defectDataMap[item.id] as unknown as string" placeholder="Введите значение" class="w-full"/>
                                                    </div>
                                                    <div v-if="item.type=='number'"  class="w-full text-center">
                                                        <div class="mb-1">{{ item.name }}, {{ item.measure_unit }}</div>
                                                        <InputNumber v-model="defectDataMap[item.id] as unknown as number" :min="0" placeholder="Введите число" class="w-full"/>
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
                                        <textarea v-model="defectDataMapComment[component.id]  as unknown as string" class="w-full h-full p-2 border border-r rounded-lg" style="resize: none; outline: none; border-color: var(--novomet-light-gray-blue-1000)" rows="3" placeholder="Введите общее примечание к разбору"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="w-[400px] min-h-[200px] border border-green-500 flex flex-col justify-between">
                                <Galleria :value="defectDataMapImages[component.id] as unknown as any[] || []"
                                          v-model:active-index="galleryIndex[component.id]"
                                          :numVisible="5" containerStyle="max-width: 640px"
                                          :showItemNavigators="true" :showThumbnails="false">
                                    <template #item="slotProps">
                                        <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" style="width: 100%; display: block;" />
                                    </template>
                                </Galleria>
                                <div class="flex justify-between p-1">
                                    <input type="file"  :ref="(el) => fileInputs['fileInput' + String(component.id)] = el as HTMLInputElement | null"   multiple class="file-upload-button" @change="setImages(component.id, $event)" style="display: none">
                                    <Button icon="pi pi-plus" class="w-[35%]" severity="primary" @click="addImages(component.id)" outlined/>
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
    Image
} from "@/types";
import Galleria from 'primevue/galleria';
import { PhotoService } from "@/servicies/PhotoService";

import Fieldset from 'primevue/fieldset';
import axios from "axios";
import {toRaw} from "vue/dist/vue";
// import {locations} from "@/data";

// const model = defineModel()


const props = defineProps<{
    details?: Detail[];
    sectionNumber: number;
    sectionData: SectionData[] | null;
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

// const defectDataMap = defineModel<defectDataMap[]>({
//     default: () => [] as defectDataMap[]
// })

const galleryIndex = ref<number[]>([])
const isImagesUpdating = ref(false)

const data = defineModel<Data[]>({
    default: () => [] as Data[]
})

const sectionData = ref<SectionData>()
const sectionNumber = ref<number>(props.sectionNumber)

const buttons = computed<Detail[]>(() => {
    return props.details?.filter((res: Detail) => res.name !== 'Общая информация') ?? [];
});

const commonComponents = computed<Defect[]>(() => {
    const data = props.details?.find((res: Detail) => res.name === 'Общая информация');
    return data?.defects ?? []; // Вернёт пустой массив если defects нет
});

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

    return targetItem.defects.filter(res => res.is_option);
})


// const getOptionComponents = () => {
//     const data = props.details[activeBtn.value + 1].defects.filter(res => res.is_option)
//     console.log(data)
//     return data
// }

const btnDetailChange = (index: number) => {
    activeBtn.value = index;
    if (props.details?.length) {
        btnComponents.value = props.details[index + 1].defects.filter(res => !res.is_option)
    }
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

    if (files === null) return;

    for (const file of files ) {
        // console.log(file)

        // if (!Array.isArray(defectDataMapImages.value[defectId])) {
        //     defectDataMapImages.value[defectId] = []; // Инициализируем как массив, если это не так
        // }

        let obj = {
            itemImageSrc: URL.createObjectURL(file),
            file: file
        }

        if (!defectDataMapImages.value[defectId]) {
            defectDataMapImages.value[defectId] = [];
        }
        (defectDataMapImages.value[defectId] as Array<any>).push(obj);


        // console.log(defectDataMapImages.value)

        // Установка индекса галереи для отображения последнего добавленного изображения
        galleryIndex.value[defectId] = defectDataMapImages.value[defectId].length - 1

        // this.dbData.images[defectId].push(obj)
    }


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
    //console.log(defectDataMap.value)
    // console.log(props.details)
    // console.log(1)

    // console.log(defectDataMap.value[28])
    // Скрыитие отображение доп. полей для Слома вала
    const el93 = document.getElementById('93')
    // el93.classList.add('mr-9')
    // if (el28 === null) return
    // if (defectDataMap.value[28] === true) {
    //     el28.classList.remove('m-hidden')
    // } else {
    //     el28.classList.add('m-hidden')
    // }

    const arr: DefectData[] = [];

    for (const [key, value] of Object.entries(defectDataMap.value)) {
        if (typeof key !== 'undefined' && typeof value !== 'undefined' && !isNaN(Number(key))) {
                arr.push({
                    defect_id: Number(key),
                    value: defectDataMap.value?.[Number(key)] !== undefined ? String(defectDataMap.value[Number(key)]) : null,
                    comment: defectDataMapComment.value?.[Number(key)] !== undefined ? String(defectDataMapComment.value[Number(key)]) : null,
                    images: defectDataMapImages.value?.[Number(key)] !== undefined ? defectDataMapImages.value[Number(key)].map(item => item.file) : null,
                    deletedImages: defectDataMapDelImages.value?.[Number(key)] !== undefined ? defectDataMapDelImages.value[Number(key)].map((item: ImageData) => item.itemImageSrc) : null,
                });
        }
    }

    for (const [key, value] of Object.entries(defectDataMapComment.value)) {
        if (typeof key !== 'undefined' && typeof value !== 'undefined' && !isNaN(Number(key))) {
            const existingIndex = arr.findIndex(
                item => item.defect_id === Number(key)
            );
            if (existingIndex !== -1) {
                arr[existingIndex].comment = String(value);
            } else {
                arr.push({
                    defect_id: Number(key),
                    value: defectDataMap.value?.[Number(key)] !== undefined ? String(defectDataMap.value[Number(key)]) : null,
                    comment: defectDataMapComment.value?.[Number(key)] !== undefined ? String(defectDataMapComment.value[Number(key)]) : null,
                    images: defectDataMapImages.value?.[Number(key)] !== undefined ? defectDataMapImages.value[Number(key)].map(item => item.file) : null,
                    deletedImages: defectDataMapDelImages.value?.[Number(key)] !== undefined ? defectDataMapDelImages.value[Number(key)].map((item: ImageData) => item.itemImageSrc) : null,
                });
            }

        }
    }

    for (const [key, value] of Object.entries(defectDataMapImages.value)) {
        if (typeof key !== 'undefined' && typeof value !== 'undefined' && !isNaN(Number(key))) {
            // console.log('key', key, 'value', value)
            const existingIndex = arr.findIndex(
                item => item.defect_id === Number(key)
            );
            if (existingIndex !== -1) {
                arr[existingIndex].images = value.map((item: ImageData) => item.file) ;
            } else {
                arr.push({
                    defect_id: Number(key),
                    value: defectDataMap.value?.[Number(key)] !== undefined ? String(defectDataMap.value[Number(key)]) : null,
                    comment: defectDataMapComment.value?.[Number(key)] !== undefined ? String(defectDataMapComment.value[Number(key)]) : null,
                    images: defectDataMapImages.value?.[Number(key)] !== undefined ? defectDataMapImages.value[Number(key)].map((item: ImageData) => item.file) : null,
                    deletedImages: defectDataMapDelImages.value?.[Number(key)] !== undefined ? defectDataMapDelImages.value[Number(key)].map((item: ImageData) => item.itemImageSrc) : null,
                });
            }

        }
    }
    sectionData.value = {
        section_number: sectionNumber.value,
        defects: arr
    }

    emit('updateData', sectionData.value)
    // console.log(sectionData.value)
    // console.log('defectDataMapImages',defectDataMapImages.value);

}, { deep: true })


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
                            convertedValue = Number(item.value);
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

            console.log('defectDataMapImages', sectionNumber.value, defectDataMapImages.value)




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
        }
    }, {
        deep: true,
        immediate: true
    }
);

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
    display: none;
}


</style>

