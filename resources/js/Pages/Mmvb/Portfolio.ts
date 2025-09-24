import { securityColor } from "@/Pages/Mmvb/colors";
import {
    Security,
    Level,
    PortfolioCollectionElement,
    PortfolioForMeter,
    PortfolioCollectionElementData, SecurityFuturesNames, SecurityOfzNames
} from "@/types/mmvb";
import axios from "axios";
import {ref} from "vue";

export default class Portfolio {
    public securities: Security[] = [
        { name: 'USDRUBF', level: null, levelValue: null, price: null, type: 'futures', color: 'gray'},
        { name: 'EURRUBF', level: null, levelValue: null, price: null, type: 'futures', color: 'gray'},
        { name: 'CNYRUBF', level: null, levelValue: null, price: null, type: 'futures', color: securityColor.cnyrubf },
        { name: 'GLDRUBF', level: null, levelValue: null, price: null, type: 'futures', color: securityColor.gldrubf },
        { name: 'IMOEXF', level: null, levelValue: null, price: null, type: 'futures', color: securityColor.imoexf },
        { name: 'SBERF', level: null, levelValue: null, price: null, type: 'futures', color: securityColor.sberf },
        { name: 'GAZPF', level: null, levelValue: null, price: null, type: 'futures', color: securityColor.gazpf },
        { name: 'ОФЗ 29009', level: null, levelValue: null, price: null, type: 'ofz', color: securityColor.su29009rmfs6 },
        { name: 'ОФЗ 26238', level: null, levelValue: null, price: null, type: 'ofz', color: securityColor.su26238rmfs4 },
    ]

    public levels: Level[] = [
        { name: '0: < 20 %', value: 20 },
        { name: '1: 20-40 %', value: 40 },
        { name: '2: 40-60 %', value: 60 },
        { name: '3: 60-80 %', value: 80 },
        { name: '4: > 80 %', value: 100 },
    ]

    public collection: PortfolioCollectionElement[] = [
        {
            name: 'Simple R',
            nameRus: 'Simple R',
            desc: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            data: [
                { security: 'IMOEXF', base: 50 },
                { security: 'ОФЗ 29009', base: 50 },
            ]
        },
        {
            name: 'Max R',
            nameRus: 'Max R',
            desc: 'desc Max R',
            data: [
                { security: 'IMOEXF', base: 25 },
                { security: 'SBERF', base: 15 },
                { security: 'GAZPF', base: 10 },
                { security: 'ОФЗ 29009', base: 25 },
                { security: 'ОФЗ 26238', base: 25 },
            ]
        },
        {
            name: 'Simple Balanced',
            nameRus: 'Simple Balanc',
            desc: 'desc Simple Balanc',
            data: [
                { security: 'IMOEXF', base: 25 },
                { security: 'CNYRUBF', base: 25 },
                { security: 'GLDRUBF', base: 25 },
                { security: 'ОФЗ 29009', base: 25 },
            ]
        },
        {
            name: 'Max Balanced',
            nameRus: 'Max Balanc',
            desc: 'desc Max Balanc',
            data: [
                { security: 'IMOEXF', base: 12.5 },
                { security: 'SBERF', base: 7.5 },
                { security: 'GAZPF', base: 5 },
                { security: 'CNYRUBF', base: 12.5 },
                { security: 'GLDRUBF', base: 12.5 },
                { security: 'ОФЗ 29009', base: 25 },
                { security: 'ОФЗ 26238', base: 25 },
            ]
        },
        {
            name: 'Custom',
            desc: 'desc Simple R',
            nameRus: 'Пользовательский',
            data: []
        },
    ]


