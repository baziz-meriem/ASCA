<template lang="">
    <div class="overflow-x-hidden">
       <!--- <div>{{ this.loggedUser.name }}</div> -->
        <Upheader />
        <NavBar />
        <Slider />
        <Apropos />
        <Counter />
        <NosService />
        <Videosection />
        <Footer/>
    </div>
</template>

<script>
import NavBar from "../Header/NavBar.vue"
import Slider from "../Components/HomeComponents/Slider.vue";
import Apropos from "../Components/HomeComponents/Apropos.vue";
import Counter from "../Components/HomeComponents/Counter.vue";
import Videosection from "../Components/HomeComponents/Videosection.vue";
import NosService from "../Components/HomeComponents/NoServices.vue";
import Upheader from "../Header/Upheader.vue"
import Footer from "../Footers/Appfooter.vue"
export default {
    name: "home",
    components: {
        NavBar,
        Upheader,
        Slider,
        Apropos,
        Videosection,
        NosService,
        Counter,
        Footer,
    },
    //props: ["user"],
    data: function () {
        return {
            //loggedUser: {},
        };
    },
    mounted() {
       // this.loggedUser = JSON.parse(this.user);
    },
};
</script>
