<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <v-simple-table dense>
        <template v-slot:default>
            <thead>
                <tr>
                    <th>Batsman</th>
                    <th>Status</th>
                    <th>R</th>
                    <th>B</th>
                    <th>4s</th>
                    <th>6s</th>
                    <th>S/R</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in desserts" :key="item.name">
                    <td>{{ item.name }}</td>
                    <td>{{ item.status }}</td>
                    <td>{{ item.runs }}</td>
                    <td>{{ item.balls }}</td>
                    <td>{{ item.fours }}</td>
                    <td>{{ item.six }}</td>
                    <td>{{ item.strike }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Extra</td>
                    <td>(w:3, n:2) = 5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background-color: #efefef">
                    <td></td>
                    <td>Total</td>
                    <td>181/2</td>
                    <td>(18.3 over)</td>
                    <td>(9.78) runs per over</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>

<style lang="scss" scoped>
    thead{
        background-color: lightgray;
    }
     thead th{
         text-align: left;
         font-weight: bold;
         font-size: 16px;
     }
</style>
<script>
    export default {
        data () {
            return {
                desserts: [
                    {
                        name: 'C Munro',
                        status: 'c & b Muhammad Nawaz',
                        runs: 0,
                        balls: 1,
                        fours: 0,
                        six: 0,
                        strike: 0,
                    },
                    {
                        name: 'L Ronchi †',
                        status: 'c & b Muhammad Nawaz',
                        runs: 23,
                        balls: 13,
                        fours: 4,
                        six: 1,
                        strike: 176.00,
                    },
                    {
                        name: 'DJ Malan',
                        status: 'c & b Muhammad Nawaz',
                        runs: 64,
                        balls:22,
                        fours: 5,
                        six: 3,
                        strike: 136.00,
                    },
                    {
                        name: 'Hussain Talat',
                        status: 'c & b Muhammad Nawaz',
                        runs: 19,
                        balls: 12,
                        fours: 1,
                        six: 1,
                        strike: 86.36,
                    },
                    {
                        name: 'CA Ingram',
                        status: 'c & b Muhammad Nawaz',
                        runs: 6,
                        balls: 5,
                        fours: 1,
                        six: 0,
                        strike: 100.00,
                    }
                ],
            }
        }
    }
</script>

