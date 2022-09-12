<template>
    <div
        class="flex py-10 bg-primcolor bg-opacity-5 border-l-4 border-primcolor my-5"
    >
        <div class="text-2xl w-1/3 px-5 font-semibold">
            Modifier le mot de passe
        </div>
        <div class="px-32 w-2/3">
            <div class="mb-4">
                <lebel class="text-lg font-medium">Mot de Passe acctuel</lebel>
                <input class="form-input mt-2 w-10/12" />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium">Nouveau mot de passe </lebel>
                <input class="form-input mt-2 w-10/12" />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium"
                    >confirmer le nouveau mot de passe</lebel
                >
                <input class="form-input mt-2 w-10/12" />
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
export default {};
</script>

<style></style>
