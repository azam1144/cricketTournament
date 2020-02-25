<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">

    <div>
        <v-card
            class="mx-auto"
            outlined
        >
            <v-container style="width: 100%; max-width: 100%" >
                <v-layout>
                    <v-list-item three-line>
                        <v-list-item-content>
                            <div class="overline mb-4">OVERLINE</div>
                            <v-list-item-title class="headline mb-1">ICC T20 TOURNAMENTS</v-list-item-title>
                            <v-list-item-subtitle>PSL have following Fixture & Result. Click and get the details.</v-list-item-subtitle>
                            <v-card class="mx-auto" v-for="item in matches" :key="item" outlined max-width="344" style="text-align: left">
                                <v-card-text>
                                    <v-list-item three-line>
                                        <v-list-item-content>
                                            <b class="overline mb-4">Result</b>
                                            <p class="overline mb-4">{{item.matchNo}}, {{item.stadium}}, {{item.datetime}}</p>
                                            <v-list-item-title class="headline mb-1" style="font-weight: bold">{{item.teamA.name}} <p style="float: right; font-weight: bold" v-if="item.result">{{item.teamA.score}} ({{item.teamA.overs}} ov)</p> </v-list-item-title>
                                            <v-list-item-title class="headline mb-1" style="font-weight: bold">{{item.teamB.name}} <p style="float: right; font-weight: bold" v-if="item.result">{{item.teamB.score}} ({{item.teamB.overs}} ov)</p> </v-list-item-title>
                                            <v-list-item-subtitle v-if="item.result">{{item.result}}</v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn text color="deep-purple accent-4" >
                                        Summary
                                    </v-btn>
                                    <v-btn text color="deep-purple accent-4" >
                                        Scoreboard
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-list-item-content>
                    </v-list-item>
                </v-layout>
            </v-container>
        </v-card>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                matches: [
                    {
                        id: 1,
                        matchNo: '1st',
                        stadium: 'lahore',
                        teamA: {'name': 'IU', 'score': '165', 'overs': '16.4', 'wickets': '2'},
                        teamB: {'name': 'QG', 'score': '164', 'overs': '20', 'wickets': '8'},
                        result: 'UI won by 8 wickets (with 20 balls remaining)',
                        datetime: '20 Feb, 2020',
                    },
                    {
                        id: 2,
                        matchNo: '2nd',
                        stadium: 'Karachi',
                        teamA: {'name': 'KK', 'score': '150', 'overs': '20', 'wickets': '8'},
                        teamB: {'name': 'LQ', 'score': '140', 'overs': '20', 'wickets': '8'},
                        result: 'KK won by 10 runs',
                        datetime: '21 Feb, 2020',
                    },
                    {
                        id: 3,
                        matchNo: '3rd',
                        stadium: 'Multan',
                        teamA: {'name': 'MS', 'score': '210', 'overs': '20', 'wickets': '4'},
                        teamB: {'name': 'PZ', 'score': '190', 'overs': '20', 'wickets': '7'},
                        result: 'MS won by 20 runs',
                        datetime: '22 Feb, 2020',
                    },
                    {
                        id: 4,
                        matchNo: '4th',
                        stadium: 'Lahore',
                        teamA: {'name': 'LQ', 'score': '156', 'overs': '20', 'wickets': '8'},
                        teamB: {'name': 'QG', 'score': '157', 'overs': '18.2', 'wickets': '5'},
                        result: 'QG won by 5 wickets (with 8 balls remaining)',
                        datetime: '23 Feb, 2020',
                    },
                    {
                        id: 5,
                        matchNo: '5th',
                        stadium: 'Lahore',
                        teamA: {'name': 'LQ', 'score': '0', 'overs': '0', 'wickets': '0'},
                        teamB: {'name': 'UI', 'score': '0', 'overs': '0', 'wickets': '0'},
                        result: false,
                        datetime: '24 Feb, 2020',
                    },
                    {
                        id: 6,
                        matchNo: '6th',
                        stadium: 'Karachi',
                        teamA: {'name': 'PZ', 'score': '0', 'overs': '0', 'wickets': '0'},
                        teamB: {'name': 'QG', 'score': '0', 'overs': '0', 'wickets': '0'},
                        result: false,
                        datetime: '25 Feb, 2020',
                    }
                ],
            }
        },
    }
</script>

