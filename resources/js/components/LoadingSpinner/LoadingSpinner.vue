<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export default {
    components: {
        FontAwesomeIcon
    }
}
</script>

<template>
    <div class="w-full py-32">
        <FontAwesome-icon
            icon="fa-solid fa-cog"
            spin
            size="5x"
            data-test="loading-spinner"
        >
            Loading
        </FontAwesome-icon>
    </div>
</template>