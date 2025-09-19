import {ref} from "vue";
import {securityColor} from "@/Pages/Mmvb/colors";

export const values = {
    getSecurity() {
        return [
            { name: 'USDRUBF', value: 'USDRUBF' },
            { name: 'EURRUBF', value: 'EURRUBF' },
            { name: 'CNYRUBF', value: 'CNYRUBF' },
            { name: 'GLDRUBF', value: 'GLDRUBF' },
            { name: 'IMOEXF', value: 'IMOEXF' },
            { name: 'SBERF', value: 'SBERF' },
            { name: 'GAZPF', value: 'GAZPF' },
            { name: 'ОФЗ 29009', value: 'SU29009RMFS6' },
            { name: 'ОФЗ 26238', value: 'SU26238RMFS4' },
        ];
    },
    getInterval() {
        return [
            { name: '1 минута', value: 1 },
            { name: '10 минут', value: 10 },
            { name: '1 час', value: 60 },
            { name: '4 часа', value: 4 },
            { name: '1 день', value: 24 },
            { name: '1 неделя', value: 7 },
            { name: '1 месяц', value: 31 },
        ];
    },
    getLevell() {
        return [
            { name: '0: < 20 %', value: 20 },
            { name: '1: 20-40 %', value: 40 },
            { name: '2: 40-60 %', value: 60 },
            { name: '3: 60-80 %', value: 80 },
            { name: '4: > 80 %', value: 100 },
        ];
    },
    getRiskDegree() {
        return [
            { name: 'низкая', value: 0 },
            { name: 'средняя', value: 1 },
            { name: 'высокая', value: 2 },
        ];
    },

    getValueSimpleRuble() {
        return [
            {label: 'IMOEXF', color: securityColor.imoexf, value: 50, type: 'futures'},
            {label: 'SU29009RMFS6', color: securityColor.su29009rmfs6, value: 50, type: 'ofz'},
        ];
    },
};
