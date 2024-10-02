<template>
  <TheSection>
    <template #title>
      <h2 class="text-3xl text-headline font-semibold text-center xl:text-4xl/[3rem] lg:text-left">
        Lorem ipsum dolor sit.
      </h2>
      <p class="text-center lg:text-left">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio delectus veritatis aperiam perferendis omnis nostrum, cumque error obcaecati assumenda eos?
      </p>
    </template>
    <template #description>
      <ul class="flex flex-col gap-8 xl:gap-6">
        <li
          v-for="(advantage, i) in advantages"
          :key="i"
          class="grid grid-cols-[auto_1fr] grid-rows-[auto_1fr] xl:grid-rows-[56px_1fr] gap-x-4 md:gap-x-6 xl:gap-x-8 gap-y-8 xl:gap-y-6 items-center relative lg:before:content-none before:content-[''] before:absolute before:top-0 before:left-0 before:h-[56px] before:w-full before:bg-brand-light before:rounded-l-full before:-z-10"
        >
          <span
            class="lg:row-span-2 min-w-12 py-3.5 md:px-6 lg:px-8 bg-brand text-white text-center font-semibold rounded-full self-start"
            >{{ String(i + 1).padStart(2, '0') }}</span
          >
          <h6 class="text-xl text-headline font-semibold">{{ advantage.title }}</h6>
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
