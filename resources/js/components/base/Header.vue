<template>
    <v-card class="header">
        <v-img height="6rem" class="white--text align-center" :src="require('../.././assets/header.jpg')">
        <h2 class="font-weight-black text-center text-uppercase">
            {{title}}
        </h2>
        </v-img>
    </v-card>
</template>
<script>
export default {
    props: {
        title: {
            type: String
        }
    }
}
</script>
<style scoped>
.header {
    position: absolute;
    width: 96%;
    left: 2%;
}
</style>