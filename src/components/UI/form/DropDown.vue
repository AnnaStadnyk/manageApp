<template>
  <Listbox
    :modelValue="modelValue"
    @update:modelValue="(value) => this.$emit('update:modelValue', value)"
    by="id"
  >
    <ListboxLabel
      :for="id"
      v-if="label"
      class="block mb-3 lg:mb-4 text-sm text-headline font-semibold"
      >{{ label }}
    </ListboxLabel>
    <div class="relative">
      <ListboxButton
        @focus="this.$emit('cancel-error')"
        class="relative w-full cursor-default outline-0 border-2 rounded-full bg-white py-2.5 xl:py-3 px-8 text-left focus:border-brand focus-visible:border-brand transition duration-300 ease-in"
        :class="{ 'border-brand': error !== '' }"
      >
        <span class="block truncate">{{ modelValue.name }}</span>
        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
          <ChevronUpDownIcon class="h-8 w-8 text-primary" aria-hidden="true" />
        </span>
      </ListboxButton>

      <transition
        leave-active-class="transition duration-100 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <ListboxOptions
          class="absolute mt-1 max-h-36 w-full overflow-auto rounded-xl bg-white border-2 focus:outline-none z-10"
        >
          <ListboxOption
            v-slot="{ active, selected }"
            v-for="item in items"
            :key="item.name"
            :value="item"
            as="template"
          >
            <li
              :class="[
                active ? 'bg-primary-light text-headline' : 'text-base',
                'relative cursor-default select-none py-2 px-8'
              ]"
            >
              <span :class="[selected ? 'font-medium' : 'font-normal', 'block truncate']">{{
                item.name
              }}</span>
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
  </Listbox>
  <BaseErrorMessage v-if="error"> {{ error }}</BaseErrorMessage>
</template>

<script>
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption
} from '@headlessui/vue'
import { ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import BaseErrorMessage from '@/components/UI/form/BaseErrorMessage.vue'
export default {
  components: {
    Listbox,
    ListboxLabel,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
    ChevronUpDownIcon,
    BaseErrorMessage
  },
  props: {
    label: {
      type: String,
      default: ''
    },
    modelValue: { type: Object, required: false },
    items: { type: Array, required: false },
    error: {
      type: String,
      default: ''
    },
    id: {
      type: String,
      default: ''
    },
  },
  emits: ['update:modelValue']
}
</script>
