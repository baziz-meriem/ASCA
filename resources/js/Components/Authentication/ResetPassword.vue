<template>
    <!-- component -->
    <div class="text-center my-10">
        <div class="flex items-center justify-center">
            <svg
                fill="none"
                viewBox="0 0 24 24"
                class="w-12 h-12 text-primcolor"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                />
            </svg>
        </div>
        <h2 class="text-4xl tracking-tight">Forgot your password?</h2>
        <div>
            Enter your Email adress and we will send you instructions on how to
            reset your password
        </div>
    </div>
    <div class="flex justify-center mb-20 mx-4 md:mx-0">
        <form
            class="w-full max-w-xl bg-gray-50 rounded-lg shadow-md p-6 border border-gray-200"
        >
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="email"
                        >Email address</label
                    >
                    <input
                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        type="email"
                        required
                    />
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <button
                        class="appearance-none block w-full bg-primcolor text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-opacity-90 focus:outline-none focus:bg-white focus:border-gray-500"
                        @click="reset"
                    >
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    methods: {
        reset() {
            this.$router.push("/SignIn");
        },
    },
};
</script>
