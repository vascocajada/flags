<script>
import FlagItem from '../FlagItem/FlagItem.vue'

export default {
    props: ['flags'],
    components: {
        FlagItem
    }
}
</script>

<template>
    <div class="mx-auto container gap-4 grid grid-cols-3">
        <FlagItem
            v-for="flag in flags"
            :flag="flag"
        />
    </div>
</template>