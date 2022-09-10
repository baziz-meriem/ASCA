<template>
    <div class="flex-auto pr-10 py-12">
        <div class="flex mb-6 gap-10">
            <div
                class="bg-pinkColor text-xl py-7 px-9 rounded-2xl shadow-md border border-red-300 font-bold text-center"
            >
                <span class="text-redColor">SIGNALEMENT</span>
                <br />
                {{
                    this.actions.filter(
                        (action) => action.type === "signalement"
                    ).length
                }}
            </div>
            <div
                class="bg-lighterYellow text-xl py-7 px-9 rounded-2xl shadow-md border border-yellow font-bold text-center"
            >
                <span class="text-yellow"> CONTRIBUTION </span> <br />
                {{
                    this.actions.filter(
                        (action) => action.type === "contribution"
                    ).length
                }}
            </div>
        </div>
        <div
            class="bg-greyColor rounded-2xl px-2 py-6 border shadow-md border-gray-300"
        >
            <h1 class="text-secondcolor text-2xl font-bold w-max px-4 py-2">
                Activité récente
            </h1>
            <ul class="flex w-full justify-center gap-4 items-center mt-8">
                <li
                    class="rounded-3xl bg-secondcolor px-7 py-2 w-max text-white cursor-pointer"
                    @click="init"
                >
                    Tous
                </li>
                <li
                    class="rounded-3xl bg-secondcolor px-7 py-2 w-max text-white cursor-pointer"
                >
                    Date
                </li>
                <li class="rounded-3xl bg-secondcolor w-max text-white">
                    <select
                        name="type"
                        class="w-36 outline-none border-none bg-transparent focus:outline-none cursor-pointer"
                        @change="changeType($event)"
                    >
                        <option value="" class="bg-secondcolor" selected hidden>
                            Type
                        </option>
                        <option value="contribution" class="bg-secondcolor">
                            Contribution
                        </option>
                        <option value="signalement" class="bg-secondcolor">
                            Signalement
                        </option>
                    </select>
                </li>
                <li class="rounded-3xl bg-secondcolor w-max text-white">
                    <select
                        name="nature"
                        class="w-40 outline-none border-none bg-transparent focus:outline-none cursor-pointer"
                        @change="changeNature($event)"
                    >
                        <option value="" class="bg-secondcolor" selected hidden>
                            Nature
                        </option>
                        <option value="sociale" class="bg-secondcolor">
                            Sociale
                        </option>
                        <option value="économique" class="bg-secondcolor">
                            Economique
                        </option>
                        <option value="environementale" class="bg-secondcolor">
                            Environementale
                        </option>
                    </select>
                </li>
            </ul>
            <table class="table-auto w-full">
                <thead>
                    <tr
                        class="w-full bg-primcolor text-white flex justify-around py-3 mt-8 text-center text-base uppercase tracking-wider"
                    >
                        <th class="w-10">Date</th>
                        <th class="w-5">ID</th>
                        <th class="w-10">Type</th>
                        <th class="w-20">Nature</th>
                        <th class="w-1/12"></th>
                    </tr>
                </thead>
                <tbody class="h-72 table-auto">
                    <div
                        v-for="(item, index) in actifActions"
                        v-bind:key="item.id"
                    >
                        <tr
                            class="text-sm text-left bg-white my-3 w-full flex justify-around items-center py-2"
                            v-if="Math.floor(index / 5) == page"
                        >
                            <td class="w-10">{{ item.date }}</td>
                            <td class="w-5">{{ item.id }}</td>
                            <td class="w-10">{{ item.type }}</td>
                            <td class="w-20">{{ item.nature }}</td>
                            <td class="flex gap-2">
                                <div
                                    class="cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                                >
                                    <font-awesome-icon
                                        icon="fa-solid fa-trash-can"
                                        class="text-white text-2xl h-4 w-4"
                                    />
                                </div>
                                <div
                                    class="cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                                >
                                    <FontAwesomeIcon
                                        icon="fa-solid fa-arrow-right "
                                        class="text-white text-2xl w-5"
                                    />
                                </div>
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
            <ul class="flex w-full justify-center items-center gap-4 py-4">
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
                    v-for="index in Math.ceil(this.actifActions.length / 5)"
                    :key="index"
                    class="cursor-pointer px-4 py-2"
                    :class="
                        index === page + 1
                            ? 'text-white bg-primcolor'
                            : 'text-black'
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
</template>
<script>
/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import {
    faTrashCan,
    faArrowRight,
    faAngleLeft,
    faAngleRight,
} from "@fortawesome/free-solid-svg-icons";

/* add icons to the library */
library.add(faTrashCan, faArrowRight, faAngleLeft, faAngleRight);

/* add font awesome icon component */

export default {
    components: {
        FontAwesomeIcon,
    },
    data: function () {
        return {
            page: 0,
            type: "",
            nature: "",
            actions: [
                {
                    id: 1,
                    nature: "sociale",
                    type: "contribution",
                    date: "1/05/2022",
                },
                {
                    id: 2,
                    nature: "économique",
                    type: "contribution",
                    date: "2/05/2022",
                },
                {
                    id: 3,
                    nature: "environementale",
                    type: "contribution",
                    date: "1/05/2022",
                },
                {
                    id: 4,
                    nature: "sociale",
                    type: "contribution",
                    date: "1/05/2022",
                },
                {
                    id: 5,
                    nature: "économique",
                    type: "contribution",
                    date: "2/05/2022",
                },
                {
                    id: 6,
                    nature: "environementale",
                    type: "contribution",
                    date: "1/05/2022",
                },
                {
                    id: 7,
                    nature: "sociale",
                    type: "signalement",
                    date: "1/05/2022",
                },
                {
                    id: 8,
                    nature: "économique",
                    type: "signalement",
                    date: "2/05/2022",
                },
                {
                    id: 9,
                    nature: "environementale",
                    type: "signalement",
                    date: "1/05/2022",
                },
                {
                    id: 10,
                    nature: "sociale",
                    type: "signalement",
                    date: "1/05/2022",
                },
                {
                    id: 11,
                    nature: "économique",
                    type: "signalement",
                    date: "2/05/2022",
                },
                {
                    id: 12,
                    nature: "environementale",
                    type: "signalement",
                    date: "1/05/2022",
                },
            ],
            actifActions: [],
        };
    },
    methods: {
        changeType(event) {
            this.type = event.target.value;

            if (this.nature !== "") {
                this.actifActions = this.actions.filter(
                    (action) =>
                        action.type === event.target.value &&
                        action.nature === this.nature
                );
            } else {
                this.actifActions = this.actions.filter(
                    (action) => action.type === event.target.value
                );
            }
        },
        changeNature(event) {
            this.nature = event.target.value;
            if (this.type !== "") {
                this.actifActions = this.actions.filter(
                    (action) =>
                        action.nature === event.target.value &&
                        action.type === this.type
                );
            } else {
                this.actifActions = this.actions.filter(
                    (action) => action.nature === event.target.value
                );
            }
        },
        init() {
            this.type = "";
            this.nature = "";
            this.actifActions = this.actions;
        },
        mod(p) {
            return (
                ((p % Math.ceil(this.actifActions.length / 5)) +
                    Math.ceil(this.actifActions.length / 5)) %
                Math.ceil(this.actifActions.length / 5)
            );
        },
    },
    mounted() {
        this.actifActions = this.actions;
    },
};
</script>
