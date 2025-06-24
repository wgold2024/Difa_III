export interface User {
    id?: number;
    name?: string;
    email?: string;
    created_at?: string;
    updated_at?: string;
}

export interface Credentials {
    email: string;
    password: string;
    remember?: boolean;
}

export interface AuthState {
    authenticated: boolean
    user: User | null
}

export interface ApiError {
    message: string
    errors?: Record<string, string[]>
}

export interface Input {
    op: string,
    city: string,
    company: string,
    field: string,
    cluster: string,
    well: string,
    installationDateAt: Date | null,
    startDateAt:  Date | null,
    stopDateAt:  Date | null,
    dismantlingDateAt:  Date | null,
    operatingTime:  number | null,
    analysisDateAt:  Date | null,
    stopReason: string,
    mode: string,
    slKey: string,
    note: string,
}

export interface InputError {
    op: string | boolean,
    city: string | boolean,
    company: string | boolean,
    field: string | boolean,
    cluster: string | boolean,
    well: string | boolean,
    installationDateAt: string | boolean,
    startDateAt: string | boolean,
    stopDateAt: string | boolean,
    dismantlingDateAt: string | boolean,
    operatingTime: string | boolean,
    analysisDateAt: string | boolean,
    stopReason: string | boolean,
    mode: string | boolean,
}

type DisabledKeys = 'startDate' | 'stopDate' | 'dismantlingDate' | 'analysisDate';

export interface Detail {
    id: number;
    name: string;
    defects: Defect[];
}

export interface Defect {
    id: number;
    detail_id: number;
    group_id: number | null;
    name: string;
    type: string;
    description: string,
    reason: string,
    is_option: boolean
    measure_unit: string
    values: Value[]
}

export interface Value {
    name: string,
    visibility_defect_id: number,
    visibility_defect_value: string
}

export interface DefectDataMap {
    [key: number]: string | number | boolean | null;
}

export interface DefectDataMapImages {
    [key: number]: ImageData[];
}

export interface  ImageData {
    itemImageSrc: string;
    // thumbnailImageSrc: string;
    // alt: string;
    // title: string;
    file: File;
    path?: string
}

export interface  Image {
    path: string;
    defect_data_id: number;
    id: number;
}

// Для данных:
export interface Data {
    data: EspData[];
}

export interface EspData {
    Input?: {
        id: number;
    };
    Pump: SectionData[];
    Motor?: SectionData[];
}

export interface SectionData {
    section_number: number;
    defects: DefectData[];
}
export interface DefectData {
    // detail_id: number;
    id?: number;
    defect_id: number;
    type?: string;
    value: string | null;
    comment: string | null;
    images?: File[] | Image[] | null;
    deletedImages?: string[] | null;
}







