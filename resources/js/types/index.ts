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
}

export interface InputError {
    op: string | boolean,
    city: string | boolean,
    company: string | boolean,
    field: string | boolean,
    cluster: string | boolean,
    well: string | boolean,
}
