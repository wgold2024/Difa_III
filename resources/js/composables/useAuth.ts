import { computed, reactive } from 'vue'
import {User, Credentials, AuthState, ApiError, Input, InputError} from "@/types";
import axios, { AxiosError } from 'axios'

const state = reactive<AuthState>({
    authenticated: false,
    user: null
})

export default function useAuth() {
    const authenticated = computed(() => state.authenticated)
    const user = computed(() => state.user)

    const setAuthenticated = (authenticated: boolean) => {
        state.authenticated = authenticated
    }

    const setUser = (user: User | null) => {
        state.user = user
    }

    const attempt = async () => {
        await axios.get('/api/user')
            .then(res => {
                setAuthenticated(true)
                setUser(res.data)

                return true
            })
            .catch(e => {
                setAuthenticated(false)
                setUser(null)

                return false
            })
    };
    function convertCamelToSnake<T extends Input | InputError>(obj: T): T {
        const newObj: Partial<T> = {};

        for (const key in obj) {
            if (obj.hasOwnProperty(key)) {
                const newKey = key.replace(/(_\w)/g, match => match[1].toUpperCase());
                (newObj as Record<string, any>)[newKey] = obj[key as keyof T];
            }
        }

        return newObj as T;
    }


    // const inputObj = {
    //     op: 'Новомет-Пермь', city: 'Пермь', company: 'Лукойл', field: 'Вахское', cluster: '1', well: '1',
    //     installationDateAt: null, startDateAt: null, stopDateAt: null, dismantlingDateAt: null, operatingTime: 0, analysisDateAt: null,
    //     stopReason: 'ГТМ', mode: 'Нет данных', slKey: '', note: '',
    // }

    const inputObj = {
        op: '', city: '', company: '', field: '', cluster: '', well: '',
        installationDateAt: null, startDateAt: null, stopDateAt: null, dismantlingDateAt: null, operatingTime: 0, analysisDateAt: null,
        stopReason: '', mode: '', slKey: '', note: '',
    }

    const inputErrorObj = {
        op: false, city: false, company: false, field: false, cluster: false, well: false,
        installationDateAt: false, startDateAt: false, stopDateAt: false, dismantlingDateAt: false, operatingTime: false, analysisDateAt: false,
        stopReason: false, mode: false, slKey: false, note: false,
    }

    return {
        authenticated,
        user,
        attempt,
        setAuthenticated,
        setUser,
        inputObj,
        inputErrorObj,
        convertCamelToSnake
    }


}
