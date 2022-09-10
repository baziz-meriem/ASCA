<template>
    <swiper :navigation="true" :modules="modules" class="mySwiper">
        <swiper-slide><SwiperPage /></swiper-slide>
        <swiper-slide><SwiperPage /></swiper-slide>
        <swiper-slide><SwiperPage /></swiper-slide>
        <swiper-slide><SwiperPage /></swiper-slide>
    </swiper>
</template>
<script>
// import Slider pages
import SwiperPage from "./Swiperpage.vue";

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";

// import required modules
import { Navigation } from "swiper";

export default {
    components: {
        Swiper,
        SwiperSlide,
        SwiperPage,
    },
    setup() {
        return {
            modules: [Navigation],
        };
    },
};
</script>
