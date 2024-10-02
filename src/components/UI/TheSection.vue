<template>
  <section :class="hero ? ['pt-36', 'md:pt-44', '2xl:pt-48'] : ['mt-20', 'md:mt-24', '2xl:mt-28']">
    <div class="container grid lg:grid-cols-2 gap-12 xl:gap-20" :class="{ 'gap-y-8': footer }">
      <div class="flex flex-col justify-center gap-8 xl:gap-10 lg:max-w-[90%] 2xl:max-w-[80%]">
        <slot name="title"></slot>
      </div>
      <slot name="description"></slot>
    </div>
  </section>
</template>

<script>
export default {
  props: ['hero', 'footer']
}
</script>
