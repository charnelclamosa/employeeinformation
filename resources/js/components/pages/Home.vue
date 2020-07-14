<template>
<v-main>
    <v-row align="center" justify="center">
        <v-card>
            <h1>Home</h1>
        </v-card>
    </v-row>
</v-main>
</template>

<script>
export default {
    data() {
        return {
            user: {},
        }
    },
    created() {
        // this.user = this.$store.state.user
    }
}
</script>

<style scoped>

</style>
