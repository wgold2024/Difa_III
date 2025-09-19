import { securityColor } from "@/Pages/Mmvb/colors";
import {
    Security,
    Level,
    PortfolioCollectionElement,
    PortfolioForMeter,
    PortfolioCollectionElementData
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

    private collection: PortfolioCollectionElement[] = [
        {
            name: 'Simple R',
            nameRus: 'Simple R',
            data: [
                { security: 'IMOEXF', base: 50 },
                { security: 'ОФЗ 29009', base: 50 },
            ]
        },
        {
            name: 'Max R',
            nameRus: 'Max R',
            data: [
                { security: 'IMOEXF', base: 25 },
                { security: 'SBERF', base: 15 },
                { security: 'GAZPF', base: 10 },
                { security: 'ОФЗ 29009', base: 25 },
                { security: 'ОФЗ 26238', base: 25 },
            ]
        },

    ]

    getValueSimpleRuble() {
        return [
            { name: 'IMOEXF', color: securityColor.imoexf, value: 50, type: 'futures' },
            { name: 'SU29009RMFS6', color: securityColor.su29009rmfs6, value: 50, type: 'ofz' },
        ];
    }
    getCollection(): PortfolioForMeter[][] {
        return this.collection.map(portfolio =>
            portfolio.data.map(item => {
                const sec = this.securities.find(s => s.name === item.security);
                return {
                    label: item.security,
                    color: sec?.color ?? 'black',
                    value: item.base
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






    private portfolio: Security[];

    constructor() {
    }






    getValueSimpleRubleAuto() {
        let obj = [...this.getValueSimpleRuble()]
        for (const element of obj) {
            element.value = 40
        }

        return obj
    }

    addSecurity(security: Security) {
        this.portfolio.push(security)
    }

    getCurrent() {
        return this.portfolio;
    }
}
