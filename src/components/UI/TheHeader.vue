<template>
  <header ref="headerEl" class="relative">
    <div
      class="fixed z-40 w-full transition-all duration-300 ease-in-out before:absolute before:left-0 before:top-0 before:h-full before:w-full"
      :class="{
        'py-5 before:bg-wt/0 lg:py-8': isScroll,
        'py-3 before:bg-wt/95 lg:py-3.5': !isScroll
      }"
    >
      <div class="container flex items-center justify-between gap-4">
        <img src="../../assets/logo.svg" alt="logo" class="relative z-40 h-6 w-36" />
        <nav v-show="!isMobile" class="relative z-40">
          <ul class="flex items-center justify-center lg:gap-6 xl:gap-10">
            <li v-for="(link, i) in links" :key="i">
              <a
                :href="link.url"
                class="transition-color text-headline duration-300 ease-in hover:text-primary"
                >{{ link.title }}</a
              >
            </li>
          </ul>
        </nav>
        <TheButton
          @click="toogleContact"
          v-show="!isMobile"
          mode="brand"
          isShadow="true"
          class="relative z-40"
          >Lorem Ipsum
        </TheButton>
        <div
          v-show="isMobile"
          class="relative z-40 flex h-8 flex-col justify-between"
          @click="toggleMobile"
          ref="icon-mobile"
          id="icon-mobile"
        >
          <span
            v-for="i in 3"
            :key="i"
            class="relative z-40 block h-1 w-8 bg-headline transition duration-300 ease-in"
            :class="{
              'first:translate-y-[14px] first:rotate-45 last:-translate-y-[14px] last:-rotate-45 even:opacity-0':
                isActive
            }"
          ></span>
        </div>
        <div v-show="isMobile && isActive" class="fixed left-0 top-0 h-screen w-full"></div>
        <Transition
          enter-from-class="translate-x-full"
          enter-active-class="transition-transform duration-300 ease-out"
          enter-to-class="translate-x-0"
          leave-from-class="translate-x-0"
          leave-active-class="transition-transform duration-300 ease-in"
          leave-to-class="translate-x-full"
        >
          <nav
            v-show="isMobile && isActive"
            ref="mobile-menu"
            id="mobile-menu"
            class="absolute right-0 top-0 z-10 flex h-screen w-full max-w-xs flex-col items-center gap-8 overflow-auto bg-brand-light py-20 after:fixed after:right-0 after:top-0 after:h-14 after:w-full after:max-w-xs after:bg-brand-light md:gap-10 md:py-24"
          >
            <ul class="relative flex flex-col items-center justify-start gap-6 md:gap-8">
              <li v-for="(link, i) in links" :key="i">
                <a
                  :href="link.url"
                  @click="toggleMobile"
                  class="transition-color text-headline duration-300 ease-in hover:text-primary md:text-lg"
                  >{{ link.title }}</a
                >
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
