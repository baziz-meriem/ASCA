<template>
    <div class="form-section">
        <div class="mb-4">
            <label
                for="LieuNaiss"
                class="block text-lg font-semibold text-grayColor"
                >Lieu de Dépassement</label
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

        <div class="flex align-center gap-12 mt-8">
            <div class="pt-5 text-base font-semibold">
                Nature du dépassement
            </div>
            <div class="w-72">
                <select
                    id="underline_select"
                    :class="
                        v$.nature.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="state.nature"
                >
                    <option value="">Nature</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">Algeria</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <span class="text-orangeColor pl-2" v-if="v$.nature.$error">
                {{ v$.nature.$errors[0].$message }}
            </span>
        </div>

        <label for="message" class="block mb-2 mt-8 text-base font-semibold"
            >Déscription du dépassement</label
        >
        <textarea
            id="message"
            rows="4"
            class="form-text-area"
            placeholder="Your message..."
            v-model="state.Desdepass"
        ></textarea>
        <span class="text-orangeColor pl-2" v-if="v$.Desdepass.$error">
            {{ v$.Desdepass.$errors[0].$message }}
        </span>

        <div class="flex mt-5">
            <label for="inline-checkbox" class="mr-16 text-base font-bold"
                >Avez-vous demandé à voir un responsable ?
            </label>
            <div class="flex items-center mr-10">
                <input
                    id="inline-checkbox"
                    type="checkbox"
                    value="Non"
                    class="form-check"
                    v-model="state.responsable"
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
                    class="form-check"
                    v-model="state.responsable"
                    @change="setOptions"
                />
                <label
                    for="inline-2-checkbox"
                    class="ml-2 text-lg font-semibold text-secondcolor"
                    >Oui</label
                >
            </div>
        </div>
        <div :class="state.responsable[0] === 'Oui' ? ' ' : ' hidden'">
            <label
                for="message"
                class="block mb-2 text-base font-semibold dark:text-gray-400 mt-8"
                >Quelle est sa conduite ?</label
            >
            <textarea
                id="message"
                rows="4"
                :class="
                    v$.commune.$error === true
                        ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                        : ''
                "
                class="form-text-area"
                placeholder="Your message..."
                v-model="state.conduite"
            ></textarea>
            <span class="text-orangeColor pl-2" v-if="v$.conduite.$error">
                {{ v$.conduite.$errors[0].$message }}
            </span>
        </div>

        <label
            for="message"
            class="block mb-2 text-base font-semibold text-secondcolor dark:text-gray-400 mt-8"
            >Pensez-vous qu’il était possible d’éviter cette situation (par
            vous-même ou par l’agent en question)</label
        >
        <textarea
            id="message"
            rows="4"
            :class="
                v$.commune.$error === true
                    ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                    : ''
            "
            class="form-text-area"
            placeholder="Your message..."
            v-model="state.eviter"
        ></textarea>
        <span class="text-orangeColor pl-2" v-if="v$.eviter.$error">
            {{ v$.eviter.$errors[0].$message }}
        </span>
        <div class="text-right">
            <button class="form-button" @click="nextForm()">Envoyer</button>
        </div>
    </div>
</template>
<script>
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required, alphaNum } from "@vuelidate/validators";

export default {
    setup() {
        const state = reactive({
            responsable: ["Non"],
            v$: useVuelidate(),
            pays: "",
            wilaya: "",
            daira: "",
            commune: "",
            codeP: "",
            nature: "",
            Desdepass: "",
            conduite: "",
            eviter: "",
        });

        const rules = {
            pays: { required },
            wilaya: { required },
            daira: { required },
            commune: { required },
            codeP: { required },
            nature: { required },
            Desdepass: { required, alphaNum },
            conduite: { alphaNum },
            eviter: { alphaNum },
        };
        const v$ = useVuelidate(rules, state);
        return { state, v$ };
    },

    emits: ["scroll"],
    methods: {
        setOptions(e) {
            this.state.responsable = [e.target.value];
        },

        nextForm() {
            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {
                
                 this.$emit("scroll");
            } else {
                 this.$emit("scroll");
            }
        },
    },
};
</script>
