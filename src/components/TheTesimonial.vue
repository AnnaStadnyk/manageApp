<template>
  <section
    class="m-auto mt-20 flex max-w-[1920px] flex-col items-center justify-center gap-8 md:mt-24 xl:gap-10 2xl:mt-28"
  >
    <h2 class="text-3xl font-semibold text-headline xl:text-4xl/[3rem]">Lorem ipsum dolor</h2>
    <swiper-container init="false" ref="swiperEl" class="max-w-full">
      <swiper-slide v-for="(testimonial, i) in testimonials" :key="i" class="flex h-auto flex-col">
        <div
          class="relative mt-8 flex flex-[1_1_100%] flex-col items-center gap-3.5 rounded-sm bg-primary-light px-3.5 pb-3.5 pt-11"
        >
          <img
            :src="testimonial.url"
            :alt="testimonial.name"
            class="absolute left-1/2 top-0 aspect-square h-16 w-16 -translate-x-1/2 -translate-y-1/2 transform rounded-full object-cover object-center"
          />
          <h6 class="text-sm font-semibold text-headline">{{ testimonial.name }}</h6>
          <p class="text-center">{{ testimonial.text }}</p>
        </div>
      </swiper-slide>
    </swiper-container>
    <TheButton @click="toogleContact" mode="brand" isShadow="true">Lorem Ipsum</TheButton>
  </section>
</template>

<script>
import { register } from 'swiper/element/bundle'
import { Autoplay } from 'swiper/modules'
export default {
  emits: ['show-contact'],
  data() {
    return {
      testimonials: [
        {
          name: 'Lorem Ipsum',
          text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, saepe voluptatibus? Doloremque sed nulla vitae id recusandae quia et, facere reprehenderit est assumenda.',
          url: '/images/test_1.jpg'
        },
        {
          name: 'Dolor Sit',
          text: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita, molestias nam! Dolorum explicabo voluptatem molestiae nisi hic impedit officiis libero fugiat repellendus, quo sapiente perspiciatis non error ex.',
          url: '/images/test_2.jpg'
        },
        {
          name: 'Consectetur Elit',
          text: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit ipsum quaerat rem assumenda ipsa praesentium.',
          url: '/images/test_3.jpg'
        },
        {
          name: 'Velit Atque',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt voluptatem at repudiandae fugiat, voluptate hic exercitationem tempora eos atque reprehenderit et blanditiis facere perferendis deserunt quis architecto.',
          url: '/images/test_2.jpg'
        }
      ],
      swiperEl: null,
      swiperParams: {
        slidesPerView: 1,
        spaceBetween: 32,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        autoheight: true,
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 32
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 40
          }
        },
        modules: [Autoplay],
        updateOnWindowResize: true
      }
    }
  },
  methods: {
    swiperInit() {
      this.swiperEl = this.$refs.swiperEl
      Object.assign(this.swiperEl, this.swiperParams)
      this.swiperEl.initialize()
    },
    toogleContact() {
      this.$emit('show-contact')
    }
  },
  created() {
    register()
  },
  mounted() {
    this.swiperInit()
  }
}
</script>
