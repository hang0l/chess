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
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                       v-model="email" placeholder="Введите email">
            </div>

            <div class="form-group">
                <label for="firstName">Имя</label>
                <input type="text" class="form-control" id="firstName"
                       v-model="firstName" placeholder="Введите имя">
            </div>

            <div class="form-group">
                <label for="lastName">Фамилия</label>
                <input type="text" class="form-control" id="lastName"
                       v-model="lastName" placeholder="Введите фамилию">
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password"
                       v-model="password" placeholder="Пароль">
            </div>

            <div class="form-group">
                <label for="passwordRepeat">Пароль</label>
                <input type="password" class="form-control" id="passwordRepeat"
                       v-model="passwordRepeat" placeholder="Повторите пароль">
            </div>

            <button @click="onRegister" type="submit">Confirm</button>
        </form>
    </div>
</template>

<script>
import {useRouter} from "vue-router";
import {ref} from "vue"
import AxiosClient from "@/axios/axiosClient";

export default {
    setup() {
        const router = useRouter()
        const firstName = ref('')
        const lastName = ref('')
        const password = ref('')
        const passwordRepeat = ref('')
        const email = ref('')

        let errors = ref([])

        function onRegister() {
            if (!checkForm()) {
                return;
            }

            const data = {
                email: email.value,
                firstName: firstName.value,
                lastName: lastName.value,
                password: password.value,
            }
            AxiosClient.process('post', '/api/register', data)
                .then(response => {
                    if(response.status === 200){
                        router.push('/login')
                    }
                }).catch(error => {
                    errors.value.push(Object.values(error.response.data.errors)[0][0])
                    alert(Object.values(error.response.data.errors)[0][0])
                }
            )
        }

        function checkForm() {
            errors.value = []
            if (!email.value) {
                errors.value.push('Заполните поле email')
            }

            if (!firstName.value) {
                errors.value.push('Заполните поле Имя')
            }

            if (!password.value) {
                errors.value.push('Заполните поле пароль')
            }

            if (!passwordRepeat.value) {
                errors.value.push('Подтвердите пароль')
            }

            if (password.value !== passwordRepeat.value) {
                errors.value.push('Пароли не совпадают')
            }

            return !errors.value.length;
        }

        return {
            firstName,
            lastName,
            email,
            password,
            passwordRepeat,
            errors,
            onRegister,
            checkForm,
        }
    },
}
</script>

<style scoped>

</style>
