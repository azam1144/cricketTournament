import Vue from 'vue'
import VueRouter from 'vue-router'

import Series from './components/series/Base'
import Teams from './components/teams/Base'
import Match from './components/match/Base'
Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/series', component: Series},
        { path: '/teams/:seriesId', component: Teams},
        { path: '/matches/:seriesId', component: Match},
        { path: '/match/:matchId', component: Match},
    ],
    mode: 'history'
});
