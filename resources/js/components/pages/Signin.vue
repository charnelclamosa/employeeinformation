<template>
    <v-app class="bg">
        <v-row align="center" justify="center">
            <v-card width="485" height="380" tile elevation="1">
                <v-img :src="require('../.././assets/27720.jpg')"></v-img>
            </v-card>
            <v-card width="300" height="380" tile elevation="1">
                <v-card-title class="font-weight-black text-center px-7 mt-10">{{SystemName}}</v-card-title>
                <v-card-text class="px-5 mt-5">
                    <v-text-field dense outlined prepend-icon="mdi-account" label="Username" :rules="rules" v-model="user.username" @keyup.enter="login()"></v-text-field>
                    <v-text-field dense outlined prepend-icon="mdi-lock" label="Password" :rules="rules" v-model="user.password" :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showPassword ? 'text' : 'password'" @click:append="showPassword = !showPassword" @keyup.enter="login()"></v-text-field>
                </v-card-text>
                <v-card-actions class="px-7 mt-n5 mb-2">
                    <v-spacer></v-spacer>
                    <v-btn color="primary" @click="login()">Sign in</v-btn>
                </v-card-actions>
            </v-card>
        </v-row>
    </v-app>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            notificationSystem: {
                options: {
                    success: {
                        position: 'bottomRight'
                    },
                    error: {
                        position: 'bottomRight'
                    }
                }
            },
            SystemName: 'Employee Information System',
            rules: [
                v => !!v || 'Required'
            ],
            showPassword: false,
            user: {},
        }
    },
    methods: {
        login() {
            let username = this.user.username
            let password = this.user.password
            if(username != '' && password != '') {
                axios.post('api/signin', {
                    username,
                    password
                }).then(res => {
                    if(res.data != '') {
                        this.$store.dispatch('authSuccess', res.data[0])
                        this.$router.push('/home')
                        this.$toast.success('Log in successful!', 'Success', this.notificationSystem.options.success)
                    } else {
                        this.$toast.error('Username or password is incorrect!', 'Error', this.notificationSystem.options.error)
                    }
                })
            }
        }
    }
}
</script>
<style scoped>
.bg {
    background-color: ghostwhite;
}
</style>