<template lang="">
    <div class="wrapper flex w-full">
            <Navigation />
            <ContributionDetails />
        </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/Navigation.vue";
import ContributionDetails from "../../Components/Dashboard/ContributionDetails.vue"
export default {
    name: "home",
    components: {
        Navigation,
        ContributionDetails
    },
    
};
</script>