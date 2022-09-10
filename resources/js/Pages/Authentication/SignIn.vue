<template lang="">
    <default-layout>

     <SignIn/>

    </default-layout>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout.vue";
import SignIn from "../../Components/Authentication/SignIn.vue"
export default {
    name: "CitizenHome",
    components: {
        DefaultLayout,
        SignIn,
    },
};
</script>
