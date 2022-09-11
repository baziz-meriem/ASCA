<template>
    <div id="app">
        <Upheader />
        <Header />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script>
import Upheader from "./Header/Upheader.vue";
import Header from "./Header/NavBar.vue";
import Footer from "./Footers/Appfooter.vue";
export default {
    components: {
        Upheader,
        Header,
        Footer,
    },
};
</script>
