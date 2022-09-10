<template lang="">
    <div class="wrapper flex w-full">
            <Navigation />
            <Signalements />
        </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/Navigation.vue";
import Signalements from "../../Components/Dashboard/Signalements.vue"
export default {
    name: "home",
    components: {
        Navigation,
        Signalements
    },
};
</script>
