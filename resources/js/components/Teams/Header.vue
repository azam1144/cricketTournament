
<template>
    <v-card class="overflow-hidden">
        <v-app-bar absolute color="white">
            <v-toolbar-title style="text-align: center;">{{app}}</v-toolbar-title>
        </v-app-bar>
            <v-container style="width: 100%; max-width:100%">
                <v-layout style="text-align: center; margin-top: 60px;">
                    <v-tabs v-model="matchTab" align-with-title>
                        <v-tab v-for="item in items" :key="item"> {{item}} </v-tab>
                        <v-tabs-items v-model="matchTab">
                            <v-tab-item v-for="item in items" :key="item">
                                <v-card flat>
                                    <div v-if="item === 'Matches'">
                                        <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                            <matches></matches>
                                        </v-flex>
                                    </div>
                                    <div v-if="item === 'Teams'">
                                        <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                            <teams></teams>
                                        </v-flex>
                                    </div>
                                </v-card>
                            </v-tab-item>
                        </v-tabs-items>
                    </v-tabs>
                </v-layout>
            </v-container>
    </v-card>
</template>

<script>
    import teams from './Listing'
    import matches from './matches/Listing'
    export default {
        components: {
          'teams': teams,
          'matches': matches,
        },
        data () {
            return {
                matchTab: null,
                items: [
                    'Matches', 'Teams'
                ],
                app: 'Cricket Tournament'
            }
        }
    }
</script>
