
<template>
    <v-card class="overflow-hidden">
        <v-app-bar absolute color="white">
            <v-toolbar-title style="text-align: center; padding-left: 45%">{{app}}</v-toolbar-title>
        </v-app-bar>
            <v-container >
                <v-layout style="text-align: center; margin-top: 60px; margin-left: 35%">
                    <series></series>
                </v-layout>
            </v-container>
    </v-card>
</template>

<script>
    import series from './Listing'
    export default {
        components: {
          'series': series
        },
        data () {
            return {
                app: 'Cricket Tournament'
            }
        }
    }
</script>
