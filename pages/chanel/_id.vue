<template>
  <div>
    <!-- <title-bar :title-stack="titleStack" /> -->
    <hero-bar :icon="icon">
      {{ herobar }}

      <!-- <nuxt-link slot="right" to="/" class="button">
        Dashboard
      </nuxt-link> -->
    </hero-bar>
    <section class="section is-main-section">
      <card-component title="วีดีโอการสอน" icon="video-vintage">
        <div class="columns is-desktop">
          <div class="column">
            <Video
              videoid="ZQGsh6tbLwU"
              title="John Smith"
              content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
            efficitur sit amet massa fringilla egestas. Nullam condimentum
            luctus turpis."
            />
          </div>
          <div class="column">
            <Video
              videoid="WVyjPVNW_aM"
              title="John Smith"
              content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
            efficitur sit amet massa fringilla egestas. Nullam condimentum
            luctus turpis."
            />
          </div>
        </div>
        <div class="columns is-desktop">
          <div class="column">
            <Video
              videoid="ZQGsh6tbLwU"
              title="John Smith"
              content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
            efficitur sit amet massa fringilla egestas. Nullam condimentum
            luctus turpis."
            />
          </div>
          <div class="column">
            <Video
              videoid="WVyjPVNW_aM"
              title="John Smith"
              content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
            efficitur sit amet massa fringilla egestas. Nullam condimentum
            luctus turpis."
            />
          </div>
        </div>
        <div class="columns is-desktop">
          <div class="column">
            <Video
              videoid="ZQGsh6tbLwU"
              title="John Smith"
              content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
            efficitur sit amet massa fringilla egestas. Nullam condimentum
            luctus turpis."
            />
          </div>
          <div class="column">
            <Video
              videoid="WVyjPVNW_aM"
              title="John Smith"
              content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
            efficitur sit amet massa fringilla egestas. Nullam condimentum
            luctus turpis."
            />
          </div>
        </div>
      </card-component>
    </section>
  </div>
</template>

<script>
import TitleBar from '@/components/TitleBar'
import CardComponent from '@/components/CardComponent'
import Video from '@/components/Video'
import HeroBar from '@/components/HeroBar'
export default {
  name: 'Forms',
  components: {
    HeroBar,
    CardComponent,
    TitleBar,
    Video,
  },
  data() {
    return {
      herobar: null,
      icon: null,
      height: 360,
      width: 640,
      isLoading: false,
      form: {
        name: null,
        email: null,
        phone: null,
        department: null,
        subject: null,
        question: null,
      },
      customElementsForm: {
        checkbox: [],
        radio: null,
        switch: true,
        file: null,
      },
      departments: ['Business Development', 'Marketing', 'Sales'],
    }
  },
  computed: {
    titleStack() {
      // return ['บุคคลทั่วไป',this.herobar]

      return ['ภาวะกลืนลำบาก']
    },
  },
  mounted() {
    this.setherobar()
    this.seticon()
  },
  methods: {
    //set font on herobar
    setherobar() {
      if (this.$route.params.id == '1') {
        this.herobar = 'ความรู้ทั่วไป/ความหมาย/อาการข้อควรระวัง'
      } else if (this.$route.params.id == '2') {
        this.herobar = 'การบำบัดฟื้นฟู'
      } else if (this.$route.params.id == '3') {
        this.herobar = 'อาหารฝึกกลืน'
      } else if (this.$route.params.id == '4') {
        this.herobar = 'การฝึกหายใจ'
      } else if (this.$route.params.id == '5') {
        this.herobar = 'การทำความสะอาดช่องปาก/ดูดเสมหะ'
      } else if (this.$route.params.id == '6') {
        this.herobar = 'ติดต่อเรา'
      }
    },
    //set icon on herobar
    seticon() {
      if (this.$route.params.id == '1') {
        this.icon = 'monitor-dashboard'
      } else if (this.$route.params.id == '2') {
        this.icon = 'seat-flat-angled'
      } else if (this.$route.params.id == '3') {
        this.icon = 'food'
      } else if (this.$route.params.id == '4') {
        this.icon = 'gas-cylinder'
      } else if (this.$route.params.id == '5') {
        this.icon = 'tooth-outline'
      } else if (this.$route.params.id == '6') {
        this.icon = 'hospital-building'
      }
    },
    reset() {
      this.form = mapValues(this.form, (item) => {
        if (item && typeof item === 'object') {
          return []
        }
        return null
      })

      this.$buefy.snackbar.open({
        message: 'Reset successfully',
        queue: false,
      })
    },
  },
  head() {
    return {
      title: this.herobar + ' กลุ่มงานเวชกรรมฟื้นฟู โรงพยาบาลหาดใหญ่',
    }
  },
}
</script>
