<template>
  <TheSection>
    <template #title>
      <h2 class="text-center text-3xl font-semibold text-headline lg:text-left xl:text-4xl/[3rem]">
        Lorem ipsum dolor sit.
      </h2>
      <p class="text-center lg:text-left">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio delectus veritatis
        aperiam perferendis omnis nostrum, cumque error obcaecati assumenda eos?
      </p>
    </template>
    <template #description>
      <ul class="flex flex-col gap-8 xl:gap-6">
        <li
          v-for="(advantage, i) in advantages"
          :key="i"
          class="relative grid grid-cols-[auto_1fr] grid-rows-[auto_1fr] items-center gap-x-4 gap-y-8 before:absolute before:left-0 before:top-0 before:-z-10 before:h-[56px] before:w-full before:rounded-l-full before:bg-brand-light before:content-[''] md:gap-x-6 lg:before:content-none xl:grid-rows-[56px_1fr] xl:gap-x-8 xl:gap-y-6"
        >
          <span
            class="min-w-12 self-start rounded-full bg-brand py-3.5 text-center font-semibold text-white md:px-6 lg:row-span-2 lg:px-8"
            >{{ String(i + 1).padStart(2, '0') }}</span
          >
          <h6 class="text-xl font-semibold text-headline">{{ advantage.title }}</h6>
          <p class="col-span-2 lg:col-auto lg:text-left">{{ advantage.description }}</p>
        </li>
      </ul>
    </template>
  </TheSection>
</template>

<script>
import TheSection from '@/components/UI/TheSection.vue'
export default {
  components: {
    TheSection
  },
  data() {
    return {
      advantages: [
        {
          title: 'Lorem ipsum dolor sit.',
          description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quibusdam nihil alias eligendi necessitatibus consequuntur voluptatem maiores sequi repellendus architecto odio sunt id deserunt voluptates nemo, aperiam qui animi amet?'
        },
        {
          title: 'Lorem ipsum dolor sit amet.',
          description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur hic, culpa laboriosam porro et maiores aspernatur at ullam repudiandae sequi earum, impedit harum ipsum incidunt ratione. Atque rerum sint impedit! Impedit odit adipisci dolor corrupti!'
        },
        {
          title: 'Lorem ipsum dolor sit amet consectetur.',
          description:
            'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore eos ipsum voluptas soluta. Aut fuga consectetur, consequuntur corrupti reprehenderit quaerat.'
        }
      ]
    }
  }
}
</script>
