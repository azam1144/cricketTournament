<template>
    <div>
        <v-tabs v-model="scoreTab" align-with-title>
            <v-tab v-for="item in items" :key="item">
                {{ item }}
            </v-tab>

            <v-tabs-items v-model="scoreTab">
                <v-tab-item v-for="item in items" :key="item">
                    <v-card flat>
                        <div v-if="item === 'SHR INNING'">
                            <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                <Batsmen></Batsmen>
                            </v-flex>
                            <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                <Bowler></Bowler>
                            </v-flex>
                            <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                <Partnership></Partnership>
                            </v-flex>
                        </div>
                    </v-card>
                    <v-card flat>
                        <div v-if="item === 'CSK INNING'">
                            <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                <Batsmen></Batsmen>
                            </v-flex>
                            <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                <Bowler></Bowler>
                            </v-flex>
                            <v-flex xs12 class="text-xs-center" pb-3 pl-5 pr-5>
                                <Partnership></Partnership>
                            </v-flex>
                        </div>
                    </v-card>
                </v-tab-item>
            </v-tabs-items>
        </v-tabs>
    </div>
</template>

<script>
    import Batsmen from './Batsmen'
    import Bowler from './Bowler'
    import Partnership from './Partnership'
    export default {
        components: {
            'Batsmen'       : Batsmen,
            'Bowler'        : Bowler,
            'Partnership'   : Partnership,
        },
        data () {
            return {
                scoreTab: null,
                items: [
                    'SHR INNING', 'CSK INNING'
                ],
            }
        }
    }
</script>

