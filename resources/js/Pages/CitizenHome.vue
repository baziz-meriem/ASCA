<template lang="">
    <user-layout>

        <WelcomeSection />
        <suivit />
        <EventSlider />

    </user-layout>
</template>

<script>
import UserLayout from "../Layouts/UserLayout.vue";
import customNavBar from "../Header/customNavBar.vue";
import EventSlider from "../Components/CitizenComponents/HomeComponents/EventSlider.vue";
import Suivit from "../Components/CitizenComponents/HomeComponents/Suivit.vue";
import WelcomeSection from "../Components/CitizenComponents/HomeComponents/WelcomeSection.vue";

export default {
    name: "CitizenHome",
    components: {
        UserLayout,
        customNavBar,
        WelcomeSection,
        Suivit,
        EventSlider,
    },
};
</script>
