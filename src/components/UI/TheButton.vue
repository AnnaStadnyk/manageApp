<template>
  <button
    :class="
      mode === 'brand' ? ['bg-brand', 'text-white'] : ['bg-white', 'text-brand'],
      isShadow ? 'shadow-lg shadow-brand/50': '',
      small ? '' : 'min-w-48'
    "
    class="rounded-full px-8 py-3 transition duration-300 ease-in-out hover:opacity-90 focus:outline-none xl:py-3.5 xl:hover:-translate-y-1"
  >
    <slot></slot>
  </button>
</template>

<script>
export default {
  props: ['mode', 'isShadow', 'small']
}
</script>
