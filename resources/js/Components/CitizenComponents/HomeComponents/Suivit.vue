<template>
    <div>
        <div
            class="flex space-x-7 space-y-0.5 lg:mx-40 md:mx-20 mx-10 lg:my-20 my-10"
        >
            <div
                class="pt-2 text-center sm:text-lg md:text-xl lg:text-2xl font-semibold text-color-secondcolor"
            >
                Suivi des Signalements et des Contributions
            </div>
            <div class="lg:h-10 w-1 md:h-8 h-7 bg-secondcolor mx-auto"></div>
        </div>
        <div class="bg-greyColor rounded-3xl p-4 mx-32">
            <div class="p-6 w-full">
                <div class="flex items-center justify-between pb-6">
                    <div class="flex items-center justify-between">
                        <div class="lg:ml-40 ml-10 space-x-8">
                            <button
                                class="bg-secondcolor hover:bg-gray-400 px-3 py-1.5 rounded-3xl text-white font-xs tracking-wide cursor-pointer"
                                @click="init"
                            >
                                Tous
                            </button>
                            <button
                                class="bg-secondcolor hover:bg-gray-400 px-3 py-1.5 rounded-3xl text-white font-xs tracking-wide cursor-pointer"
                            >
                                <span>Date</span>
                            </button>
                            <select
                                name="nature"
                                class="bg-secondcolor hover:bg-gray-400 w-28 px-3 py-1.5 rounded-3xl text-white font-xs tracking-wide cursor-pointer inline-flex items-center outline-none border-none focus:outline-none cursor-pointer"
                                @change="changeNature($event)"
                                v-model="nature"
                            >
                                <option value="" selected hidden>Nature</option>
                                <option
                                    value="Environnementale"
                                    class="bg-secondcolor"
                                >
                                    Environnementale
                                </option>
                                <option
                                    value="Economique"
                                    class="bg-secondcolor"
                                >
                                    Economique
                                </option>
                                <option value="Sociale" class="bg-secondcolor">
                                    Sociale
                                </option>
                            </select>
                            <select
                                name="type"
                                class="bg-secondcolor hover:bg-gray-400 w-28 px-3 py-1.5 rounded-3xl text-white font-xs tracking-wide cursor-pointer inline-flex items-center outline-none border-none focus:outline-none cursor-pointer"
                                @change="changeType($event)"
                                v-model="type"
                            >
                                <option value="" selected hidden>Type</option>
                                <option
                                    value="Signalement"
                                    class="bg-secondcolor"
                                >
                                    Signalement
                                </option>
                                <option
                                    value="Contribution"
                                    class="bg-secondcolor"
                                >
                                    Contribution
                                </option>
                                <option value="Adhesion" class="bg-secondcolor">
                                    Adhesion
                                </option>
                            </select>
                            <select
                                name="statut"
                                class="bg-secondcolor hover:bg-gray-400 w-28 px-3 py-1.5 rounded-3xl text-white font-xs tracking-wide cursor-pointer inline-flex items-center outline-none border-none focus:outline-none cursor-pointer"
                                @change="changeStatut($event)"
                                v-model="statut"
                            >
                                <option value="" selected hidden>Statut</option>
                                <option
                                    value="En attente"
                                    class="bg-secondcolor"
                                >
                                    En attente
                                </option>
                                <option value="Archivé" class="bg-secondcolor">
                                    Archivé
                                </option>
                                <option value="Traité" class="bg-secondcolor">
                                    Traité
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <div
                        class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto"
                    >
                        <table class="table-auto w-full">
                            <thead>
                                <tr
                                    class="w-full bg-primcolor flex justify-around px-5 py-3 mt-8 text-center text-base font-bold text-secondcolor uppercase tracking-wider"
                                >
                                    <th class="w-10">Date</th>
                                    <th class="w-10">Type</th>
                                    <th class="w-10">Nature</th>
                                    <th class="w-22 text-ce,ter">Statut</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <div v-if="loading" class="py-10"><Loader /></div>
                            <tbody class="h-72 table-auto">
                                <div
                                    v-for="(RowData, index) in activeRows"
                                    :key="index"
                                >
                                    <tr
                                        class="bg-white text-left my-3 w-full flex justify-around items-center py-2"
                                        v-if="Math.floor(index / 5) == page"
                                        :class="
                                            RowData.statut === 'nouveau'
                                                ? 'bg-green-700 bg-opacity-10'
                                                : 'bg-white'
                                        "
                                    >
                                        <td class="w-18 text-sm">
                                            {{ RowData.date_creation }}
                                        </td>
                                        <td class="w-10">
                                            {{ RowData.nature }}
                                        </td>
                                        <td class="w-10">{{ RowData.type }}</td>
                                        <td class="w-22">
                                            {{ RowData.statut }}
                                        </td>
                                        <td
                                            class="flex gap-2"
                                            v-if="RowData.statut === 'nouveau'"
                                        >
                                            <a
                                                @click="
                                                    redirect(
                                                        RowData.id,
                                                        RowData.type
                                                    )
                                                "
                                            >
                                                <div
                                                    class="relative actionIcon cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                                                >
                                                    <FontAwesomeIcon
                                                        icon="fa-solid fa-pen "
                                                        class="text-white text-2xl w-5"
                                                    />
                                                    <Tooltip
                                                        tooltipText="Modifier le Signalement"
                                                        class="tooltip"
                                                    /></div
                                            ></a>
                                            <div
                                                @click="
                                                    sendSignalement(RowData.id)
                                                "
                                                class="relative actionIcon cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                                            >
                                                <FontAwesomeIcon
                                                    icon="fa-solid fa-paper-plane "
                                                    class="text-white text-2xl w-5"
                                                />
                                                <Tooltip
                                                    tooltipText="Envoyer le Signalement"
                                                    class="tooltip"
                                                />
                                            </div>
                                            <div
                                                @click="
                                                    Delete(
                                                        RowData.id,
                                                        RowData.type,
                                                        RowData.statut
                                                    )
                                                "
                                                class="relative actionIcon cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                                            >
                                                <font-awesome-icon
                                                    icon="fa-solid fa-trash-can"
                                                    class="text-white text-2xl h-4 w-4"
                                                />
                                                <Tooltip
                                                    tooltipText="Supprimer le Signalement"
                                                    class="tooltip"
                                                />
                                            </div>
                                        </td>
                                        <td
                                            class="flex gap-2"
                                            v-if="RowData.statut != 'nouveau'"
                                        >
                                            <a
                                                @click="
                                                    redirect(
                                                        RowData.id,
                                                        RowData.type
                                                    )
                                                "
                                            >
                                                <div
                                                    class="actionIcon relative cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                                                >
                                                    <FontAwesomeIcon
                                                        icon="fa-solid fa-pen "
                                                        class="text-white text-2xl w-5"
                                                    />
                                                    <Tooltip
                                                        tooltipText="Modifier le Signalement"
                                                        class="tooltip"
                                                    /></div
                                            ></a>
                                            <div
                                                @click="
                                                    cancelSignalement(
                                                        RowData.id
                                                    )
                                                "
                                                class="actionIcon relative cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                                            >
                                                <FontAwesomeIcon
                                                    icon="fa-solid fa-power-off "
                                                    class="text-white text-2xl w-5"
                                                />
                                                <Tooltip
                                                    tooltipText="Annuler le Signalement"
                                                    class="tooltip"
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                        <ul
                            class="flex w-full justify-center items-center gap-4 pb-6"
                        >
                            <div
                                class="flex gap-1 cursor-pointer"
                                @click="page = mod(page - 1)"
                            >
                                <FontAwesomeIcon
                                    icon="fa-solid fa-angle-left"
                                    class="pr-2 text-2xl"
                                />
                                Prev
                            </div>
                            <li
                                v-for="index in Math.ceil(
                                    this.activeRows.length / 5
                                )"
                                :key="index"
                                class="cursor-pointer px-4 py-2"
                                :class="
                                    index === page + 1
                                        ? 'text-white bg-primcolor'
                                        : index === page + 2
                                        ? 'text-black'
                                        : index === page
                                        ? 'text-black'
                                        : 'text-black hidden'
                                "
                                @click="page = index - 1"
                            >
                                {{ index }}
                            </li>
                            <div
                                class="flex gap-1 cursor-pointer"
                                @click="page = mod(page + 1)"
                            >
                                Next
                                <FontAwesomeIcon
                                    icon="fa-solid fa-angle-right"
                                    class="pl-2 text-2xl"
                                />
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import auth from "../../../services/auth";
import Loader from "../../../Components/Dashboard/Loader.vue";
import Tooltip from "./Tooltip.vue";
/*import for sweetAlert */
import Swal from "sweetalert2/dist/sweetalert2.js";
/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import {
    faPen,
    faArrowRotateRight,
    faTrashCan,
    faAngleLeft,
    faAngleRight,
    faPaperPlane,
    faPowerOff,
} from "@fortawesome/free-solid-svg-icons";

