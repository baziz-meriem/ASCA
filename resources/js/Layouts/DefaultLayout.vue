<template lang="">
    <div class="overflow-x-hidden">
        <!--- <div>{{ this.loggedUser.name }}</div> -->

        <NavBar />
        <slot />
        <!--Where the content will be rendered-->
        <Footer />
    </div>
</template>

<script>
import NavBar from "../Header/NavBar.vue";
import Upheader from "../Header/Upheader.vue";
import Footer from "../Footers/Appfooter.vue";
export default {
    name: "home",
    components: {
        NavBar,
        Upheader,
        Footer,
    },
};
</script>
