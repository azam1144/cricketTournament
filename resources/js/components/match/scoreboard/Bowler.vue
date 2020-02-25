<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <v-simple-table dense>
        <template v-slot:default>
            <thead>
            <tr>
                <th class="text-left">Bowler</th>
                <th class="text-left">O</th>
                <th class="text-left">M</th>
                <th class="text-left">R</th>
                <th class="text-left">W</th>
                <th class="text-left">E/R</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in desserts" :key="item.name">
                <td>{{ item.name }}</td>
                <td>{{ item.calories }}</td>
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
                        name: 'Frozen Yogurt',
                        calories: 159,
                    },
                    {
                        name: 'Ice cream sandwich',
                        calories: 237,
                    },
                    {
                        name: 'Eclair',
                        calories: 262,
                    },
                    {
                        name: 'Cupcake',
                        calories: 305,
                    },
                    {
                        name: 'Gingerbread',
                        calories: 356,
                    },
                    {
                        name: 'Jelly bean',
                        calories: 375,
                    },
                    {
                        name: 'Lollipop',
                        calories: 392,
                    },
                    {
                        name: 'Honeycomb',
                        calories: 408,
                    },
                    {
                        name: 'Donut',
                        calories: 452,
                    },
                    {
                        name: 'KitKat',
                        calories: 518,
                    },
                ],
            }
        }
    }
</script>

