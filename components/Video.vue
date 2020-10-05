<template>
  <div class="box">
    <article class="media">
      <div class="media-content">
        <div class="content">
          <p>
            <strong>{{ title }}</strong>

            <br />
            {{ content }}
          </p>
          <center>
            <div v-blur="blurConfig">
              <youtube :video-id="videoid" />
            </div>
          </center>
          <div class="field">
            <b-checkbox size="is-large" @input="noblur" v-model="seevideo"
              >ดูคลิป</b-checkbox
            >
          </div>

          <!-- <div v-blur="blurConfig">fffff</div> -->
        </div>
      </div>
    </article>
  </div>
</template>

<script>
export default {
  name: 'Video',
  props: {
    videoid: {
      type: String,
      default: null,
    },
    title: {
      type: String,
      default: null,
    },
    content: {
      type: String,
      default: null,
    },
  },
  data() {
    return {
      isBlurred: true,

      blurConfig: {
        isBlurred: true,
        opacity: 0.3,
        filter: 'blur(1.2px)',
        transition: 'all .3s linear',
      },
      seevideo: Boolean,
    }
  },
  methods: {
    noblur() {
      this.blurConfig.isBlurred = !this.blurConfig.isBlurred
      this.isBlurred = !this.isBlurred
      // alert(this.seevideo)
    },
  },
  computed: {
    player() {
      return this.$refs.youtube.player
    },
  },
}
</script>
<style>
iframe {
  width: 70vw;
  height: 30vw;
}

/* iframe{
  width: 100vw
  height: calc(100vw/1.77);
} */
</style>
