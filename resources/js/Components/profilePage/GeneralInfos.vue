<template>
    <div
        :class="submitAlert ? 'fixed' : 'hidden'"
        class="px-8 pb-10 pt-5 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-900 bg-opacity-80 z-50 rounded-2xl border-4 border-primcolor shadow-sm"
    >
        <FontAwesomeIcon
            icon="fa-solid fa-exclamation-circle"
            class="pb-5 text-xl text-primcolor"
        />
        <div className="text-lg font-bold text-center text-white">
            Vous Voulez vraiment modifier votre compt
        </div>
        <div v-if="submitting" class="mt-5"><Loader /></div>
        <div v-if="!submitting" className="w-64 gap-4 flex mx-auto ">
            <button className="form-button  text-white" @click="editProfil()">
                Confirmer
            </button>
            <button
                className="form-button-red text-white"
                @click="() => showConfirmationAlert(false)"
            >
                Annuler
            </button>
        </div>
    </div>
    <div
        class="flex flex-wrap py-10 bg-primcolor bg-opacity-5 border-l-4 border-primcolor my-5"
    >
        <div
            class="flex justify-between bg-green-100 w-full mx-32 border mb-10 border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert"
            :class="modified ? 'block' : 'hidden'"
        >
            <span class="block sm:inline"
                >Informations modifiéé avec succèse</span
            >
            <button @click="setModified(false)">X</button>
        </div>
        <div class="text-2xl w-1/3 px-5 font-semibold">
            General Informations
        </div>

        <form class="px-32 w-2/3">
            <div class="mb-4">
                <lebel class="text-lg font-medium">Full Name</lebel>
                <input
                    required
                    type="text"
                    class="form-input mt-2 w-10/12"
                    v-model="userData.name"
                />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium">Email</lebel>
                <input
                    required
                    type="email"
                    class="form-input mt-2 w-10/12"
                    v-model="userData.email"
                />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium">Numéro de tléphone</lebel>
                <input
                    required
                    type="tel"
                    class="form-input mt-2 w-10/12"
                    v-model="userData.phoneNumber"
                />
            </div>
            <div class="mb-4">
                <lebel class="text-lg font-medium">Addess</lebel>
                <input
                    required
                    type="text"
                    class="form-input mt-2 w-10/12"
                    v-model="userData.address"
                />
            </div>
            <div class="mb-2">
                <lebel class="text-lg font-medium">date de naissance</lebel>
                <input
                    required
                    type="date"
                    class="form-input mt-2 w-10/12"
                    v-model="userData.date"
                />
            </div>
            <div class="mb-4">
                <button
                    class="form-button block ml-auto mr-24"
                    @click="checkForm"
                >
                    Modifier
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import auth from "../../services/auth";
import Loader from "../../Components/Dashboard/Loader.vue";
/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";
/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
/* import specific icons */
import { faExclamationCircle } from "@fortawesome/free-solid-svg-icons";
/* add icons to the library */
library.add(faExclamationCircle);
export default {
    components: {
        FontAwesomeIcon,
        Loader,
    },
    data: function () {
        return {
            userData: {},
            submitAlert: false,
            submitting: false,
            modified: false,
        };
    },
    props: ["user"],
    mounted() {
        if (auth.isLoggedIn) {
            axios
                .get(`/api/users/${auth.getloggedUser().id}`)
                .then((res) => (this.userData = res.data));
        } else {
            this.$route.push("/SignIn");
        }
    },
    methods: {
        checkForm() {
            this.showConfirmationAlert(true);
            console.log(this.userData);
        },
        showConfirmationAlert(value) {
            this.submitAlert = value;
        },
        editProfil() {
            this.submitting = true;
            axios
                .patch(`/api/user/${this.userData.id}`, this.userData)
                .then(() => {
                    this.showConfirmationAlert(false);
                    this.submitting = false;
                    this.setModified(true);
                    axios
                        .get(`/api/users/${this.userData.id}`)
                        .then((res) => (this.userData = res.data));
                });
        },
        setModified(value) {
            this.modified = value;
        },
    },
};
</script>

<style></style>
