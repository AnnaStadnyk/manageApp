import './assets/main.css'

import TheButton from '@/components/UI/TheButton.vue'

import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App)

app.component('TheButton', TheButton)

app.mount('#app')
