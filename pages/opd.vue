<template>
  <div>
    <!-- <title-bar :title-stack="titleStack" /> -->
    <hero-bar icon="view-list">
      ประวัติการรับริการ
      <nuxt-link slot="right" to="/" class="button">
        Dashboard
      </nuxt-link>
    </hero-bar>
    <section class="section is-main-section">
      <card-component title="ข้อมูลการรับบริการ" icon="account-circle">
        <b-field
          label="ค้นหา"
          message="ค้นหาประวัติการรับบริการได้จาก HN โรงพยาบาล"
          horizontal
        >
          <b-input
            placeholder="HN..."
            type="search"
            icon="magnify"
            v-model="hnsearch"
            icon-clickable
            @icon-click="searchIconClick"
          >
          </b-input>
        </b-field>

        <b-field horizontal>
          <b-field grouped>
            <div class="control">
              <b-button
                native-type="submit"
                type="is-primary"
                @click="searchHN"
              >
                ค้นหา
              </b-button>
            </div>
            <div class="control">
              <b-button type="is-primary " @click="reset">
                รีเซ็ต
              </b-button>
            </div>
          </b-field>
        </b-field>
      </card-component>
      <div class="columns">
        <div class="column is-one-third">
          <card-component title="รับบริการ" icon="ballot-outline">
            <table-search
              :searchtable="searchtable"
              :isLoading="isLoading"
              :paginated="paginated"
              @detail="detail_opdno"
            ></table-search>
          </card-component>
        </div>
        <div class="column">
          <card-component title="รายละเอียด" icon="ballot-outline">
            <opd-Detail :opddetail="opddetail"></opd-Detail>
          </card-component>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import mapValues from 'lodash/mapValues'
import TitleBar from '@/components/TitleBar'
import CardComponent from '@/components/CardComponent'
import ClientsTableSample from '@/components/ClientsTableSample'
import HeroBar from '@/components/HeroBar'
import TableSearch from '@/components/TableSearch'
import OpdDetail from '@/components/OpdDetail'
import axios from 'axios'
import { APIPath } from '@/backend/APIPath'
const apiPath = new APIPath()
export default {
  name: 'Opd',
  components: {
    HeroBar,
    ClientsTableSample,
    CardComponent,
    TitleBar,
    TableSearch,
    OpdDetail,
  },
  data() {
    return {
      isLoading: false,

      name: '',
      selected: null,
      searchtable: {
        hn: '43876/62',
        opddate: '01/10/2020',
        halfplace: 'OPD',
        opdno: '11',
      },

      hnsearch: null,
      links: null,
      isModalActive: false,
      trashObject: null,
      clients: [],
      isLoading: false,
      paginated: false,
      perPage: 10,
      checkedRows: [],
      name: 'null',
      surname: '11',
      opddetail: {
        hn: null,
        name: null,
        idcard: null,
        rightname: null,
        opddate: null,
        age: null,
        sex: null,
        docname: null,
        halfplace: null,
        visittype: null,
      },
    }
  },
  mounted() {},
  computed: {
    titleStack() {
      return ['ประวัติการรับบริการ']
    },
  },
  methods: {
    searchHN() {
      this.isLoading = true
      this.$buefy.snackbar.open({
        message: 'เริ่มค้าหา',
        queue: false,
      })
      axios
        .get(`${apiPath.getBaseUrl()}search_hn_pmk.php`, {
          params: {
            hn: this.hnsearch,
          },
        })
        .then((response) => {
          this.isLoading = false
          this.searchtable = response.data
          this.paginated = true
          this.hnsearch = null
          this.$buefy.snackbar.open({
            message: 'ค้นหาเสร็จสิ้น',
            queue: false,
          })
        })
    },
    reset() {
      this.searchtable = []
      this.hnsearch = null

      this.$buefy.snackbar.open({
        message: 'รีเซ็ตค่าใหม่',
        queue: false,
      })
    },
    async detail_opdno(payload) {
      await axios
        .get(`${apiPath.getBaseUrl()}opd_pmk.php`, {
          params: {
            opdno: payload.opd_no,
          },
        })
        .then((response) => {
          this.opddetail.hn = response.data[0].hn
          this.opddetail.name = response.data[0].name
          this.opddetail.idcard = response.data[0].idcard
          this.opddetail.rightname = response.data[0].rightname
          this.opddetail.opddate = response.data[0].opddate
          this.opddetail.age = response.data[0].age
          this.opddetail.sex = response.data[0].sex
          this.opddetail.docname = response.data[0].docname
          this.opddetail.halfplace = response.data[0].halfplace
          this.opddetail.visittype = response.data[0].visittype
        })
    },
  },
  head() {
    return {
      title: 'ประวัติรับบริการ กลุ่มงานเวชกรรมฟื้นฟู โรงพยาบาลหาดใหญ่',
    }
  },
}
</script>
