<template>
  <TheHeader :show="isShown" @show-contact="toogleContact"></TheHeader>

  <main
    class="bg-[url('../assets/bg.svg'),url('../assets/bg-b.svg')] bg-no-repeat [background-position:top_right,bottom_left] bg-[length:100vmax_auto] lg:bg-[length:75vmax_auto] xl:bg-[length:50vmax_auto]">
    <TheHero @show-contact="toogleContact"></TheHero>
    <TheAdvantage></TheAdvantage>
    <TheTesimonial @show-contact="toogleContact"></TheTesimonial>
    <TheBottom @show-contact="toogleContact"></TheBottom>
    <TheContact v-if="isShown" @close-contact="toogleContact" :show="isShown"></TheContact>
  </main>

  <TheFooter></TheFooter>
</template>

<script>
import TheHeader from '@/components/UI/TheHeader.vue'
import TheHero from '@/components/TheHero.vue'
import TheAdvantage from '@/components/TheAdvantage.vue'
import TheTesimonial from '@/components/TheTesimonial.vue'
import TheBottom from '@/components/TheBottom.vue'
import TheFooter from '@/components/TheFooter.vue'
import TheContact from '@/components/TheContact.vue'

export default {
  components: {
    TheHeader,
    TheHero,
    TheAdvantage,
    TheTesimonial,
    TheBottom,
    TheFooter,
    TheContact
  },
  data() {
    return {
      isShown: false
    }
  },
  methods: {
    toogleContact() {
      const html = document.querySelector('html')
      html.classList.toggle('block')
      this.isShown = !this.isShown
    }
  }
}
</script>