    // getValueSimpleRuble() {
    //     return [
    //         { name: 'IMOEXF', color: securityColor.imoexf, value: 50, valueCurrent: 20, type: 'futures' },
    //         { name: 'SU29009RMFS6', color: securityColor.su29009rmfs6, value: 50, valueCurrent: 50, type: 'ofz' },
    //     ];
    // }
    getCollection(): PortfolioForMeter[][] {
        const baseData = this.getBaseCollection();
        baseData.forEach((portfolio, index) => {
            const kOfz = portfolio.filter(item => item.type === 'ofz').length
            let summaValueCurrentFutures =0
            portfolio.forEach(element => {
                if (element.type === 'futures') {
                    element.value = element.valueCurrent
                    summaValueCurrentFutures += element.valueCurrent
                }
            })
            portfolio.forEach(element => {
                if (element.type === 'ofz') {
                    element.value = (100 - summaValueCurrentFutures) / kOfz
                }
            })
        });

        return baseData;
    }

    /*
    Возвращает массив подобных массивов
        [
            { name: Simple R, label: 'IMOEXF', color: securityColor.imoexf, value: 50, type: 'futures' },
            { name: Simple R, label: 'SU29009RMFS6', color: securityColor.su29009rmfs6, value: 50, type: 'ofz' },
        ]
    */
    getBaseCollection(): PortfolioForMeter[][] {
        return this.collection.map(portfolio =>
            portfolio.data.map(item => {
                const sec = this.securities.find(s => s.name === item.security);
                return {
                    name: portfolio.nameRus,
                    label: item.security,
                    color: sec?.color ?? 'black',
                    value: item.base,
                    valueCurrent: item.base * (sec?.level ?? 50) / 50,
                    type: sec?.type ?? 'err'
                } as PortfolioForMeter;
            })
        );
    }

    async getLevels(startDate: Date): Promise<void> {
        const d = new Date(startDate);
        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        const date = `${year}-${month}-${day}`;

        for (const security of this.securities) {
            if (security.type === 'ofz') continue;

            try {
                const res = await axios.get('/api/mmvb/candles', {
                    params: {
                        security: security.name,
                        interval: 24,
                        from: date
                    }
                });

                const candleData = res.data.candles.data || [];
                if (!candleData.length) continue;

                const max = Math.max(...candleData.map((c: any) => c[2]));
                const close = candleData[candleData.length - 1][1];
                const k = (1 - close / max) * 100;

                const level =
                    k < 20 ? 20 :
                        k < 40 ? 40 :
                            k < 60 ? 60 :
                                k < 80 ? 80 : 100;

                // 🔑 заменяем объект, чтобы Vue заметил изменение
                const idx = this.securities.findIndex(obj => obj.name === security.name);
                if (idx !== -1) {
                    this.securities[idx] = {
                        ...this.securities[idx],
                        price: Number(close.toFixed(2)),
                        levelValue: Number(k.toFixed(2)),
                        level
                    };
                }
            } catch (error) {
                console.error("Error - /api/mmvb/candles:", error);
            }
        }
    }

    addCustomSecurity(data: PortfolioCollectionElementData) {
        const customPorfolio = this.collection.find(res => res.name === 'Custom')



        if (customPorfolio) {
            const result = customPorfolio.data.find(res => res.security === data.security)
            if (result !== undefined) {
                return -1
            }
            let summa = customPorfolio.data.reduce((acc, res) => acc + Number(res.base), 0)
            summa += Number(data.base)
            if (summa > 100) {
                return summa
            }
            customPorfolio.data.push(data)
        }

        return 0
    }

    removeCustomSecurity(security: SecurityFuturesNames | SecurityOfzNames) {
        const customPorfolio = this.collection.find(res => res.name === 'Custom')
        if (customPorfolio) {
            const index = customPorfolio.data.findIndex(item => item.security === security);

            if (index !== -1) {
                customPorfolio.data.splice(index, 1);
            }
        }
    }

    // getValueSimpleRubleAuto() {
    //     let obj = [...this.getValueSimpleRuble()]
    //     for (const element of obj) {
    //         element.value = 40
    //     }
    //
    //     return obj
    // }
}
