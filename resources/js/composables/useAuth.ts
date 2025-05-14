import { computed, reactive } from 'vue'
import { User, Credentials, AuthState, ApiError } from "@/types";
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

    const inputObj = { op: '', city: '', company: '', field: '', cluster: '', well: '' }

    return {
        authenticated,
        user,
        attempt,
        setAuthenticated,
        setUser,
        inputObj
    }
}
