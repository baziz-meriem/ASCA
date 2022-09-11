<template>
    <div class="form-section">
        <h1 class="text-lg font-bold text-secondcolor mb-10">
            Bureau ASCA Proposé :
        </h1>
        <div class="flex mb-10">
            <label for="inline-checkbox" class="mr-16 text-base font-bold"
                >Choisir un Autre Bureau</label
            >
            <div class="flex items-center mr-10">
                <input
                    id="inline-checkbox"
                    type="checkbox"
                    value="Non"
                    class="w-4 h-4 text-primcolor bg-greyColor rounded border-secondcolor focus:ring-primcolor focus:ring-2"
                    v-model="state.choix"
                    @change="setOptions"
                />
                <label
                    for="inline-checkbox"
                    class="ml-2 text-base font-semibold text-secondcolor"
                    >Non</label
                >
            </div>
            <div class="flex items-center">
                <input
                    id="inline-2-checkbox"
                    type="checkbox"
                    value="Oui"
                    class="w-4 h-4 text-primcolor bg-transparent rounded border-secondcolor focus:ring-primcolor focus:ring-2"
                    v-model="state.choix"
                    @change="setOptions"
                />
                <label
                    for="inline-2-checkbox"
                    class="ml-2 text-lg font-semibold text-secondcolor"
                    >Oui</label
                >
            </div>
        </div>
        <div :class="choix === 'Oui' ? ' ' : ' hidden'">
            <div class="mb-4">
                <label
                    for="LieuNaiss"
                    class="block text-lg font-semibold text-grayColor"
                    >Adresse</label
                >
            </div>
            <div class="select-card">
                <div class="flex gap-36 w-75 h-50">
                    <select
                        id="underline_select"
                        :class="
                            v$.pays.$error === true
                                ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                                : ''
                        "
                        class="form-select"
                        v-model="state.pays"
                    >
                        <option value="">Sélectionnez le Pays</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">Algeria</option>
                        <option value="DE">Germany</option>
                    </select>

                    <select
                        id="underline_select"
                        :class="
                            v$.wilaya.$error === true
                                ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                                : ''
                        "
                        class="form-select"
                        v-model="state.wilaya"
                    >
                        <option value="">Sélectionnez la Wilaya</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">Algeria</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="flex gap-36 w-75 h-50 mb-8">
                    <span
                        class="text-orangeColor w-full pl-2 text-sm"
                        v-if="v$.pays.$error"
                    >
                        {{ v$.pays.$errors[0].$message }}
                    </span>
                    <span
                        class="text-orangeColor w-full pl-2 text-sm"
                        v-if="v$.wilaya.$error"
                    >
                        {{ v$.wilaya.$errors[0].$message }}
                    </span>
                </div>
                <div class="flex gap-36 w-70 h-50">
                    <select
                        id="underline_select"
                        :class="
                            v$.daira.$error === true
                                ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                                : ''
                        "
                        class="form-select"
                        v-model="state.daira"
                    >
                        <option value="">Sélectionnez la Daira</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">Algeria</option>
                        <option value="DE">Germany</option>
                    </select>

                    <select
                        id="underline_select"
                        :class="
                            v$.commune.$error === true
                                ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                                : ''
                        "
                        class="form-select"
                        v-model="state.commune"
                    >
                        <option value="">Sélectionnez la Commune</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">Algeria</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="flex gap-36 w-75 h-50 mb-8">
                    <span
                        class="text-orangeColor w-full pl-2 text-sm"
                        v-if="v$.daira.$error"
                    >
                        {{ v$.daira.$errors[0].$message }}
                    </span>
                    <span
                        class="text-orangeColor w-full pl-2 text-sm"
                        v-if="v$.commune.$error"
                    >
                        {{ v$.commune.$errors[0].$message }}
                    </span>
                </div>
                <div class="w-72">
                    <select
                        id="underline_select"
                        :class="
                            v$.codeP.$error === true
                                ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                                : ''
                        "
                        class="form-select"
                        v-model="state.codeP"
                    >
                        <option value="">Sélectionnez le Code Postale</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">Algeria</option>
                        <option value="DE">Germany</option>
                    </select>
                    <span
                        class="text-orangeColor w-full pl-2 text-sm"
                        v-if="v$.codeP.$error"
                    >
                        {{ v$.codeP.$errors[0].$message }}
                    </span>
                </div>
            </div>
        </div>

        <label class="block mb-5 text-lg font-bold mt-10" for="large_size"
            >Dossier</label
        >
        <div class="select-card">
            <div class="flex">
                <label
                    class="block mb-5 text-base font-bold text-secondcolor w-full"
                    for="default_size"
                    >Extrait de naissance</label
                >
                <input
                    class="block mb-5 w-full text-base text-gray-900 bg-transparent cursor-pointer focus:outline-none"
                    id="default_size"
                    type="file"
                />
            </div>
            <div class="flex">
                <label
                    class="block mb-5 text-base font-bold text-secondcolor mt-5 w-full"
                    for="default_size"
                    >Certificat de residence</label
                >
                <input
                    class="block mb-5 w-full text-base text-gray-900 bg-transparent cursor-pointer focus:outline-none"
                    id="default_size"
                    type="file"
                />
            </div>
            <div class="flex">
                <label
                    class="block mb-5 text-base font-bold text-secondcolor mt-5 w-full"
                    for="default_size"
                    >Pièce d’identité</label
                >
                <input
                    class="block mb-5 w-full text-base text-gray-900 bg-transparent cursor-pointer focus:outline-none"
                    id="default_size"
                    type="file"
                />
            </div>
            <div class="flex">
                <label
                    class="block mb-5 text-base font-bold text-secondcolor mt-5 w-full"
                    for="default_size"
                    >Photo</label
                >
                <input
                    class="block mb-5 w-full text-base text-gray-900 bg-transparent cursor-pointer focus:outline-none"
                    id="default_size"
                    type="file"
                />
            </div>
            <div class="flex">
                <label
                    class="block mb-5 text-base font-bold text-secondcolor mt-5 w-full"
                    for="default_size"
                    >Reçu de paiement de la cotisation</label
                >
                <input
                    class="block mb-5 w-full text-base text-gray-900 bg-transparent cursor-pointer focus:outline-none"
                    id="default_size"
                    type="file"
                />
            </div>
        </div>

        <div class="text-center">
            <button
                class="form-button uppercase font-bold bg-primcolor hover:bg-lighter-primcolor hover:text-primcolor text-white"
                @click ="submitForm()"
            > 
                Envoyer
            </button>
        </div>
    </div>
</template>
<script>
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";

export default {
    data() {
        return {
            
        };
    },

    setup() {
        const state = reactive({
            choix: "Non",
            v$: useVuelidate(),
            pays: "",
            wilaya: "",
            daira: "",
            commune: "",
            codeP: "",
        });
        const rules = {
            pays: {  },
            wilaya: {  },
            daira: {  },
            commune: {  },
            codeP: {  },
        };
        const v$ = useVuelidate(rules, state);
        return { state, v$ };
    },
    emits: ["scroll"],

    methods: {
        setOptions(e) {
            this.state.choix = e.target.value;
        },

        submitForm() {
            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {
                // if ANY fail validation
                 this.$emit("scroll");
            } else {
                this.$emit("scroll");
            }
        },
    },
};
</script>
