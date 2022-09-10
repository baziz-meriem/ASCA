<template>
    <span
        class="absolute bg-gray-800 border border-gray-900 bg-opacity-90 px-2 py-1 rounded-lg text-xs text-white -top-11 w-24 text-center"
        >{{ tooltipText }}</span
    >
</template>

<script>
export default {
    props: ["tooltipText"],
};
</script>

<style></style>