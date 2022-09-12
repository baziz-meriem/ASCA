<template>
    <div class="px-32 py-10">
        <div
            class="mb-10 text-4xl font-bold border-l-4 border-primcolor px-5 py-5 bg-primcolor bg-opacity-10"
        >
            Mon Profile
        </div>
        <hr />
        <GeneralInfos :user="userData" v-if="userData.id" />
        <hr />
        <EditPassword />
        <hr />
        <GeneralStats :userId="userData.id" v-if="userData.id" />
        <hr />
        <DangerZone />
    </div>
</template>

<script>
import auth from "../services/auth";
import GeneralInfos from "../Components/profilePage/GeneralInfos.vue";
import EditPassword from "../Components/profilePage/EditPassWord.vue";
import GeneralStats from "../Components/profilePage/GeneralStats.vue";
import DangerZone from "../Components/profilePage/DangerZone.vue";
export default {
    components: {
        GeneralInfos,
        EditPassword,
        GeneralStats,
        DangerZone,
    },
    data: function () {
        return {
            userData: {},
        };
    },
    mounted() {
        if (auth.isLoggedIn) {
            this.userData = auth.getloggedUser();
        } else {
            this.$route.push("/SignIn");
        }
    },
};
</script>

<style></style>
