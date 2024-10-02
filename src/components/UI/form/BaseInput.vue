<template>
  <label :for="id" v-if="label" class="block mb-3 lg:mb-4 text-sm text-headline font-semibold">{{
    label
  }}</label>
  <input
    v-bind="$attrs"
    :value="modelValue"
    :placeholder="getPlaceholder"
    @input="$emit('update:modelValue', $event.target.value)"
    @focus="$emit('cancel-error')"
    :id="id"
    class="w-full rounded-full outline-0 border-2 py-2.5 xl:py-3 px-8 text-headline placeholder:text-primary focus:border-brand transition duration-300 ease-in"
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
