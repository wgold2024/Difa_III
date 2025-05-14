export const locations = {
    getOps() {
        return  [
            { name: 'Новомет-Пермь' },
            { name: 'Новомет-Ноябрьск' },
            { name: 'Новомет-Нефтеюганск' },
            { name: 'Новомет-Нижневартовск' },
            { name: 'Новомет-Стрежевой' },
            { name: 'Новомет-Юг' },
            { name: 'Новомет-Казахстан' },
            { name: 'Новомет-Азербайджан' },
        ]
    },

    getCities() {
        return [
            { name: 'Пермь' },
            { name: 'Ноябрьск' },
            { name: 'Нефтеюганск' },
            { name: 'Нижневартовск' },
            { name: 'Стрежевой' },
            { name: 'Юг' },
            { name: 'Казахстан' },
            { name: 'Азербайджан' },
        ];
    },

    getCompanies() {
        return [
            { name: 'Лукойл' },
            { name: 'МНКТ' },
            { name: 'Новомет' },
            { name: 'Сургут' },
            { name: 'АО «Томскнефть» ВНК' },
        ];
    },

    getFields() {
        return [
            {name: 'Акшабулак', code: 'AKS'},
            {name: 'Арыскум', code: 'ARS'},
            {name: 'Вахское', code: 'VAH'},
            {name: 'Висовое', code: 'NFG'},
            {name: 'Волковское', code: 'VOL'},
            {name: 'Западно-Катыльгинское', code: 'ZAK'},
            {name: 'Катыльгинское', code: 'KAT'},
            {name: 'Кошильское', code: 'KOS'},
            {name: 'Колотушное', code: 'KOL'},
            {name: 'Кумколь', code: 'KMK'},
            {name: 'Ломовое', code: 'LOM'},
            {name: 'Малореченское', code: 'MAL'},
            {name: 'Новое', code: 'NYB'},
            {name: 'Озерное', code: 'OZE'},
            {name: 'Оленье', code: 'OLE'},
            {name: 'Первомайское', code: 'PER'},
            {name: 'Полуденное', code: 'POL'},
            {name: 'Приграничное', code: 'PRI'},
            {name: 'Проточное', code: 'PRO'},
            {name: 'Прованьское', code: 'NVR'},
            {name: 'Северное', code: 'SEV'},
            {name: 'Старое', code: 'NFG'},
            {name: 'Советское', code: 'SOV'},
            {name: 'Средиземное', code: 'NVR'},
            {name: 'Тестовое', code: 'NVR'},
            {name: 'Трайгородско-Кондаковское', code: 'TRK'},
            {name: 'Тусколье', code: 'TSK'},
            {name: 'Уньвинское', code: 'NVR'},
            {name: 'Хаиркельды', code: 'XRK'},
            {name: 'Чкаловское', code: 'CHK'},
            {name: 'Южно-Приобское', code: 'YuPr'},
            {name: 'Южно-Черемшанское', code: 'YUC'},
            {name: 'Ярактинское', code: 'NYB'}
        ];
    },



    getStopReasons() {
        return [
            {name: 'ГТМ', code:'gtm'},
            {name: 'Извлечение', code:'ext'},
            {name: 'Клин', code:'ppr'},
            {name: 'Нет подачи', code:'nfr'},
            {name: 'Нет притока', code:'nwfl'},
            {name: 'Отсутствуют', code:'ppr'},
            {name: 'Перевод в ППД', code:'ppd'},
            {name: 'Полёт', code:'ppr'},
            {name: 'ППР, оптимизация', code:'ppr'},
            {name: 'Прочее', code:'ppr'},
            {name: 'Смена УЭЦН', code:'cesp'},
            {name: 'Снижение производительности', code:'ppr'},
            {name: 'R-0', code:'r0'},
        ];
    },
};
