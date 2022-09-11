<template>
    <div class="w-1/3 mx-auto py-10">
        <div class="text-2xl font-bold uppercase">Edit signalement</div>

        <form class="py-5" @submit="handleSubmit">
            <!-- pays -->
            <label class="text-md my-2 block">Pays</label>
            <input
                class="form-input"
                nom="pays"
                @change="(e) => changeData(e)"
                type="text"
                v-model="signalement.pays"
            />
            <!-- Wilaya -->
            <label class="text-md my-2 block">Wilaya</label>
            <input
                class="form-input"
                nom="wilaya"
                v-model="signalement.wilaya"
                @change="(e) => changeData(e)"
                type="text"
            />
            <!--Daira -->
            <label class="text-md my-2 block">Daira</label>
            <input
                class="form-input"
                nom="daira"
                v-model="signalement.daira"
                @change="(e) => changeData(e)"
                type="text"
            />
            <!--Commune -->
            <label class="text-md my-2 block">Commune</label>
            <input
                class="form-input"
                nom="commune"
                v-model="signalement.commune"
                @change="(e) => changeData(e)"
                type="text"
            />
            <!--Code Postal -->
            <label class="text-md my-2 block">Code Postal</label>
            <input
                class="form-input"
                nom="codePostale"
                v-model="signalement.codePostale"
                @change="(e) => changeData(e)"
                type="text"
            />
            <!--Code Postal -->
            <label class="text-md my-2 block">Depassement</label>
            <input
                class="form-input"
                nom="depassement"
                v-model="signalement.depassement"
                @change="(e) => changeData(e)"
                type="text"
            />

            <label class="text-md my-2 block">Description du Depassement</label>
            <textarea
                class="form-text-area"
                nom="depass_description"
                v-model="signalement.depass_description"
                @change="(e) => changeData(e)"
                type="text"
            />
            <!--Code Postal -->
            <label class="text-md my-2 block">Conduit</label>
            <input
                class="form-input"
                nom="conduit"
                v-model="signalement.conduit"
                @change="(e) => changeData(e)"
                type="text"
            />
            <!--Code Postal -->
            <label class="text-md my-2 block">Solution proposée</label>
            <textarea
                class="form-text-area"
                nom="solution_propose"
                v-model="signalement.solution_propose"
                @change="(e) => changeData(e)"
                type="text"
            />

            <!--Code Postal -->
            <label class="text-md my-2 block">Nature</label>
            <select
                class="form-input"
                nom="nature"
                v-model="signalement.nature"
                @change="(e) => changeData(e)"
                type="text"
            >
                <option>{{ signalement.nature }}</option>
                <option></option>
                <option></option>
            </select>
            <button class="form-button mb-10" type="submit">
                Save Changes
            </button>
        </form>
    </div>
</template>

<script>
export default {
    mounted() {
        axios.get(`/api/signalement/${this.$route.params.id}`).then((res) => {
            this.setSignalement(res.data);
            console.log("done");
        });
    },
    data: function () {
        return {
            signalement: {},
            updatedSignalement: {},
        };
    },
    methods: {
        setSignalement(value) {
            this.signalement = value;
            this.updatedSignalement = value;
        },
        changeData(e) {
            const field = e.target.name;
            this.updatedSignalement[field] = e.target.value;
        },
        handleSubmit() {
            axios
                .patch(
                    `/api/signalement/${this.$route.params.id}`,
                    this.updatedSignalement
                )
                .then((res) => console.log(res));
        },
    },
};
</script>
