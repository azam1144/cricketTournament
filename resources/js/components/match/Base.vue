
<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>
        <headerComponent></headerComponent>
        <v-card>
            <v-toolbar color="deep-purple" dense flat style="margin-top: 10px">
                <v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>

                <template v-slot:extension>
                    <v-tabs v-model="tab" align-with-title background-color="gray">
                        <v-tab v-for="item in items" :key="item">
                            {{ item }}
                        </v-tab>

                        <v-tabs-items v-model="tab">
                            <v-tab-item v-for="item in items" :key="item" style="margin-top: 10px">

                                <v-card flat>
                                    <div v-if="item === 'scoreboard'">
                                        <scoreboard ></scoreboard>
                                    </div>
                                </v-card>
                                <v-card flat>
                                    <div v-if="item === 'fall of wickets'">
                                        <fall-of-wickets></fall-of-wickets>
                                    </div>
                                </v-card>
                                <v-card flat style="margin-top: 10px">
                                    <div v-if="item === 'ball by ball'">
                                        <ball-by-ball></ball-by-ball>
                                    </div>
                                </v-card>
                                <v-card flat style="margin-top: 10px">
                                    <div v-if="item === 'summary'">
                                        <match-summary></match-summary>
                                    </div>
                                </v-card>
                            </v-tab-item>
                        </v-tabs-items>
                    </v-tabs>
                </template>
            </v-toolbar>
        </v-card>
    </div>
</template>

<script>
    import headerComponent from '../Header'
    import Summary from './summary/Summary';
    import Scoreboard from './scoreboard/Listing';
    import FallOfWickets from './fallOfWickets/FallOfWickets';
    import BallByBall from './ballByBall/BallByBall';
    export default {
        components: {
            'headerComponent'   : headerComponent,
            'matchSummary'      : Summary,
            'Scoreboard'        : Scoreboard,
            'FallOfWickets'     : FallOfWickets,
            'BallByBall'        : BallByBall,
        },
        data () {
            return {
                tab: null,
                items: [
                    'scoreboard', 'fall of wickets', 'ball by ball', 'summary'
                ]
            }
        },
    }
</script>
