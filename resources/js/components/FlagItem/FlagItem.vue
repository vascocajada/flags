<script>
export default {
    props: ['flag'],
}
</script>

<template>
    <div data-test="flag-item">
        <h2>{{ flag.name }}</h2>
        <img :src="flag.src" :alt="flag.name" />
    </div>
</template>