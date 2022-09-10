<template>
    <div class="form-section mx-10 w-screen">
        <h1 class="text-3xl font-bold uppercase mb-10">Signalement Details</h1>
        <hr />

        <div class="border-l-4 border-primcolor px-4 my-3">
            Nom et Prénom:
            <label class="text-gray-500 text-sm px-5">{{ user.name }} </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Email:
            <label class="text-gray-500 text-sm px-5">{{ user.email }} </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Numéro de télphone:
            <label class="text-gray-500 text-sm px-5"
                >{{ user.phoneNumber }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Data de naissance:
            <label class="text-gray-500 text-sm px-5"
                >{{ user.date_de_naissance }}
            </label>
        </div>

        <div class="border-l-4 border-primcolor px-4 my-3">
            Address:
            <label class="text-gray-500 text-sm px-5"
                >{{ user.address }}
            </label>
        </div>
        <hr />
        <div class="mt-10"></div>

        <div class="border-l-4 border-primcolor px-4 my-3">
            Pays:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.pays }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Wilaya:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.wilaya }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Daiara:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.daira }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Commune:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.commune }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Code Postal:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.codePostale }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Deapssement:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.depassement }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            description du depassement:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.depass_description }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Conduit:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.conduit }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Solution proposée:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.solution_propose }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Status:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.statut }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Nature:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.nature }}
            </label>
        </div>
        <div class="mt-10">
            marquer comme
            <form class="mt-4">
                <select id="status_select">
                    <option value="">{{ signalement.statut }}</option>
                    <option value="nouveau">nouveau</option>
                    <option value="en attente">en attente</option>
                    <option value="archivé">archivé</option>
                    <option value="traité">traité</option>
                </select>
                <button
                    @click="changeState"
                    class="px-5 py-2 border mx-5 border-black"
                    type="submit"
                >
                    save
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        axios
            .get(`/api/signalement/${this.$route.params.id}`)
            .then((response) => {
                this.setData(response.data);
                axios.get(`/api/users/${response.data.user_id}`).then((res) => {
                    this.setUser(res.data);
                });
            });
    },
    data: function () {
        return {
            signalement: [],
            user: [],
        };
    },
    methods: {
        setData(data) {
            this.signalement = data;
        },
        setUser(user) {
            this.user = user;
        },
        changeState(state) {
            let statut = {};
            statut["statut"] = document.getElementById("status_select").value;
            console.log(statut);
            axios
                .patch(`/api/signalement/${this.$route.params.id}`, statut)
                .then((re) => console.log("done"))
                .catch((err) => console.log(err));
        },
    },
};
</script>