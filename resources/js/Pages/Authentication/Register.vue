<template lang="">
    <Register />
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout.vue";
import Register from "../../Components/Authentication/Register.vue";

export default {
    name: "CitizenHome",
    components: {
        DefaultLayout,
        Register,
    },
};
</script>
