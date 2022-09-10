<template>
    <div
        class="bg-greyColor rounded-2xl px-4 py-16 mx-5 mb-12 border border-gray-300 shadow-md"
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
        <div class="flex gap-2">
            <div
                class="rounded-full bg-pinkColor border-2 border-solid border-redColor text-center py-2 px-4 text-sm"
            >
                Total 50
            </div>
            <div
                class="rounded-full bg-lighterGreenColor border-2 border-solid border-greenColor text-center py-2 px-4 text-sm"
            >
                Traité 50
            </div>
            <div
                class="rounded-full bg-lighterYellow border-2 border-solid border-yellow text-center py-2 px-2 text-sm"
            >
                En attente 50
            </div>
        </div>
        <div class="flex flex-col gap-2 mt-8">
            <h2 class="text-xl mb-1">Details</h2>
            <hr />
            <div class="grid grid-cols-2 text-md mt-4">
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
