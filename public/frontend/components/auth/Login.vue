<template>
    <div class="centered">
        <form>
            <div v-if="errors.length">
                <b>Пожалуйста исправьте указанные ошибки:</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       v-model="email" placeholder="Введите email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1"
                       v-model="password" placeholder="Пароль">
            </div>
<!--            <div class="form-check">-->
<!--                <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--                <label class="form-check-label" for="exampleCheck1">Запомнить</label>-->
<!--            </div>-->
            <button @click="onLogin" class="btn btn-primary">Войти</button>
        </form>
    </div>
</template>

<script>
import {useRouter} from "vue-router";
import AxiosClient from "@/axios/axiosClient";
import {ref} from "vue"
import {useStore} from "vuex";

export default {
    setup() {
        const router = useRouter()
        const store = useStore();
        const email = ref('')
        const password = ref('')
        const errors = ref([])

        function onLogin() {
            checkForm()

            const data = {
                email: email.value,
                password: password.value,
            }

            AxiosClient.process('post', '/api/login', data)
                .then(response => {
                    if(response.status === 200){

                        localStorage.user =  [response.data.user]
                        localStorage.setItem('accessToken', response.data.accessToken)
                        localStorage.setItem('refreshToken', response.data.refreshToken)
                        store.commit('setTokens', response.data.accessToken, response.data.refreshToken)
                        router.push('/')
                    }
                }).catch(error => {
                    errors.value.push(Object.values(error.response.data.errors)[0][0])
                }
            )
        }

        function checkForm() {
            errors.value = []
            if (!email.value) {
                errors.value.push('Заполните поле email')
            }

            if (!password.value) {
                errors.value.push('Заполните поле пароль')
            }
            return !errors.value.length;
        }

        function register() {
            router.push('register')
        }

        return {
            email,
            password,
            errors,
            onLogin,
            register,
            checkForm,
        }
    }
}
</script>

<style scoped>

</style>
