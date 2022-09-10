<template>
    <div
        class="bg-greyColor rounded-2xl px-4 py-16 mx-5 shadow-md border border-gray-300 mb-8"
    >
        <img
            src="/assets/images/user1.svg"
            alt="user photo"
            class="mx-auto w-24 border-2 border-solid border-blueColor rounded-full"
        />
        <div class="flex flex-col justify-center text-center my-6">
            <h2 class="font-bold">User ID</h2>
            <h2>{{ user.email }}</h2>
        </div>
        <div class="flex flex-col gap-2 mt-4">
            <h2 class="text-xl mb-1">Details</h2>
            <div class="grid grid-cols-2 text-md">
                <h2 class="font-bold">Nom</h2>
                <h2>{{ user.nom }}</h2>
            </div>
            <div class="grid grid-cols-2 text-md">
                <h2 class="font-bold">Prénom</h2>
                <h2>{{ user.prenom }}</h2>
            </div>
            <div class="grid grid-cols-2 text-md">
                <h2 class="font-bold">Adresse</h2>
                <h2>{{ user.adress }}</h2>
            </div>
            <div class="grid grid-cols-2 text-md">
                <h2 class="font-bold">Num Tel</h2>
                <h2>{{ user.numTel }}</h2>
            </div>
            <div class="grid grid-cols-2 text-md">
                <h2 class="font-bold">Num Fix</h2>
                <h2>{{ user.numFix }}</h2>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            user: {
                nom: "User",
                prenom: "user",
                email: "user@gmail.com",
                adress: "usto oran algérie",
                numTel: "0542434546",
                numFix: "021454748",
            },
        };
    },
};
</script>
