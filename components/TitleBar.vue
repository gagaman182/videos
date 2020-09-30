<template>
  <section class="section is-title-bar">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <ul>
            <li v-for="(title, index) in titleStack" :key="index">
              <nuxt-link to="/">
                {{ title }}
              </nuxt-link>
            </li>
          </ul>
        </div>
      </div>
      <!-- ข้อความ titlebar ขวา -->
      <div class="level-right">
        <div class="level-item">
          <div class="buttons is-right">
            <a
              href="https://www.hatyaihospital.go.th/"
              target="_blank"
              class="button is-light"
            >
              <b-icon icon="hospital-building" custom-size="default" />
              <span>โรงพยาบาลหาดใหญ่</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'TitleBar',
  props: {
    titleStack: {
      type: Array,
      default: () => [],
    },
    links: {
      type: String,
      default: null,
    },
  },
}
</script>
