<template>
    <div class="form-section">
        <div class="mb-4">
            <label
                for="LieuNaiss"
                class="block text-lg font-semibold text-grayColor"
                >Adresse</label
            >
        </div>
        <div
            class="border border-gray-300 shadow-sm rounded-xl py-10 px-12 bg-white"
        >
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
        <div class="mb-4 mt-10">
            <label
                for="LieuNaiss"
                class="block text-base font-semibold text-grayColor ml-2"
                >Contact</label
            >
        </div>
        <div class="select-card">
            <div class="flex justify-between">
                <div class="w-80">
                    <div class="mb-4">
                        <label
                            for="nom"
                            class="block text-base font-semibold text-grayColor"
                            >Numéro de Teléphone (1)</label
                        >
                    </div>
                    <svg
                        class="icon"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <input
                        type="text"
                        id="default-input"
                        placeholder="Type some text "
                        :class="
                            v$.num1.$error === true
                                ? 'text-fields-errors focus:ring-orangeColor focus:border-orangeColor '
                                : ''
                        "
                        class="form-input pl-10"
                        v-model="state.num1"
                    />
                    <span
                        class="text-orangeColor pl-2 text-sm"
                        v-if="v$.num1.$error"
                    >
                        {{ v$.num1.$errors[0].$message }}
                    </span>
                </div>

                <div class="w-80">
                    <div class="mb-4">
                        <label
                            for="Prenom"
                            class="block text-base font-semibold text-grayColor"
                            >Numéro de Teléphone (2)</label
                        >
                    </div>
                    <svg
                        class="icon"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <input
                        type="text"
                        id="default-input"
                        placeholder="Type some text"
                        :class="
                            v$.num2.$error === true
                                ? 'text-fields-errors focus:ring-orangeColor focus:border-orangeColor '
                                : ''
                        "
                        class="form-input pl-10"
                        v-model="state.num2"
                    />
                    <span
                        class="text-orangeColor pl-2 text-sm"
                        v-if="v$.num2.$error"
                    >
                        {{ v$.num2.$errors[0].$message }}
                    </span>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="w-80">
                    <div class="mb-4">
                        <label
                            for="nom"
                            class="block text-base font-semibold text-grayColor"
                            >Numéro Fix</label
                        >
                    </div>
                    <svg
                        class="icon"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"
                        ></path>
                    </svg>
                    <input
                        type="text"
                        id="default-input"
                        placeholder="Type your phone number"
                        :class="
                            v$.fixe.$error === true
                                ? 'pl-10 text-fields-errors focus:ring-orangeColor focus:border-orangeColor '
                                : 'form-input pl-10'
                        "
                        
                        v-model="state.fixe"
                    />
                    <span
                        class="text-orangeColor pl-20 text-sm"
                        v-if="v$.fixe.$error"
                    >
                        {{ v$.fixe.$errors[0].$message }}
                    </span>
                </div>
                <div class="w-80">
                    <div class="mb-4">
                        <label
                            for="Prenom"
                            class="block text-base font-semibold text-grayColor"
                            >Adresse mail</label
                        >
                    </div>
                    <svg
                        class="icon"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                        ></path>
                        <path
                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                        ></path>
                    </svg>
                    <input
                        type="text"
                        id="default-input"
                        placeholder="Type your email"
                        :class="
                            v$.mail.$error === true
                                ? 'text-fields-errors focus:ring-orangeColor focus:border-orangeColor '
                                : ''
                        "
                        class="form-input pl-10"
                        v-model="state.mail"
                    />
                    <span
                        class="text-orangeColor pl-2 text-sm"
                        v-if="v$.mail.$error"
                    >
                        {{ v$.mail.$errors[0].$message }}
                    </span>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button
                class="text-sm text-primcolor dark:text-orangeColor border-2 rounded-md border-primcolor hover:bg-primcolor hover:text-white px-5 py-2 mt-5"
                @click="nextForm()"
            >
                Suivant
            </button>
        </div>
    </div>
</template>
<script>
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import {
    required,
    email,
    numeric,
    minLength,
    maxLength,
} from "@vuelidate/validators";

export default {
    setup() {
        const state = reactive({
            v$: useVuelidate(),
            pays: "",
            wilaya: "",
            daira: "",
            commune: "",
            codeP: "",
            num1: "",
            num2: "",
            fixe: "",
            mail: "",
        });

        const rules = {
            pays: { required },
            wilaya: { required },
            daira: { required },
            commune: { required },
            codeP: { required },
            num1: {
                numeric,
                required,
                minLength: minLength(10),
                maxLength: maxLength(10),
            },
            num2: {
                numeric,
                minLength: minLength(10),
                maxLength: maxLength(10),
            },
            fixe: { numeric },
            mail: { required, email },
        };
        const v$ = useVuelidate(rules, state);
        return { state, v$ };
    },

    emits: ["next","scroll"],
    methods: {
        nextForm(state) {
            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {
                // if ANY fail validation
                this.$emit("next");
                this.$emit("scroll");
            } else {
               this.$emit("scroll");
            }
        },
    },
};
</script>
<style scoped>
.icon {
    padding: 10px;
    min-width: 40px;
    position: absolute;
    width: 2.5rem;
    height: 2.5rem;
}
</style>
