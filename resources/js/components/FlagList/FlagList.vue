<script>
export default {
    props: ['flags']
}
</script>

<template>
    <div class="mx-auto container columns-xs gap-4">
        <div v-for="flag in flags" data-test="flag-item">YO</div>
    </div>
</template>