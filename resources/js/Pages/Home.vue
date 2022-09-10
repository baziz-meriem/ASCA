<template lang="">
    <div class="overflow-x-hidden">
       <!--- <div>{{ this.loggedUser.name }}</div> -->
     <default-layout>
        <Slider />
        <Apropos />
        <Counter />
        <NosService />
        <Videosection />
      </default-layout>
    </div>

</template>

<script>
import Slider from "../Components/HomeComponents/Slider.vue";
import Apropos from "../Components/HomeComponents/Apropos.vue";
import Counter from "../Components/HomeComponents/Counter.vue";
import Videosection from "../Components/HomeComponents/Videosection.vue";
import NosService from "../Components/HomeComponents/NoServices.vue";
import DefaultLayout from "../Layouts/DefaultLayout.vue";

export default {
    name: "home",
    components: {
        DefaultLayout,
        Slider,
        Apropos,
        Videosection,
        NosService,
        Counter,
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
