<template lang="">
    <div class="wrapper flex w-full">
            <Navigation />
            <Contributions />
        </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/Navigation.vue";
import Contributions from "../../Components/Dashboard/Contributions.vue"
export default {
    name: "home",
    components: {
        Navigation,
        Contributions
    },
};
</script>
