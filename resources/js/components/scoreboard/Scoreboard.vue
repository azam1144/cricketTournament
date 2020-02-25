<template>
    <div>
        <Batsmen></Batsmen>
        <Bowler></Bowler>
        <Partnership></Partnership>
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

            }
        }
    }
</script>

