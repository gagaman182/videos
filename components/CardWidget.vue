<template>
  <card-component>
    <div class="level is-mobile">
      <div class="is-widget-label">
        <h2 class="subtitle is-spaced">
          {{ label }}
        </h2>
        <!-- <h1 class="title">
            <growing-number :value="number" :prefix="prefix" :suffix="suffix" />
          </h1> -->
        <b-button
          :type="typebutton"
          size="is-medium"
          icon-left="cursor-default-click"
          @click="routes"
          outlined
          class="is-warning"
        >
          เลือก
          <!-- {{ link }} -->
        </b-button>
      </div>

      <div v-if="icon" class="level-item has-widget-icon">
        <div class="is-widget-icon">
          <b-icon :icon="icon" size="is-large" :type="type" />
        </div>
      </div>
    </div>
  </card-component>
</template>

<script>
import CardComponent from '@/components/CardComponent'
// import GrowingNumber from '@/components/GrowingNumber'
export default {
  name: 'CardWidget',
  components: {
    // GrowingNumber,
    CardComponent,
  },
  props: {
    icon: {
      type: String,
      default: null,
    },
    number: {
      type: Number,
      default: 0,
    },
    prefix: {
      type: String,
      default: null,
    },
    suffix: {
      type: String,
      default: null,
    },
    label: {
      type: String,
      default: null,
    },
    type: {
      type: String,
      default: null,
    },
    typebutton: {
      type: String,
      default: null,
    },
    link: {
      type: String,
      default: null,
    },
  },
  methods: {
    routes() {
      $nuxt._router.push(this.link)
    },
  },
}
</script>
