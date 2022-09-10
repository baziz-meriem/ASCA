<template>
    <div class="form-section">
        <div class="flex align-center gap-12">
            <div class="pt-5 text-base font-semibold">
                Nature de la préoccupation
            </div>
            <div class="w-72">
                <select
                    id="nature"
                    :class="
                        v$.nature.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="contribution.nature"
                >
                    <option value="" hidden>Nature</option>
                    <option value="environnmentale">environnementale</option>
                    <option value="sociale">sociale</option>
                    <option value="economique">economique</option>
                </select>
            </div>
        </div>
        <span class="text-orangeColor pl-72" v-if="v$.nature.$error">
            {{ v$.nature.$errors[0].$message }}
        </span>
        <div class="my-4">
            <label for="Lieu" class="block text-lg font-semibold text-grayColor"
                >Lieu concerné</label
            >
        </div>
        <div class="select-card">
            <div class="flex gap-36 w-75 h-50">
                <select
                    id="pays"
                    :class="
                        v$.pays.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="contribution.pays"
                >
                    <option value="" hidden>Sélectionnez le Pays</option>
                    <option value="US">United States</option>
                    <option value="France">France</option>
                    <option value="algerie">Algerie</option>
                    <option value="Canada">Canada</option>
                </select>

                <select
                    id="wilaya"
                    :class="
                        v$.wilaya.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="contribution.wilaya"
                >
                    <option value="">Sélectionnez la Wilaya</option>
                    <option value="alger">Alger</option>
                    <option value="Oran">Oran</option>
                    <option value="Bejaia">Bejaia</option>
                    <option value="Tizi Ouzou">Tizi Ouzou</option>
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
                    id="daira"
                    :class="
                        v$.daira.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="contribution.daira"
                >
                    <option value="" hidden>Sélectionnez la Daira</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="mehalma">Mehalma</option>
                    <option value="DE">Germany</option>
                </select>

                <select
                    id="commune"
                    :class="
                        v$.commune.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="contribution.commune"
                >
                    <option value="" hidden>Sélectionnez la Commune</option>
                    <option value="US">United States</option>
                    <option value="zeralda">zeralda</option>
                    <option value="FR">Algeria</option>
                    <option value="GR">Germany</option>
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
                    id="codePostale"
                    :class="
                        v$.codePostale.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="contribution.codePostale"
                >
                    <option value="" hidden>
                        Sélectionnez le Code Postale
                    </option>
                    <option value="1234">1234</option>
                    <option value="3421">3421</option>
                    <option value="1111">11111</option>
                    <option value="3452">3452</option>
                </select>

                <span
                    class="text-orangeColor w-full pl-2 text-sm"
                    v-if="v$.codePostale.$error"
                >
                    {{ v$.codePostale.$errors[0].$message }}
                </span>
            </div>
        </div>
        <div class="flex my-8">
            <label for="inline-checkbox" class="mr-16 text-base font-bold"
                >Avez-vous déjà signalé aux autorités locales ?
            </label>
            <div class="flex items-center mr-10">
                <input
                    id="maire"
                    type="checkbox"
                    value="Maire"
                    class="form-check"
                    v-model="contribution.maire"
                />
                <label
                    for="inline-checkbox"
                    class="ml-2 text-base font-semibold text-secondcolor"
                    >Maire</label
                >
            </div>
            <div class="flex items-center mr-10">
                <input
                    id="deputé"
                    type="checkbox"
                    value="Député"
                    class="form-check"
                    v-model="contribution.député"
                />
                <label
                    for="inline-2-checkbox"
                    class="ml-2 text-lg font-semibold text-secondcolor"
                    >Député</label
                >
            </div>
            <div class="flex items-center mr-10">
                <input
                    id="wali"
                    type="checkbox"
                    value="Wali"
                    class="form-check"
                    v-model="contribution.wali"
                />
                <label
                    for="inline-2-checkbox"
                    class="ml-2 text-lg font-semibold text-secondcolor"
                    >Wali</label
                >
            </div>
        </div>
        <div class="text-right">
            <button class="form-button" @click="nextForm()">
                suivant
            </button>
        </div>
    </div>
</template>

<script>
//vuelidate imports
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";

export default {
    name: "ContributionForm1",
    props: ["FormData","updation"],
    setup() {
        const contribution = reactive({
            v$: useVuelidate(),
            nature: "",
            pays: "",
            wilaya: "",
            daira: "",
            commune: "",
            codePostale: "",
            maire: "",
            wali: "",
            deputé: "",
        });

        const rules = {
            nature: { required },
            pays: { required },
            wilaya: { required },
            daira: { required },
            commune: { required },
            codePostale: { required },
            maire: {},
            wali: {},
            deputé: {},
        };
        const v$ = useVuelidate(rules, contribution);
        return { contribution, v$ };
    },
    emits: ["nextStep", "scroll", "saveData"],
    methods: {
        nextForm() {
            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {

                this.$emit("scroll");
                this.$emit('saveData', this.contribution);
                this.$emit("nextStep");//goto the next form 
            } else {
                this.$emit("scroll");
            }
        },
        selectElement(id, valueToSelect) {
            let el = document.getElementById(id);
            el.value = valueToSelect;
        },
        checkElement(id, value) {
            let el = document.getElementById(id);
            el.checked = value;
        },
    },
    mounted() {

    if (this.updation){
                    //copy specific fields from the record returned from DB
        this.contribution.nature = this.FormData.nature;
        this.contribution.pays = this.FormData.pays;
        this.contribution.wilaya = this.FormData.wilaya;
        this.contribution.commune = this.FormData.commune;
        this.contribution.daira = this.FormData.daira;
        this.contribution.codePostale = this.FormData.codePostale;
        this.contribution.wali = this.FormData.wali;
        this.contribution.deputé = this.FormData.deputé;
        this.contribution.maire = this.FormData.maire;

        //select items stored in database
        this.selectElement("nature", this.FormData.nature);
        this.selectElement("pays", this.FormData.pays);
        this.selectElement("wilaya", this.FormData.wilaya);
        this.selectElement("commune", this.FormData.commune);
        this.selectElement("daira", this.FormData.daira);

        //check the checkboxes according to database
        this.selectElement("codePostale", this.FormData.codePostale);
        this.checkElement("maire", this.FormData.deputé);
        this.checkElement("deputé", this.FormData.maire);
        this.checkElement("wali", this.FormData.wali);}
    },
};
</script>
