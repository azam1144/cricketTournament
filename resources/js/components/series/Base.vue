
<template>
    <v-card class="overflow-hidden">
        <headerComponent></headerComponent>
        <v-container >
            <v-layout style="text-align: center; margin-top: 60px; margin-left: 35%">
                <series></series>
            </v-layout>
        </v-container>
    </v-card>
</template>

<script>
    import series from './Listing'
    import headerComponent from '../Header'
    export default {
        components: {
          'series': series,
          'headerComponent': headerComponent
        },
        data () {
            return {
            }
        }
    }
</script>
