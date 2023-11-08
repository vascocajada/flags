
<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCog } from '@fortawesome/free-solid-svg-icons'
library.add(faCog)

import axios from 'axios'

import FlagList from './FlagList/FlagList.vue'
import LoadingSpinner from './LoadingSpinner/LoadingSpinner.vue'

export default {
    data() {
        return {
            requestLoading: true,
            flags: []
        }
    },
    created() {
        axios.get('/api/flags')
            .then(response => {
                this.flags = response.data
                this.requestLoading = false
            })
            .catch(error => {
                // console.log(error)
            })
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
