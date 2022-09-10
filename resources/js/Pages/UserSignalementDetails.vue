<template lang="">
    <div class="wrapper flex w-full">
        <Navigation />
        <SignalementsDetails />
    </div>
</template>

<script>
import Navigation from "../Components/Dashboard/Navigation.vue";
import SignalementsDetails from "../Components/CitizenComponents/HomeComponents/SignalementsDetails.vue";
export default {
    mounted() {},
    name: "home",
    methods: {},
    data: function () {},
    components: {
        Navigation,
        SignalementsDetails,
    },
};
</script>
