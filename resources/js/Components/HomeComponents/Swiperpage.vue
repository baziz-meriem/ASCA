<template>
    <div
        class="w-full px-4 md:px-20 md:py-28 py-16 bg-green-500"
        :style="image"
    >
        <div
            class="rounded-md px-8 py-7 md:w-5/12 text-left bg-white bg-opacity-50 "
        >
            <label class="uppercase block font-extrabold md:text-4xl text-3xl"
                >big title here
            </label>
            <label class="text-md mt-5 block"
                >Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a type
                specimen book.
            </label>
            <button
                class="mt-5 inline-flex items-center px-8 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition"
            >
                Take action
            </button>
        </div>
    </div>
</template>
<script>
export default {
    setup() {},
    data() {
        return {
            image: { backgroundImage: "url(/assets/images/homebg.jpeg)" },
        };
    },
};
</script>
