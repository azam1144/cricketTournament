
<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <v-card>
        <v-toolbar color="deep-purple" dense flat>

            <v-toolbar-title class="text-align-center">Cricket Tournament</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>

            <template v-slot:extension>
                <v-tabs v-model="tab" align-with-title background-color="gray">
                    <v-tab v-for="item in items" :key="item">
                        {{ item }}
                    </v-tab>

                    <v-tabs-items v-model="tab">
                        <v-tab-item v-for="item in items" :key="item">
                            <v-card flat>
                                <div v-if="item === 'summary'">
                                    <summary></summary>
                                </div>
                            </v-card>
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
                            <v-card flat>
                                <div v-if="item === 'ball by ball'">
                                    <ball-by-ball></ball-by-ball>
                                </div>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>
                </v-tabs>
            </template>
        </v-toolbar>
    </v-card>
</template>


<script>

    import Summary from './summary/Summary';
    import Scoreboard from './scoreboard/Listing';
    import FallOfWickets from './fallOfWickets/FallOfWickets';
    import BallByBall from './ballByBall/BallByBall';
    export default {
        components: {
            'Summary'       : Summary,
            'Scoreboard'    : Scoreboard,
            'FallOfWickets' : FallOfWickets,
            'BallByBall'    : BallByBall,
        },
        data () {
            return {
                tab: null,
                items: [
                    'summary', 'scoreboard', 'fall of wickets', 'ball by ball'
                ]
            }
        },
    }
</script>
