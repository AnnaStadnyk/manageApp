<template>
  <header ref="headerEl" class="relative">

    <div class="fixed w-full transition-all duration-300 ease-in-out z-40
      before:absolute before:top-0 before:left-0 before:h-full before:w-full" :class="{
        'before:bg-wt/5 py-5 lg:py-8 ': isScroll,
        'before:bg-wt/100 py-3 lg:py-3.5 ': !isScroll
      }">
      <div class="container flex gap-4 justify-between items-center">
        <img src="../../assets/logo.svg" alt="logo" class="w-36 h-6 relative z-40" />
        <nav v-show="!isMobile" class="relative z-40">
          <ul class="flex justify-center items-center lg:gap-6 xl:gap-10">
            <li v-for="(link, i) in links" :key="i">
              <a :href="link.url" class="text-headline hover:text-primary transition-color duration-300 ease-in">{{
                link.title }}</a>
            </li>
          </ul>
        </nav>
        <TheButton @click="toogleContact" v-show="!isMobile" mode="brand" isShadow="true" class="relative z-40">Lorem
          Ipsum
        </TheButton>
        <div v-show="isMobile" class="flex flex-col h-8 justify-between relative z-40" @click="toggleMobile"
          ref="icon-mobile" id="icon-mobile">
          <span v-for="i in 3" :key="i" class="block w-8 h-1 bg-headline transition duration-300 ease-in relative z-40"
            :class="{
              'first:translate-y-[14px] first:rotate-45 last:-translate-y-[14px] last:-rotate-45 even:opacity-0':
                isActive
            }"></span>
        </div>
        <div v-show="isMobile && isActive" class="fixed top-0 left-0 w-full h-screen"></div>
        <Transition enter-from-class="translate-x-full" enter-active-class="transition-transform duration-300 ease-out"
          enter-to-class="translate-x-0" leave-from-class="translate-x-0"
          leave-active-class="transition-transform duration-300 ease-in" leave-to-class="translate-x-full">
          <nav v-show="isMobile && isActive" ref="mobile-menu" id="mobile-menu" class="absolute py-20 md:py-24 right-0 max-w-xs w-full top-0 h-screen bg-brand-light overflow-auto flex flex-col gap-8 md:gap-10 items-center 
            after:fixed after:top-0 after:right-0 after:max-w-xs after:w-full after:h-14 z-10 after:bg-brand-light">
            <ul class="flex flex-col justify-start items-center gap-6 md:gap-8 relative">
              <li v-for="(link, i) in links" :key="i">
                <a :href="link.url" @click="toggleMobile"
                  class="text-headline hover:text-primary md:text-lg transition-color duration-300 ease-in">{{
                  link.title }}</a>
              </li>
            </ul>
            <TheButton @click="toogleContact" mode="brand" isShadow="true">Lorem Ipsum</TheButton>
          </nav>
        </Transition>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  emits: ['show-contact'],
  props: ['show'],
  data() {
    return {
      links: [
        {
          title: 'Lorem',
          url: '#'
        },
        {
          title: 'Ipsum',
          url: '#'
        },
        {
          title: 'Dolor',
          url: '#'
        },
        {
          title: 'Sit Amet',
          url: '#'
        },
        {
          title: 'Consectetur',
          url: '#'
        }
      ],
      header: null,
      observer: null,
      isScroll: false,
      isMobile: false,
      isActive: false
    }
  },
  methods: {
    handleWindowResize() {
      this.isMobile = window.innerWidth < 1024 ? true : false
    },
    toggleMobile() {
      this.isActive = !this.isActive
      const html = document.querySelector('html')
      html.classList.toggle('block')
    },
    handleClickOutside(event) {
      if (this.isActive) {
        const icon = document.querySelector('#icon-mobile')
        if (icon.contains(event.target)) return

        const menu = document.querySelector('#mobile-menu')
        if (!menu.contains(event.target)) {
          this.isActive = false
          const html = document.querySelector('html')
          html.classList.remove('block')
        }
      }
    },
    toogleContact() {
      if (this.isMobile) this.toggleMobile()
      this.$emit('show-contact')
    }
  },
  created() {
    this.handleWindowResize()
    window.addEventListener('resize', this.handleWindowResize)
    document.addEventListener('mousedown', this.handleClickOutside)
  },
  mounted() {
    this.observer = new IntersectionObserver(
      ([entry]) => {
        this.isScroll = entry.isIntersecting
      },
      { threshold: 0.0 }
    )
    this.header = this.$refs.headerEl
    this.observer.observe(this.header)
  },
  beforeUnmount() {
    this.observer.disconnect()
  },
  unmounted() {
    window.removeEventListener('resize', this.handleWindowResize)
    document.removeEventListener('mousedown', this.handleClickOutside)
  }
}
</script>
