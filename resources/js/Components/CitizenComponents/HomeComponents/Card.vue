<template>
    <div class="px-5">
        <div
            class="max-w-sm rounded-xl overflow-hidden shadow-lg border-2 border-zinc-400"
        >
            <img
                class="w-full object-cover object-contain h-20 w-10"
                :src="data.image"
                alt="Mountain"
                height="150"
                width="90"
            />
            <div class="px-6 py-4">
                <div class="font-bold text-l mb-2">{{ data.title }}</div>
                <p class="text-gray-700 text-xs">
                    {{ data.content }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: ["data"],
};
</script>
