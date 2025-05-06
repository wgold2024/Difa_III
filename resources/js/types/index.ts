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
