<template lang="">
    <SignIn />
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout.vue";
import SignIn from "../../Components/Authentication/SignIn.vue";
export default {
    name: "CitizenHome",
    components: {
        DefaultLayout,
        SignIn,
    },
};
</script>
