<template>
    <div
        :class="this.state.confirmationAlert ? 'fixed' : 'hidden'"
        class="px-8 pb-10 pt-5 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-900 bg-opacity-80 z-50 rounded-2xl border-4 border-primcolor shadow-sm"
    >
        <FontAwesomeIcon
            icon="fa-solid fa-exclamation-circle"
            class="pb-5 text-xl text-primcolor"
        />
        <div className="text-lg font-bold text-center text-white">
            Confirmer la creation de votre signalement!
        </div>
        <div v-if="submitting" class="mt-5"><Loader /></div>
        <div v-if="!submitting" className="w-64 gap-4 flex mx-auto ">
            <button
                className="form-button  text-white"
                @click="createsignalement()"
            >
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
    <div class="form-section">
        <div
            class="bg-green-100 border mb-4 border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert"
            :class="this.state.signalementAdded ? 'block' : 'hidden'"
        >
            <span class="block sm:inline">Signalement créé avec succèse</span>
        </div>
        <div class="mb-4">
            <label
                for="LieuNaiss"
                class="block text-lg font-semibold text-grayColor"
                >Lieu de Dépassement</label
            >
        </div>
        <div class="select-card">
            <div class="lg:flex gap-36 w-75 h-50">
                <select
                    id="underline_select"
                    :class="
                        v$.pays.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="state.pays"
                    @change="(e) => changeData(e)"
                    name="pays"
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
                    @change="(e) => changeData(e)"
                    name="wilaya"
                >
                    <option value="">Sélectionnez la Wilaya</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">Algeria</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div class="lg:flex gap-36 w-75 h-50 mb-8">
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
            <div class="lg:flex gap-36 w-70 h-50">
                <select
                    id="underline_select"
                    :class="
                        v$.daira.$error === true
                            ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                            : ''
                    "
                    class="form-select"
                    v-model="state.daira"
                    @change="(e) => changeData(e)"
                    name="daira"
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
                    @change="(e) => changeData(e)"
                    name="commune"
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
                    @change="(e) => changeData(e)"
                    name="codePostale"
                >
                    <option value="">Sélectionnez le Code Postale</option>
                    <option value="500">United States</option>
                    <option value="500">Canada</option>
                    <option value="500">Algeria</option>
                    <option value="500">Germany</option>
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
                    name="nature"
                    @change="(e) => changeData(e)"
                >
                    <option value="">Nature</option>
                    <option value="environnmentale">environnmentale</option>
                    <option value="sociale">sociale</option>
                    <option value="economique">economique</option>
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
            :class="
                v$.Desdepass.$error === true
                    ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                    : ''
            "
            @change="(e) => changeData(e)"
            name="depass_description"
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
                    class="form-check"
                    :checked="state.responsable[0] === false"
                    @change="() => setOptions(false)"
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
                    class="form-check"
                    :checked="state.responsable[0] === true"
                    @change="() => setOptions(true)"
                />
                <label
                    for="inline-2-checkbox"
                    class="ml-2 text-lg font-semibold text-secondcolor"
                    >Oui</label
                >
            </div>
        </div>
        <div :class="state.responsable[0] === true ? ' ' : ' hidden'">
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
                name="conduit"
                @change="(e) => changeData(e)"
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
            name="solution_propose"
            @change="(e) => changeData(e)"
        ></textarea>
        <span class="text-orangeColor pl-2" v-if="v$.eviter.$error">
            {{ v$.eviter.$errors[0].$message }}
        </span>
        <div class="text-right">
            <button class="form-button" @click="() => checkFormValidation()">
                Envoyer
            </button>
        </div>
    </div>
</template>

<script>
import auth from "../../../services/auth";
import Loader from "../../Dashboard/Loader.vue";
//vuelidate imports APIComp
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required, alphaNum } from "@vuelidate/validators";
//date picker
import { ref } from "vue";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";
/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
/* import specific icons */
import { faExclamationCircle } from "@fortawesome/free-solid-svg-icons";
/* add icons to the library */
library.add(faExclamationCircle);

export default {
    components: { Datepicker, FontAwesomeIcon, Loader },
    data: function () {
        return {
            signalementData: {},
            loggedUser: {},
            submitting: false,
        };
    },
    setup() {
        const state = reactive({
            v$: useVuelidate(),
            responsable: [false],
            pays: "",
            wilaya: "",
            daira: "",
            commune: "",
            codeP: "",
            nature: "",
            Desdepass: "",
            conduite: "",
            eviter: "",
            signalementAdded: false,
            confirmationAlert: false,
        });

        const rules = {
            pays: { required },
            wilaya: { required },
            daira: { required },
            commune: { required },
            codeP: { required },
            nature: { required },
            Desdepass: { required },
            conduite: {},
            eviter: {},
        };
        const v$ = useVuelidate(rules, state);
        return { state, v$ };
    },
    emits: ["next", "scroll"],
    methods: {
        showConfirmationAlert(value) {
            this.state.confirmationAlert = value;
        },
        changeData(e) {
            this.signalementData[e.target.name] = e.target.value;
            console.log(this.signalementData);
        },
        setOptions(value) {
            this.state.responsable = [value];
        },
        checkFormValidation() {
            this.signalementData["voir_respo"] = this.state.responsable[0];
            this.signalementData["user_id"] = auth.getloggedUser().id;
            this.signalementData["depassement"] = "dede";

            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {
                this.showConfirmationAlert(true);
            } else {
                window.scrollTo(0, 0);
            }
        },
        createsignalement() {
            this.submitting = true;
            axios.post("/api/signalement", this.signalementData).then(() => {
                this.state.signalementAdded = true;
                window.scrollTo(0, 0);

                this.showConfirmationAlert(false);
                this.submitting = false;
                this.$router.push("/citizenHome");
            });
        },
    },
};
</script>

<style lang="scss">
.dp-custom-input {
    color: #2b3238;
    border-color: #2b3238;
    border-width: 1px;

    &:hover {
        border-color: #529b9b;
    }
}

.dp-custom-cell {
    border-radius: 50%;
}
.dp-custom-menu {
    border-radius: 1rem;
}
.dp__theme_light {
    --dp-hover-color: rgba(82, 155, 155, 0.3);
    --dp-hover-text-color: #ffff;
    --dp-primary-color: #529b9b;
    --dp-primary-text-color: #ffff;
    --dp-menu-border-color: #2b3238;
    --dp-disabled-color: #c5dada;
    --dp-scroll-bar-background: #529b9b;
    --dp-icon-color: #0b0e0e;
}
.icon {
    padding: 10px;
    min-width: 40px;
    position: absolute;
    width: 2.5rem;
    height: 2.5rem;
}
</style>
