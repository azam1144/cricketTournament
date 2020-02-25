<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <v-card>
        <v-toolbar color="deep-purple" dense flat>

            <v-toolbar-title>Cricket Tournament</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>

            <template v-slot:extension>
                <v-tabs v-model="tab" align-with-title>
                    <v-tab v-for="item in items" :key="item">
                        {{ item }}
                    </v-tab>

                    <v-tabs-items v-model="tab">
                        <v-tab-item v-for="item in items" :key="item">
                            <v-card flat>
                                <div v-if="item === 'Summary'">
                                    <summary></summary>
                                </div>
                                <div v-if="item === 'scoreboard'">
                                    <scoreboard></scoreboard>
                                </div>
                                <template v-if="item === 'fall of wickets'">
                                    <fall-of-wickets></fall-of-wickets>
                                </template>
                                <template v-if="item === 'ball by ball'">
                                    <ball-by-ball></ball-by-ball>
                                </template>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>
                </v-tabs>
            </template>
        </v-toolbar>
    </v-card>
</template>


<script>

    import Summary from './Summary';
    import Scoreboard from './scoreboard/Scoreboard';
    import FallOfWickets from './FallOfWickets';
    import BallByBall from './BallByBall';
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
                    'summary', 'scoreboard', 'fall of wickets', 'ball by ball',
                ],
                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            }
        },
    }
</script>
