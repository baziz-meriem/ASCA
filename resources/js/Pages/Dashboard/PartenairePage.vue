<template lang="">
    <div class="wrapper flex w-full">
            <Navigation />
            <Partenaire />
            <PartenaireMain />
            
        </div>
</template>

<script>
import Navigation from "../../Components/Dashboard/NavCompte.vue"
import Partenaire from "../../Components/Dashboard/Partenaire.vue"
import PartenaireMain from "../../Components/Dashboard/PartenaireMain.vue"
export default {
    name: "home",
    components: {
        Navigation,
        Partenaire,
        PartenaireMain
        
    }
};
</script>