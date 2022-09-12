<template>
    <div
        class="flex py-10 bg-primcolor bg-opacity-5 border-l-4 border-primcolor my-5"
    >
        <div class="text-2xl w-1/3 px-5 font-semibold">
            General Informations
        </div>
        <div class="px-32 w-2/3">
            <div class="mb-4">
                <lebel class="text-lg font-medium">Full Name</lebel>
                <input
                    class="form-input mt-2 w-10/12"
                    v-model="userData.name"
                />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium">Email</lebel>
                <input
                    class="form-input mt-2 w-10/12"
                    v-model="userData.email"
                />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium">Numéro de tléphone</lebel>
                <input
                    class="form-input mt-2 w-10/12"
                    v-model="userData.phoneNumber"
                />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium">Addess</lebel>
                <input
                    class="form-input mt-2 w-10/12"
                    v-model="userData.address"
                />
            </div>
            <div class="mb-2">
                <lebel class="text-lg font-medium">date de naissance</lebel>
                <input
                    type="date"
                    class="form-input mt-2 w-10/12"
                    v-model="userData.date"
                />
            </div>
            <div class="mb-4">
                <button class="form-button block ml-auto mr-24">
                    Modifier
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            userData: {},
        };
    },
    props: ["user"],
    mounted() {
        this.userData = this.user;
    },
};
</script>

<style></style>
