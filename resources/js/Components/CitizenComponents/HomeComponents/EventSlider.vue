<template>
    <div
        class="mx-20 px-16 mt-20 pt-2 font-semibold text-color-secondcolor text-2xl inline-flex items-center gap-4"
    >
        <span> Voir Plus d'Evenements </span>
        <svg
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                fill-rule="evenodd"
                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                clip-rule="evenodd"
            ></path>
        </svg>
    </div>
    <div>
        <swiper
            :style="{
                '--swiper-navigation-color': '#529B9B',
                '--swiper-pagination-color': '#529B9B',
            }"
            :modules="modules"
            :slidesPerView="4"
            :spaceBetween="20"
            :pagination="{
                clickable: true,
            }"
            :initialSlide="1"
            :navigation="true"
            class="mySwiper"
            @swiper="setSwiperRef"
        >
            <swiper-slide
                v-for="(slideContent, index) in slides"
                :key="index"
                :virtualIndex="index"
                ><Card :data="slideContent"
            /></swiper-slide>
        </swiper>
    </div>
</template>
<script>
import Card from "./Card.vue";
import { Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";

import "swiper/css/pagination";
import "swiper/css/navigation";
import "swiper/css/virtual";

// import Swiper core and required modules
import { Pagination, Navigation, Virtual } from "swiper";

export default {
    components: {
        Swiper,
        SwiperSlide,
        Card,
    },
    setup() {
        // Create array of slides data
        const slides = [
            {
                title: "Reboisement 1",
                content:
                    "Célébration de la Journée nationale de l'arbre: les Directions de l'environnement de wilaya organisent des opérations de reboisement",
                image: "https://www.gettyimages.fr/gi-resources/images/500px/983703508.jpg",
            },
            {
                title: "Reboisement2",
                content:
                    "Célébration de la Journée nationale de l'arbre: les Directions de l'environnement de wilaya organisent des opérations de reboisement",
                image: "https://www.gettyimages.fr/gi-resources/images/500px/983703508.jpg",
            },
            {
                title: "Nettoyage des plages3",
                content:
                    "Célébration de la Journée nationale de l'arbre: les Directions de l'environnement de wilaya organisent des opérations de reboisement",
                image: "https://www.gettyimages.fr/gi-resources/images/500px/983703508.jpg",
            },
            {
                title: "Lutte contre le cancer4",
                content:
                    "Célébration de la Journée nationale de l'arbre: les Directions de l'environnement de wilaya organisent des opérations de reboisement",
                image: "https://www.gettyimages.fr/gi-resources/images/500px/983703508.jpg",
            },
            {
                title: "Nettoyage des plages5",
                content:
                    "Célébration de la Journée nationale de l'arbre: les Directions de l'environnement de wilaya organisent des opérations de reboisement",
                image: "https://www.gettyimages.fr/gi-resources/images/500px/983703508.jpg",
            },
            {
                title: "Nettoyage des plages5",
                content:
                    "Célébration de la Journée nationale de l'arbre: les Directions de l'environnement de wilaya organisent des opérations de reboisement",
                image: "https://www.gettyimages.fr/gi-resources/images/500px/983703508.jpg",
            },
            {
                title: "Nettoyage des plages5",
                content:
                    "Célébration de la Journée nationale de l'arbre: les Directions de l'environnement de wilaya organisent des opérations de reboisement",
                image: "https://www.gettyimages.fr/gi-resources/images/500px/983703508.jpg",
            },
        ];

        return {
            slides,
            modules: [Pagination, Navigation, Virtual],
        };
    },
};
</script>
<style scoped>
.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}

.swiper {
    width: 90%;
    height: 20%;
}

.swiper-slide img {
    display: block;
    height: 10%;
    width: 15%;
    object-fit: cover;
}

.swiper {
    width: 90%;
    height: 560px;
    margin: 16px auto;
}

.swiper-button-prev,
.swiper-button-next {
    --swiper-theme-color: #d12121;
}
.swiper-pagination {
    color: #d12121;
}
</style>