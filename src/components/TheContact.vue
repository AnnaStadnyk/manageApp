<template>
  <Teleport to="body">
    <section class="">
      <Transition
        enter-from-class="opacity-0"
        enter-active-class="transition-all duration-300 ease-out"
        enter-to-class="opacity-100"
        leave-from-class="opacity-100"
        leave-active-class="transition-all duration-300 ease-in"
        leave-to-class="opacity-0"
      >
        <div v-if="show" class="w-full min-h-screen bg-white/80 fixed top-0 left-0 z-50"></div>
      </Transition>

      <Transition
        enter-from-class="opacity-0 scale-90"
        enter-active-class="transition-all duration-300 ease-out"
        enter-to-class="opacity-100 scale-100"
        leave-from-class="opacity-100 scale-100"
        leave-active-class="transition-all duration-300 ease-in"
        leave-to-class="opacity-0 scale-90"
      >
        <div
          v-if="show"
          @click="closeContact"
          class="fixed top-0 left-0 h-screen w-full z-50 overflow-y-auto"
        >
          <div class="container min-h-screen py-16 flex place-items-center">
            <div
              id="content"
              class="max-w-5xl w-full mx-auto p-8 lg:p-10 bg-brand-light rounded-2xl"
            >
              <h2
                class="text-3xl text-headline font-semibold text-center xl:text-4xl/[3rem] mb-8 xl:mb-10"
              >
                Contact Information
              </h2>
              <form
                action=""
                class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8"
                @submit.prevent="saveContact"
              >
                <div>
                  <BaseInput
                    v-model.trim="contact.name"
                    label="First Name"
                    type="text"
                    :error="errors.name"
                    id="name"
                    @cancel-error="cancelError('name')"
                  ></BaseInput>
                </div>
                <div>
                  <BaseInput
                    v-model.trim="contact.surname"
                    label="Last Name"
                    type="text"
                    :error="errors.surname"
                    id="surname"
                    @cancel-error="cancelError('surname')"
                  ></BaseInput>
                </div>
                <div>
                  <BaseInput
                    v-model="contact.phone"
                    label="Mobile Phone"
                    type="tel"
                    :error="errors.phone"
                    id="phone"
                    @cancel-error="cancelError('phone')"
                  ></BaseInput>
                </div>
                <div>
                  <BaseInput
                    v-model.trim="contact.email"
                    label="E-mail"
                    type="email"
                    :error="errors.email"
                    id="email"
                    @cancel-error="cancelError('email')"
                  ></BaseInput>
                </div>
                <div>
                  <DropDown
                    v-model="contact.department"
                    :items="departments"
                    label="Department"
                    :error="errors.department"
                    id="department"
                    @cancel-error="cancelError('department')"
                  >
                  </DropDown>
                </div>
                <div>
                  <BaseCheckbox
                    v-model="contact.privacy"
                    label="I Agree to Terms and Conditions and Privacy Policy"
                    :error="errors.privacy"
                    id="privacy"
                    @cancel-error="cancelError('privacy')"
                  ></BaseCheckbox>
                </div>
                <div class="md:col-span-2 text-center">
                  <TheButton mode="brand" isShadow="true" id="submit">Submit</TheButton>
                </div>
              </form>
            </div>
          </div>
        </div>
      </Transition>
    </section>
  </Teleport>
</template>

<script>
import BaseInput from '@/components/UI/form/BaseInput.vue'
import BaseCheckbox from '@/components/UI/form/BaseCheckbox.vue'
import DropDown from '@/components/UI/form/DropDown.vue'

export default {
  components: {
    BaseInput,
    BaseCheckbox,
    DropDown
  },
  props: ['show'],
  data() {
    return {
      contact: {
        name: '',
        surname: '',
        phone: '',
        email: '',
        department: { id: 1, name: 'Marketing', contact: 'Lorem Ipsum' },
        privacy: false
      },
      errors: {},
      departments: [
        { id: 1, name: 'Marketing', contact: 'Lorem Ipsum' },
        { id: 2, name: 'HR', contact: 'Lorem Ipsum' },
        { id: 3, name: 'Sales', contact: 'Lorem Ipsum' },
        { id: 4, name: 'Finance', contact: 'Lorem Ipsum' },
        { id: 5, name: 'Customer service', contact: 'Lorem Ipsum' }
      ]
    }
  },
  emits: ['close-contact', 'save-contact'],
  methods: {
    closeContact(event) {
      const content = document.querySelector('#content')
      if (!content.contains(event.target)) {
        this.$emit('close-contact')
      }
    },
    saveContact() {
      if (this.contact.name === '') this.errors.name = 'Please, enter your first name'
      if (this.contact.surname === '') this.errors.surname = 'Please, enter your last name'
      if (this.contact.phone === '') this.errors.phone = 'Please, enter your phone'
      if (this.contact.email === '') this.errors.email = 'Please, enter your e-mail'
      if (!this.departments.find((dep) => dep.id === this.contact.department.id))
        this.errors.department = 'Please, select a department'
      if (!this.contact.privacy)
        this.errors.privacy = 'Please, agree to Terms and Conditions and Privacy Policy'

      if (!Object.keys(this.errors).length) {
        // fetch
        this.$emit('close-contact')
      }
    },
    cancelError(error) {     
      delete this.errors[error]
    }
  }
}
</script>
