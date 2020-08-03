<template>
<v-main>
    <v-row align="center" justify="center">
        <v-card elevation="12" width="1000" height="700">
            <v-card-title>
                <card-header title="Accounts"></card-header>
            </v-card-title>
            <v-card-subtitle class="mt-12">
                <div class="text-end mr-5">
                    <v-btn color="primary" @click="CreateDialog = true">Add</v-btn>
                </div>
            </v-card-subtitle>
            <v-card-text>
                <v-simple-table class="mx-5">
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Last Updated Date</th>
                                <th>Updated by</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in datas" :key="data.id">
                                <td>{{data.id}}</td>
                                <td>{{data.username}}</td>
                                <td>{{data.updated_at}}</td>
                                <td>{{data.updated_by}}</td>
                                <td>
                                    <v-icon color="success" class="mr-5" @click="passObject(data)">mdi-pencil</v-icon>
                                    <v-icon color="error" @click="confirmation(data)">mdi-delete</v-icon>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-card-text>
        </v-card>
        <!-- Create -->
        <v-dialog v-model="CreateDialog" width="500" persistent>
            <v-card>
                <v-card-title class="headline grey lighten-2" primary-title>
                    <span class="font-weight-bold">Create</span>
                </v-card-title>
                <v-card-text class="mt-5">
                    <v-form class="mx-5">
                        <v-text-field dense outlined label="Username" prepend-icon="mdi-account" :rules="rules" v-model="create.username"></v-text-field>
                        <v-text-field dense outlined label="Password" prepend-icon="mdi-lock" :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showPassword ? 'text' : 'password'" @click:append="showPassword = !showPassword" :rules="rules" v-model="create.password"></v-text-field>
                        <v-text-field dense outlined label="Confirm password" prepend-icon="mdi-lock-check" :append-icon="confirmPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="confirmPassword ? 'text' : 'password'" @click:append="confirmPassword = !confirmPassword" :rules="rules" v-model="passwordCheck"></v-text-field>
                    </v-form>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="error" outlined @click="CreateDialog = false">
                        Cancel
                    </v-btn>
                    <v-btn color="primary" @click="createAccount()">
                        Create
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <!-- Edit -->
        <v-dialog v-model="EditDialog" width="500" persistent>
            <v-card>
                <v-card-title class="headline grey lighten-2" primary-title>
                    <span class="font-weight-bold">Edit</span>
                </v-card-title>
                <v-card-text class="mt-5">
                    <v-form class="mx-5">
                        <v-text-field dense outlined disabled label="Username" prepend-icon="mdi-account" v-model="edit.username"></v-text-field>
                        <v-text-field dense outlined label="Password" prepend-icon="mdi-lock" :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" :type="showPassword ? 'text' : 'password'" @click:append="showPassword = !showPassword" v-model="edit.password"></v-text-field>
                    </v-form>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="error" outlined @click="EditDialog = false">
                        Cancel
                    </v-btn>
                    <v-btn color="primary" @click="updateAccount()">
                        Update
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</v-main>
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
                    },
                    question: {
                        close: false,
                        overlay: true,
                        toastOnce: true,
                        id: 'question',
                        zindex: 999,
                        position: 'center',
                        buttons: [
                            ['<button><b>YES</b></button>', function (instance, toast) {
                                instance.hide({
                                    transitionOut: 'fadeOut'
                                }, toast, 'button');
                                self.deleteData()
                            }, true],
                            ['<button>NO</button>', function (instance, toast) {
                                instance.hide({
                                    transitionOut: 'fadeOut'
                                }, toast, 'button');
                            }]
                        ]
                    }
                }
            },
            CreateDialog: false,
            EditDialog: false,
            datas: [],
            hidePassword: '',
            create: {},
            passwordCheck: '',
            showPassword: false,
            confirmPassword: false,
            edit: {},
            delete: {},
            rules: [
                v => !!v || 'Required'
            ],

        }
    },
    created() {
        this.fetchData()
    },
    methods: {
        fetchData() {
            axios.post('api/fetchAccount').then(res => {
                this.datas = res.data
                this.hidePassword = this.data.password
            })
        },
        createAccount() {
            let username = this.create.username
            let password = this.create.password
            let confirm = this.passwordCheck
            if(username != '' && password != '' && confirm != '') {
                axios.post('api/addAccount', {
                    username,
                    password
                }).then(res => {
                    this.CreateDialog = false
                    this.fetchData()
                })
            }
        },
        passObject(val) {
            this.EditDialog = true
            this.edit = Object.assign({}, val)
        },
        updateAccount() {
            let username = this.edit.username
            let password = this.edit.password
            let updated_by = this.$store.state.user.username
            if(password != '') {
                axios.post('api/updateAccount', {
                    username,
                    password,
                    updated_by
                }).then(res => {
                    this.EditDialog = false
                    this.$toast.success('Data has been updated!', 'Success', this.notificationSystem.options.success)
                    this.fetchData()
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
