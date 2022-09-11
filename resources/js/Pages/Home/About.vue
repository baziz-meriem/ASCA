<template>
    <Apropos />
</template>

<script>
import Apropos from "../../Components/HomeComponents/Apropos.vue";
export default {
    name: "About",
    components: {
        Apropos,
    },
    props: ["user"],
    created() {
        console.log(this.user);
    },
};
</script>
