<template>
    <div>
        <navbar/>
        <router-view/>
    </div>
</template>

<script>
import Navbar from "@components/navigation/Navbar";

export default {
    components: {
        Navbar
    }
}
</script>

<style scoped>
.centered {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
