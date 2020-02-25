<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">

    <div>
        <v-card
            class="mx-auto"
            max-width="344"
            outlined
        >
            <v-container >
                <v-layout>
                    <v-list-item three-line>
                        <v-list-item-content>
                            <div class="overline mb-4">OVERLINE</div>
                            <v-list-item-title class="headline mb-1">ICC T20 TOURNAMENTS</v-list-item-title>
                            <v-list-item-subtitle>ICC introduced the following series. Click and find the details.</v-list-item-subtitle>
                            <v-simple-table>
                                <template v-slot:default>
                                    <thead>
                                    <tr>
                                        <th class="text-left">SERIES</th>
                                        <th class="text-left">SESSION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in series" :key="item.name">
                                        <td><router-link :to="{ path: '/teams/'+item.id}">{{ item.name }}</router-link></td>
                                        <td>{{ item.session }}</td>
                                    </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
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
                series: [
                    {
                        id: 1,
                        name: 'PSL',
                        session: 2020,
                    },
                    {
                        id: 2,
                        name: 'IPL',
                        session: 2020,
                    },
                    {
                        id: 3,
                        name: 'BPL',
                        session: 2020
                    }
                ],
            }
        },
    }
</script>

