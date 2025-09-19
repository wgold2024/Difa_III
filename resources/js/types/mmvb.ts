import {securityColor} from "@/Pages/Mmvb/colors";

export interface Securityold {
    secid: string;
    shortname: string;
    regnumber: string | null;
    name: string;
    isin: string | null;
    is_traded: number;
    emitent_id: number | null;
    emitent_title: string | null;
    emitent_inn: string | null;
    emitent_okpo: string | null;
    type: string;
    group: string;
    primary_boardid: string;
    marketprice_boardid: string | null;
}

export interface Candle {
    number?: number;
    open: number;
    high: number;
    low: number;
    close: number;
    volume: number;
    begin: string;
    end: string;
}

export interface SecurityLevel {
    USDRUBF: number | null;
    EURRUBF: number | null;
    CNYRUBF: number | null;
    GLDRUBF: number | null;
    IMOEXF: number | null;
    SBERF: number | null;
    GAZPF: number | null;
}

export type SecurityFuturesNames =
    | 'USDRUBF'
    | 'EURRUBF'
    | 'CNYRUBF'
    | 'GLDRUBF'
    | 'IMOEXF'
    | 'SBERF'
    | 'GAZPF';

export type SecurityOfzNames =
    | 'ОФЗ 29009'
    | 'ОФЗ 26238';

// export interface Security {
//     name: SecurityFuturesNames | SecurityOfzNames,
//     color: string,
//     base: number,
//     type: string,
//     level: number
// }

export interface Security {
    name: SecurityFuturesNames | SecurityOfzNames,
    level: number | null,
    levelValue: number | null,
    price: number | null,
    type: 'futures' | 'ofz',
    color: string,
}

export interface Level {
    name: string,
    value: number
}

export interface PortfolioCollectionElementData {
    security: SecurityFuturesNames | SecurityOfzNames,
    base: number
}

export interface PortfolioCollectionElement {
    name: string,
    nameRus: string,
    data: PortfolioCollectionElementData[]
}

export interface PortfolioForMeter {
    name: string,
    label: SecurityFuturesNames | SecurityOfzNames,
    color: string,
    value: number,
    valueCurrent: number,
    type: 'futures' | 'ofz',
}
