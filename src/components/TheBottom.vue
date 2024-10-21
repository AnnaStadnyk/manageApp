<template>
  <TheSection class="bg-brand py-4 lg:py-8" footer="true">
    <template #title>
      <h3 class="text-center text-2xl font-semibold text-white lg:text-left xl:text-3xl/[2.5rem]">
        Lorem ipsum dolor sit amet consectetur.
      </h3>
    </template>
    <template #description>
      <TheButton
        @click="toogleContact"
        mode="inverted"
        class="self-center justify-self-center lg:justify-self-end"
        >Lorem Ipsum
      </TheButton>
    </template>
  </TheSection>
</template>

<script>
import TheSection from '@/components/UI/TheSection.vue'
export default {
  components: {
    TheSection
  },
  emits: ['show-contact'],
  methods: {
    toogleContact() {
      this.$emit('show-contact')
    }
  }
}
</script>
