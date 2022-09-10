<template lang="">
    <div class="wrapper flex w-full">
            <Navigation />
            <User />
            <CitoyenMain />
            
        </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/NavCompte.vue";
import User from "../../Components/Dashboard/User.vue"
import CitoyenMain from "../../Components/Dashboard/CitoyenMain.vue"
export default {
    name: "home",
    components: {
        Navigation,
        User,
        CitoyenMain
    }
};
</script>