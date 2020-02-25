<template>
    <div>
        <v-tabs v-model="scoreTab" align-with-title>
            <v-tab v-for="item in items" :key="item">
                {{ item }}
            </v-tab>
        </v-tabs>
        <v-tabs-items vertical v-model="scoreTab">
            <v-tab-item v-for="item in items" :key="item">
                <v-card flat>
                    <div v-if="item === 'SHR INNING'" class="card-overflow">
                        <v-flex xs12 class="text-xs-center flex-margin">
                            <Batsmen></Batsmen>
                        </v-flex>
                        <v-flex xs12 class="text-xs-center flex-margin">
                            <Bowler></Bowler>
                        </v-flex>
                        <v-flex xs12 class="text-xs-center flex-margin">
                            <Partnership></Partnership>
                        </v-flex>
                    </div>
                </v-card>
                <v-card flat>
                    <div v-if="item === 'CSK INNING'" class="card-overflow">
                        <v-flex xs12 class="text-xs-center flex-margin">
                            <Batsmen></Batsmen>
                        </v-flex>
                        <v-flex xs12 class="text-xs-center flex-margin">
                            <Bowler></Bowler>
                        </v-flex>
                        <v-flex xs12 class="text-xs-center flex-margin">
                            <Partnership></Partnership>
                        </v-flex>
                    </div>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </div>
</template>

<style lang="scss" scoped>
    .card-overflow{
        max-height: 600px;
        overflow: auto
    }
    .flex-margin{
        margin-top: 10px;
    }
</style>
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

