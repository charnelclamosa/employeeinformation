<template>
<v-app id="background">
    <router-view name="nav"></router-view>
    <transition name="fade">
        <router-view></router-view>
    </transition>
</v-app>
</template>

<script>
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition-property: opacity;
    transition-duration: .60s;
}

.fade-enter-active {
    transition-delay: .60s;
}

.fade-enter,
.fade-leave-active {
    opacity: 0
}

#background {
    background-color: ghostwhite;
}
</style>
