<template lang="">
    <div class="overflow-x-hidden">
       <!--- <div>{{ this.loggedUser.name }}</div> -->
        <Upheader/>
        <customNavBar/>
        <Navigation/>
        <slot/> <!--Where the content will be rendered-->
        <Footer/>
    </div>
</template>

<script>
import customNavBar from "../Header/customNavBar.vue"
import Upheader from "../Header/Upheader.vue"
import Footer from "../Footers/Appfooter.vue"
import Navigation from "../Components/Dashboard/Navigation.vue"
export default {
    name: "home",
    components: {
        customNavBar,
        Upheader,
        Navigation,
        Footer,
    },
};
</script>
