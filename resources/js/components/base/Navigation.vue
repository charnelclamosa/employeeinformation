<template>
<v-main>
    <v-navigation-drawer app v-model="drawer" :src="require('../.././assets/19366.jpg')">
        <v-list dense>
            <v-list-item link v-for="route in routes" :key="route.name" :to="route.route">
                    <v-list-item-action>
                    <v-icon>{{route.icon}}</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title>{{route.name}}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="indigo" dark>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title class="font-weight-bold">{{SystemName}}</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon @click="logout()">
            <v-icon>mdi-logout-variant</v-icon>
        </v-btn>
    </v-app-bar>
</v-main>
</template>

<script>
export default {
    data() {
        return {
            drawer: null,
            SystemName: 'Employee Information System',
            routes: [{
                    name: 'Home',
                    icon: 'mdi-home',
                    route: '/home'
                },
                {
                    name: 'Employees',
                    icon: 'mdi-alpha-e-circle',
                    route: '/employees'
                },
                {
                    name: 'Teams',
                    icon: 'mdi-alpha-t-circle',
                    route: '/teams'
                },
                {
                    name: 'Sections',
                    icon: 'mdi-alpha-s-circle',
                    route: '/sections'
                },
                {
                    name: 'Departments',
                    icon: 'mdi-alpha-d-circle',
                    route: '/departments'
                },
                {
                    name: 'Companies',
                    icon: 'mdi-alpha-c-circle',
                    route: '/companies'
                },
                {
                    name: 'Accounts',
                    icon: 'mdi-account',
                    route: '/accounts'
                },
            ],
        }
    },
    methods: {
        logout() {
            this.$router.push('/signin')
            this.$store.dispatch('authClear')
        }
    }
}
</script>

<style scoped>

</style>
