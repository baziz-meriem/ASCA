<template>
    <form class="form-section">
        <div
            class="bg-green-100 border mb-4 border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert"
            :class="this.state.signalementAdded ? 'block' : 'hidden'"
        >
            <span class="block sm:inline"
                >Signalement modifié avec succèse</span
            >
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
                    <option value="">
                        {{ SignalementData.pays }}
                    </option>
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
                    <option value="">{{ SignalementData.wilaya }}</option>
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
                    <option value="">{{ SignalementData.daira }}</option>
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
                    <option value="">{{ SignalementData.commune }}</option>
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
                    <option value="">{{ SignalementData.codePostale }}</option>
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
                    <option value="">{{ SignalementData.nature }}</option>
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
            v-model="SignalementData.depass_description"
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
                    :checked="!state.responsable[0]"
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
                    :checked="state.responsable[0]"
                    @change="() => setOptions(true)"
                />
                <label
                    for="inline-2-checkbox"
                    class="ml-2 text-lg font-semibold text-secondcolor"
                    >Oui</label
                >
            </div>
        </div>
        <div :class="state.responsable[0] ? ' ' : ' hidden'">
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
                name="conduit"
                v-model="SignalementData.conduit"
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
            v-model="SignalementData.solution_propose"
            name="solution_propose"
            @change="(e) => changeData(e)"
        ></textarea>
        <span class="text-orangeColor pl-2" v-if="v$.eviter.$error">
            {{ v$.eviter.$errors[0].$message }}
        </span>
        <div class="text-right">
            <button class="form-button" @click="nextForm()">
                Sauvgarder les modification
            </button>
        </div>
    </form>
</template>

<script>
//vuelidate imports APIComp
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required, alphaNum } from "@vuelidate/validators";
//date picker imports
import { ref } from "vue";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

export default {
    components: { Datepicker },
    data: function () {
        return {
            SignelamentModif: {},
            SignalementData: {},
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
        });

        const rules = {
            pays: {},
            wilaya: {},
            daira: {},
            commune: {},
            codeP: {},
            nature: {},
            Desdepass: { required },
            conduite: {},
            eviter: {},
        };
        const v$ = useVuelidate(rules, state);
        return { state, v$ };
    },
    emits: ["next", "scroll"],
    methods: {
        setSignData(data) {
            this.SignalementData = data;
        },
        changeData(e) {
            this.SignelamentModif[e.target.name] = e.target.value;
            console.log(this.SignelamentModif);
        },
        setOptions(value) {
            this.state.responsable = [value];
        },
        nextForm() {
            this.SignelamentModif["voir_respo"] = this.state.responsable[0];

            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {
                axios
                    .patch(
                        `/api/signalement/${this.$route.params.id}`,
                        this.SignelamentModif
                    )
                    .then(() => {
                        this.state.signalementAdded = true;
                        window.scrollTo(0, 0);
                    });
            } else {
                window.scrollTo(0, 0);
            }
        },
    },

    mounted() {
        axios.get(`/api/signalement/${this.$route.params.id}`).then((res) => {
            this.setSignData(res.data);
            console.log(this.SignalementData.voir_respo);
            this.state.responsable[0] = this.SignalementData.voir_respo;
            this.state.Desdepass = this.SignalementData.depass_description;
            this.state.conduite = this.SignalementData.conduit;
            this.state.evite = this.SignalementData.solution_propose;
        });
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
