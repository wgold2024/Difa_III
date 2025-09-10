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
            { name: '1: < 20 %', value: 0 },
            { name: '2: 20-40 %', value: 20 },
            { name: '3: 40-60 %', value: 40 },
            { name: '4: 60-80 %', value: 60 },
            { name: '5: > 80 %', value: 80 },
        ];
    },
};
