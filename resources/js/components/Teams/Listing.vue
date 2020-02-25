<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <v-card
        class="mx-auto"
        max-width="500"
        outlined
    >
        <v-list-item three-line>
            <v-list-item-content>
                <div class="overline mb-4">OVERLINE</div>
                <v-list-item-title class="headline mb-1">ICC T20 TOURNAMENTS</v-list-item-title>
                <v-list-item-subtitle>ICC introduced the following series. Click and find the details.</v-list-item-subtitle>
                <v-simple-table>
                    <template v-slot:default>
                        <thead>
                        <tr>
                            <th class="text-left">TEAM</th>
                            <th class="text-left">MATCH</th>
                            <th class="text-left">WIN</th>
                            <th class="text-left">LOST</th>
                            <th class="text-left">TIED</th>
                            <th class="text-left">POINTS</th>
                            <th class="text-left">NRR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in teams" :key="item.name">
                            <td><router-link :to="{ path: '/matches/'+item.id}">{{ item.name }}</router-link></td>
                            <td>{{ item.match }}</td>
                            <td>{{ item.win }}</td>
                            <td>{{ item.lost }}</td>
                            <td>{{ item.tied }}</td>
                            <td>{{ item.points }}</td>
                            <td>{{ item.nrr }}</td>
                        </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-list-item-content>
        </v-list-item>
    </v-card>
</template>

<script>
    export default {
        data () {
            return {
                teams: [
                    {
                        id: 1,
                        name: 'IU',
                        match: 3,
                        win: 2,
                        lost: 1,
                        tied: 0,
                        points: 4,
                        nrr: 1.00,
                    },
                    {
                        id: 2,
                        name: 'QG',
                        match: 2,
                        win: 2,
                        lost: 0,
                        tied: 0,
                        points: 4,
                        nrr: 1.00,
                    },
                    {
                        id: 3,
                        name: 'PZ',
                        match: 3,
                        win: 2,
                        lost: 1,
                        tied: 0,
                        points: 4,
                        nrr: 1.00,
                    },
                    {
                        id: 4,
                        name: 'MS',
                        match: 3,
                        win: 1,
                        lost: 1,
                        tied: 1,
                        points: 2,
                        nrr: 0.125,
                    },
                    {
                        id: 5,
                        name: 'LQ',
                        match: 3,
                        win: 2,
                        lost: 1,
                        tied: 0,
                        points: 4,
                        nrr: 0.125,
                    },
                    {
                        id: 6,
                        name: 'KK',
                        match: 4,
                        win: 4,
                        lost: 0,
                        tied: 0,
                        points: 8,
                        nrr: 1.00,
                    }
                ],
            }
        },
    }
</script>

