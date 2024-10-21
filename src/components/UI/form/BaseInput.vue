<template>
  <label :for="id" v-if="label" class="mb-3 block text-sm font-semibold text-headline lg:mb-4">{{
    label
  }}</label>
  <input
    v-bind="$attrs"
    :value="modelValue"
    :placeholder="getPlaceholder"
    @input="$emit('update:modelValue', $event.target.value)"
    @focus="$emit('cancel-error')"
    :id="id"
    class="w-full rounded-full border-2 px-8 py-2.5 text-headline outline-0 transition duration-300 ease-in placeholder:text-primary focus:border-brand xl:py-3"
    :class="{ 'border-brand': error !== '' }"
  />
  <BaseErrorMessage v-if="error"> {{ error }}</BaseErrorMessage>
</template>

<script>
import BaseErrorMessage from '@/components/UI/form/BaseErrorMessage.vue'

export default {
  components: {
    BaseErrorMessage
  },
  props: {
    label: {
      type: String,
      default: ''
    },
    modelValue: {
      type: [String, Number],
      default: ''
    },
    placeholder: {
      type: String,
      default: null
    },
    error: {
      type: String,
      default: ''
    },
    id: {
      type: String,
      default: ''
    }
  },
  computed: {
    getPlaceholder() {
      if (this.placeholder) return this.placeholder
      else return `Enter Your ${this.label} ...`
    }
  }
}
</script>
