import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify);

const opts = {
    theme: {
        primary: "#6784bf",
        secondary: "#e57373",
        accent: "#9c27b0",
        error: "#f44336",
        warning: "#ffeb3b",
        info: "#2196f3",
        success: "#4caf50",
        ideaCore: "689f38",
        greyText: '#4b4b4b',
        fbColor: '#3B5998',
        twitterColor: '#1DA1F2',
        instaColor:'#262626',
        pintColor:'#BD081C',
        socialGenie: '#f4d239',
        primaryHover:'#ffbb41',
        lightGreenCta:'#d0d0d0',
        tableHead: '#f3f3f3',
        ctaColor: '#f4d239',
        textColor: '#1e1e1e',
        stepperColor: "#39475a",
        sideBar:"#244195",
        topBar:"#e1e5f0"
    }
};

export default new Vuetify(opts)
