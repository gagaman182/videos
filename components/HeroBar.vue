<template>
  <section class="hero is-hero-bar">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <article class="tile is-child notification is-warning">
              <p class="title">
                <b-icon
                  v-if="icon"
                  :icon="icon"
                  custom-size="default"
                /><slot />
              </p>
            </article>
          </div>
        </div>
        <div v-show="hasRightVisible" class="level-right">
          <div class="level-item">
            <slot name="right" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'HeroBar',
  props: {
    hasRightVisible: {
      type: Boolean,
      default: true,
    },
    icon: {
      type: String,
      default: null,
    },
  },
}
</script>
