<template lang="">
    <div class="overflow-x-hidden">
        <Slider />
        <Apropos />
        <Counter />
        <NosService />
        <Videosection />
    </div>
</template>

<script>
import Slider from "../../Components/HomeComponents/Slider.vue";
import Apropos from "../../Components/HomeComponents/Apropos.vue";
import Counter from "../../Components/HomeComponents/Counter.vue";
import Videosection from "../../Components/HomeComponents/Videosection.vue";
import NosService from "../../Components/HomeComponents/NoServices.vue";
import DefaultLayout from "../../Layouts/DefaultLayout.vue";
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
};
</script>
