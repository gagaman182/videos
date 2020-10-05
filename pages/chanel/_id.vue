<template>
  <div>
    <!-- <title-bar :title-stack="titleStack" /> -->
    <hero-bar :icon="icon">
      {{ herobar }}
    </hero-bar>
    <section class="section is-main-section">
      <card-component title="วีดีโอการสอน" icon="video-vintage">
        <div
          class="columns is-mobile"
          v-for="item in items"
          :key="item.videoid1"
        >
          <div class="column is-12">
            <Video
              :videoid="item.videoid1"
              :title="item.title1"
              :content="item.content1"
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
      items: [
        {
          videoid1: 'kKH3rfuINUA',
          title1: 'ปรับก่อนป่วย : กายภาพบำบัดผู้ป่วยกระดูกสันหลังทับเส้นประสาท',
          content1:
            'มาดูกันว่า กระดูกทับเส้นประสาท กับหมอนรองกระดูกทับเส้นประสาท มีความเหมือนและแตกต่างกันอย่างไร แล้วมาฝึกกายภาพบำบัดผู้ป่วยกระดูกสันหลังทับเส้นประสาท  ',
        },
        {
          videoid1: '_esJJrLY_IA',
          title1: 'กายภาพบำบัดแก้ข้อเข่าเสื่อม : บำบัดง่าย ๆ ด้วยกายภาพ',
          content1:
            'ทำไมอาการ "ข้อเข่าเสื่อม" มักเกิดในกลุ่มผู้สูงวัย ดร.กภ.วัลลภ คุณานุสรณ์ชัย จะมาอธิบายรวมถึงแนะนำท่าออกกำลังกายสำหรับผู้ที่มีอาการข้อเข่าเสื่อม เพื่อเพิ่มการเคลื่อนไหวของข้อเข่า',
        },
        {
          videoid1: 'Un9ctXZpa34',
          title1: 'ปรับก่อนป่วย : กายภาพบำบัดแก้อาการรองช้ำ',
          content1:
            'สำหรับใครที่กำลังมีปัญหาเจ็บส้นเท้า จนลามไปทั่วบริเวณฝ่าเท้า คุณอาจจะประสบกับอาการที่เรียกว่า "รองช้ำ" ดังนั้นในช่วงปรับก่อนป่วย กภ.สุธาสินี ทองอ่อน คณะกายภาพบำบัดมหาวิทยาลัยมหิดล',
        },
        {
          videoid1: 'kj5WxcBKJWg',
          title1: 'รู้สู้โรค : กายภาพบำบัดกลุ่มโรควัยทำงาน',
          content1:
            '“กายภาพบำบัดกลุ่มโรควัยทำงาน” ต้องทำอย่างไร? พิทยุตม์ โตขำ นักกายภาพระบบกระดูกและกล้ามเนื้อ จะมาให้คำแนะนำพร้อมวิธีสังเกตอาการปวดต่าง ๆ และการบำบัดด้วยตัวเอง',
        },
      ],
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
