export interface Security {
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
