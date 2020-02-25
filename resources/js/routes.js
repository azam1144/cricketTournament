import Vue from 'vue'
import VueRouter from 'vue-router'

import Series from './components/series/Header'
import Teams from './components/teams/Header'
import Match from './components/match/Header'
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
