<template>
<v-main>
    <v-row align="center" justify="center">
        <v-card elevation="12" width="1000" height="700">
            <v-card-title>
                <card-header title="Sections"></card-header>
            </v-card-title>
            <v-card-subtitle class="mt-12">
                <div class="text-end mr-5">
                    <v-btn color="primary">Add</v-btn>
                </div>
            </v-card-subtitle>
            <v-card-text>
                <v-simple-table class="mx-5">
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Section Name</th>
                                <th>Company Code</th>
                                <th>Department Code</th>
                                <th>Section Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in datas" :key="data.id">
                                <td>{{data.id}}</td>
                                <td>{{data.username}}</td>
                                <td>{{data.updated_at}}</td>
                                <td>{{data.updated_by}}</td>
                                <td>{{data.updated_by}}</td>
                                <td>
                                    <v-icon color="success" class="mr-5">mdi-pencil</v-icon>
                                    <v-icon color="error">mdi-delete</v-icon>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-card-text>
        </v-card>
    </v-row>
</v-main>
</template>

<script>
export default {
    data() {
        return {

        }
    }
}
</script>

<style scoped>

</style>
