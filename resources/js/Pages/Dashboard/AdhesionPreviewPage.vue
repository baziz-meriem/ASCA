<template lang="">
    <div class="wrapper flex w-full">
            <Navigation />
            <AdhesionDetails />
        </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/Navigation.vue";
import AdhesionDetails from "../../Components/Dashboard/AdhesionDetails.vue"
export default {
    name: "home",
    components: {
        Navigation,
        AdhesionDetails
    },
};
</script>
