<template lang="">
    <div class="wrapper flex w-full">
            <Navigation />
            <Adhesions />
        </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/Navigation.vue";
import Adhesions from "../../Components/Dashboard/Adhesions.vue"
export default {
    name: "home",
    components: {
        Navigation,
        Adhesions
    },
};
</script>
