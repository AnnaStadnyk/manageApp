<template>
  <div class="flex gap-3 items-start">
    <input
      type="checkbox"
      :checked="modelValue"
      @change="$emit('update:modelValue', $event.target.checked)"
      @focus="$emit('cancel-error')"
      class="appearance-none relative min-w-5 h-5 border-2 top-1 checked:after:absolute checked:after:-top-2 checked:after:left-[6px] checked:after:w-3 checked:after:h-5 checked:after:border-r-2 checked:after:border-b-2 checked:after:border-headline checked:after:transorm checked:after:rotate-45"
      :id="id"
      :class="{ 'border-headline': error === '', 'border-brand': error !== '' }"
    />
    <label v-if="label" :for="id">{{ label }}</label>
  </div>
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
      type: Boolean,
      default: false
    },
    error: {
      type: String,
      default: ''
    },
    id: {
      type: String,
      default: ''
    }
  }
}
</script>