/* add icons to the library */
library.add(
    faPen,
    faArrowRotateRight,
    faTrashCan,
    faAngleLeft,
    faAngleRight,
    faPaperPlane,
    faPowerOff
);

/* add font awesome icon component */

export default {
    components: {
        FontAwesomeIcon,
        Tooltip,
        Loader,
    },

    data: function () {
        return {
            page: 0,
            type: "",
            nature: "",
            statut: "",
            TableData: [],
            activeRows: [],
            user_id: 1,
            loading: false,
        };
    },
    methods: {
        redirect(id, type) {
            if (type == "contribution") {
                this.$router.push({ path: `/Contribuer/${id}` });
            } else if (type == "signalement") {
                this.$router.push({ path: `/Citizen/Editsignalements/${id}` });
            } else if (type == "adhesion") {
            }
        },
        changeType(event) {
            this.type = event.target.value;
            this.activeRows = this.TableData.filter(
                (rowData) => rowData.type === this.type
            );
            if (this.nature !== "") {
                this.activeRows = this.activeRows.filter(
                    (rowData) => rowData.nature === this.nature
                );
            }
            if (this.statut !== "") {
                this.activeRows = this.activeRows.filter(
                    (rowData) => rowData.statut === this.statut
                );
            }
        },
        refresh() {
            this.loading = true;
            const id = auth.getloggedUser().id;
            axios
                .get("/api/fetch/" + id)
                .then((response) => {
                    this.loading = false;
                    this.TableData = response.data;
                    this.activeRows = this.TableData;
                })
                .catch((error) => console.log(error));
        },
        Duplicate(id, type) {
            if (type === "contribution") {
                axios
                    .post("/api/duplicate/Contribution/" + id)
                    .then(() =>
                        this.alert.fire({
                            icon: "success",
                            toast: "true",
                            text: "Contribution dupliquée avec succès",
                            background: "#d1fae5",
                            color: "#2B3238",
                        })
                    )
                    .catch((error) => {
                        console.log("error message");
                    });
            } else if (type === "signalement") {
                axios
                    .post("/api/duplicate/Signalement/" + id)
                    .then(() =>
                        this.alert.fire({
                            icon: "success",
                            toast: "true",
                            text: "Signalement dupliquée avec succès",
                            background: "#d1fae5",
                            color: "#2B3238",
                        })
                    )
                    .catch((error) => {
                        console.log("error message");
                    });
            } else if (type === "adhesion") {
                axios
                    .post("/api/duplicate/Adhesion/" + id)
                    .then(() =>
                        this.alert.fire({
                            icon: "success",
                            toast: "true",
                            text: "Adhesion dupliquée avec succès",
                            background: "#d1fae5",
                            color: "#2B3238",
                        })
                    )
                    .catch((error) => {
                        console.log("error message");
                    });
            }
        },

        //this function sends a request to delete record from database if (status == en attente) otherwise it will only set the deleted field to true so that it will be no longer displayed in the array above
        Delete(id, type, statut) {
            if (type === "contribution") {
                if (statut === "en attente") {
                    axios
                        .delete("/api/delete/Contribution/" + id)
                        .then(() => {
                            this.refresh();
                            this.alert.fire({
                                icon: "success",
                                toast: "true",
                                text: "Contribution annulée avec succès",
                                background: "#d1fae5",
                                color: "#2B3238",
                            });
                        })
                        .catch((error) => console.log(error));
                } else {
                    axios
                        .put("/api/updateTable/Contribution/" + id)
                        .then(() => this.refresh())
                        .catch((error) => console.log(error));
                }
            } else if (type === "signalement") {
                if (statut === "en attente") {
                    axios
                        .delete("/api/delete/Signalement/" + id)
                        .then(() => {
                            this.refresh();
                            this.alert.fire({
                                icon: "success",
                                toast: "true",
                                text: "Signalement annulée avec succès",
                                background: "#d1fae5",
                                color: "#2B3238",
                            });
                        })
                        .catch((error) => console.log(error));
                } else {
                    axios
                        .put("/api/updateTable/Signalement/" + id)
                        .then(() => this.refresh())
                        .catch((error) => console.log(error));
                }
            } else if (type === "adhesion") {
                if (statut === "en attente") {
                    axios
                        .delete("/api/delete/Adhesion/" + id)
                        .then(() => {
                            this.refresh();
                            this.alert.fire({
                                icon: "success",
                                toast: "true",
                                text: "Adhesion annulée avec succès",
                                background: "#d1fae5",
                                color: "#2B3238",
                            });
                        })
                        .catch((error) => console.log(error));
                } else {
                    axios
                        .put("/api/updateTable/Adhesion/" + id)
                        .then(() => this.refresh())
                        .catch((error) => console.log(error));
                }
            }
        },
        sendSignalement(signalementID) {
            axios
                .patch(`/api/signalement/${signalementID}`, {
                    statut: "en attente",
                })
                .then(this.refresh());
        },
        cancelSignalement(signalementID) {
            axios
                .patch(`/api/signalement/${signalementID}`, {
                    statut: "nouveau",
                })
                .then(this.refresh());
        },
        changeNature(event) {
            this.nature = event.target.value;
            this.activeRows = this.TableData.filter(
                (rowData) => rowData.nature === this.nature
            );
            if (this.type !== "") {
                this.activeRows = this.activeRows.filter(
                    (rowData) => rowData.type === this.type
                );
            }
            if (this.statut !== "") {
                this.activeRows = this.activeRows.filter(
                    (rowData) => rowData.statut === this.statut
                );
            }
        },
        changeStatut(event) {
            this.statut = event.target.value;
            this.activeRows = this.TableData.filter(
                (rowData) => rowData.statut === this.statut
            );
            if (this.type !== "") {
                console.log(this.type);
                this.activeRows = this.activeRows.filter(
                    (rowData) => rowData.type === this.type
                );
            }
            if (this.nature !== "") {
                console.log(this.nature);
                this.activeRows = this.activeRows.filter(
                    (rowData) => rowData.nature === this.nature
                );
            }
        },
        init() {
            this.type = "";
            this.nature = "";
            this.statut = "";
            this.activeRows = this.TableData;
        },
        mod(p) {
            return (
                ((p % Math.ceil(this.TableData.length / 5)) +
                    Math.ceil(this.activeRows.length / 5)) %
                Math.ceil(this.activeRows.length / 5)
            );
        },
    },
    mounted() {
        this.alert = this.$swal.mixin({
            position: "top-end",
            iconColor: "#529B9B",
            showConfirmButton: false,
            width: "34rem",
            padding: "1em",
            allowOutsideClick: "true",
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
    },
    created() {
        this.refresh();
    },
};
</script>

<style>
.tooltip {
    visibility: hidden;
}
.actionIcon:hover .tooltip {
    visibility: visible;
}
</style>
