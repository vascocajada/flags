<script>
export default {
    props: ['flag'],
}
</script>

<template>
    <div data-test="flag-item" class="pb-4">
        <h2>{{ flag.name }}</h2>
        <img :src="flag.image" :alt="flag.name" />
    </div>
</template>