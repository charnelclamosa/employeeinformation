<template>
<v-main>
    <v-row align="center" justify="center">
        <v-card elevation="12" width="1000" height="700">
            <v-card-title>
                <card-header title="Companies"></card-header>
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
                                <th>Company Code</th>
                                <th>Company Name</th>
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
                                    <v-icon color="success" class="mr-5">mdi-dots-horizontal</v-icon>
                                    <v-icon color="error">mdi-delete</v-icon>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-card-text>
        </v-card>
        <!-- Create -->
        <v-dialog v-model="CreateDialog" width="700" persistent>
            <v-card>
                <v-card-title class="headline grey lighten-2" primary-title>
                    <span class="font-weight-bold">Create</span>
                </v-card-title>
                <v-card-text class="mt-5">
                    <v-form class="mx-5">
                        <v-row>
                            <v-col cols="3">
                                <v-text-field dense outlined label="Company Code" :rules="rules"></v-text-field>
                            </v-col>
                            <v-col cols="9">
                                <v-text-field dense outlined label="Company Name" :rules="rules" clearable></v-text-field>
                            </v-col>
                        </v-row>
                        <v-textarea dense outlined label="Address" :rules="rules" clearable no-resize></v-textarea>
                        <v-text-field dense outlined label="Contact Number" :rules="rules" clearable></v-text-field>
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
        <v-dialog v-model="EditDialog" width="700" persistent>
            <v-card>
                <v-card-title class="headline grey lighten-2" primary-title>
                    <span class="font-weight-bold">Details</span>
                </v-card-title>
                <v-card-text class="mt-5">
                    <v-form class="mx-5">
                        <v-row>
                            <v-col cols="3">
                                <v-text-field dense outlined label="Company Code" :rules="rules"></v-text-field>
                            </v-col>
                            <v-col cols="9">
                                <v-text-field dense outlined label="Company Name" :rules="rules" clearable></v-text-field>
                            </v-col>
                        </v-row>
                        <v-textarea dense outlined label="Address" :rules="rules" clearable no-resize></v-textarea>
                        <v-text-field dense outlined label="Contact Number" :rules="rules" clearable></v-text-field>
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
    </v-row>
</v-main>
</template>

<script>
export default {
    data() {
        return {
            CreateDialog: false,
            EditDialog: false,
            rules: [
                v => !!v || 'Required'
            ],
        }
    }
}
</script>

<style scoped>

</style>
