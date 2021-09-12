<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <label class="navbar-brand">Шахматы</label>

            <div v-if="authorised === false" class="collapse navbar-collapse" id="login">
                <button @click="login">Войти</button>
            </div>

            <div v-else class="collapse navbar-collapse" id="logout">
                <button @click="logout">Выйти</button>
            </div>


        </nav>
    </div>
</template>

<script>
import {useRouter} from "vue-router";
import {computed} from "vue";
import {useStore} from "vuex";
import AxiosClient from "@/axios/axiosClient";

export default {
    setup() {
        const store = useStore();
        const router = useRouter()

        const authorised = computed(function () {
            return store.state.tokens.accessToken !== '' || localStorage.getItem('accessToken');
        })

        function login() {
            router.push('login')
        }

        function logout() {
            AxiosClient.process('get', '/api/logout')
                .then(response => {
                        if (response.status === 200) {
                            localStorage.clear()
                            store.commit('deleteTokens')
                            router.push('login')
                        } else {
                            alert('Не удалось выйти из приложения')
                        }
                    }
                )
        }

        return {
            login,
            logout,
            authorised
        }
    }
}
</script>

<style scoped>

</style>
