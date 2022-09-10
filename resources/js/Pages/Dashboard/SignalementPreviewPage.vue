<template lang="">
    <div class="wrapper flex w-full">
        <Navigation />
        <SignalementDetails />
    </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/Navigation.vue";
import SignalementDetails from "../../Components/Dashboard/SignalementDetails.vue";
export default {
    mounted() {},
    name: "home",
    methods: {},
    data: function () {},
    components: {
        Navigation,
        SignalementDetails,
    },
};
</script>
