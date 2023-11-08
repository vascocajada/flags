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
    <div class="mx-auto container columns-xs gap-4">
        <FlagItem
            v-for="flag in flags"
            :flag="flag"
        />
    </div>
</template>