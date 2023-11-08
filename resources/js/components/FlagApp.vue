
<script>
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import specific icons */
import { faCog } from '@fortawesome/free-solid-svg-icons'
/* add icons to the library */
library.add(faCog)

import FlagList from './FlagList/FlagList.vue'
import LoadingSpinner from './LoadingSpinner/LoadingSpinner.vue'

export default {
    data() {
        return {
            requestLoading: true,
            flags: []
        }
    },
    components: {
        FlagList,
        LoadingSpinner
    }
}
</script>

<template>
    <div class="text-center py-6">
        <h1 class="text-2lg mb-4">Flags App</h1>
        <FlagList v-if="!requestLoading" :flags="flags" />
        <LoadingSpinner v-else />
    </div>
</template>
