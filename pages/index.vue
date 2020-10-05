<template>
  <div>
    <!-- <title-bar :title-stack="titleStack" /> -->
    <hero-bar :has-right-visible="false" icon="monitor">
      ภาวะกลืนลำบาก
    </hero-bar>

    <section class="section is-main-section">
      <card-component
        title=" กลืนลำบาก บำบัดไม่ยาก หากรู้วิธี"
        icon="monitor"
        @header-icon-click="fillChartData"
      >
        <tiles>
          <card-widget
            class="tile is-child"
            type="is-primary"
            typebutton="is-info"
            icon="monitor-dashboard"
            label="ความรู้ทั่วไป/ความหมาย/อาการข้อควรระวัง"
            link="/chanel/1"
          />
          <card-widget
            class="tile is-child"
            type="is-primary"
            typebutton="is-info"
            icon="seat-flat-angled"
            label="การบำบัดฟื้นฟู"
            link="/chanel/2"
          />
          <card-widget
            class="tile is-child"
            type="is-primary"
            typebutton="is-info"
            icon="food"
            label="อาหารฝึกกลืน"
            link="/chanel/3"
          />
        </tiles>

        <tiles>
          <card-widget
            class="tile is-child"
            type="is-primary"
            typebutton="is-info"
            icon="gas-cylinder"
            label="การฝึกหายใจ"
            link="/chanel/4"
          />
          <card-widget
            class="tile is-child"
            type="is-primary"
            typebutton="is-info"
            icon="tooth-outline"
            label="การทำความสะอาดช่องปาก/ดูดเสมหะ"
            link="/chanel/5"
          />
          <card-widget
            class="tile is-child"
            type="is-primary"
            typebutton="is-info"
            icon="hospital-building"
            label="ติดต่อเรา"
            link="/chanel/6"
          />
        </tiles>
      </card-component>
      <!-- <card-component
        title="Performance"
        icon="finance"
        header-icon="reload"
        @header-icon-click="fillChartData"
      >
        <div v-if="defaultChart.chartData" class="chart-area">
          <line-chart
            ref="bigChart"
            style="height: 100%;"
            chart-id="big-line-chart"
            :chart-data="defaultChart.chartData"
            :extra-options="defaultChart.extraOptions"
          />
        </div>
      </card-component> -->
      <!-- 
      <card-component title="ตาราง" class="has-table has-mobile-sort-spaced">
        <clients-table-sample
          :data-url="`${$router.options.base}data-sources/clients.json`"
        />
      </card-component> -->
    </section>
  </div>
</template>

<script>
// @ is an alias to /src
import * as chartConfig from '@/components/Charts/chart.config'
import TitleBar from '@/components/TitleBar'
import HeroBar from '@/components/HeroBar'
import Tiles from '@/components/Tiles'
import CardWidget from '@/components/CardWidget'
import CardComponent from '@/components/CardComponent'
import LineChart from '@/components/Charts/LineChart'
import ClientsTableSample from '@/components/ClientsTableSample'
import ModalBox from '@/components/ModalBox'
export default {
  name: 'Home',
  components: {
    ClientsTableSample,
    ModalBox,
    LineChart,
    CardComponent,
    CardWidget,
    Tiles,
    HeroBar,
    TitleBar,
  },
  data() {
    return {
      defaultChart: {
        chartData: null,
        extraOptions: chartConfig.chartOptionsMain,
      },
    }
  },
  computed: {
    titleStack() {
      // return ['บุคคลทั่วไป', 'ภาวะกลืนลำบาก']
      return ['ภาวะกลืนลำบาก']
    },
  },
  mounted() {
    this.fillChartData()

    this.$buefy.snackbar.open({
      message: 'Welcome back',
      queue: false,
    })
  },
  methods: {
    randomChartData(n) {
      const data = []

      for (let i = 0; i < n; i++) {
        data.push(Math.round(Math.random() * 200))
      }

      return data
    },
    fillChartData() {
      this.defaultChart.chartData = {
        datasets: [
          {
            fill: false,
            borderColor: chartConfig.chartColors.default.primary,
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: chartConfig.chartColors.default.primary,
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: chartConfig.chartColors.default.primary,
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: this.randomChartData(9),
          },
          {
            fill: false,
            borderColor: chartConfig.chartColors.default.info,
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: chartConfig.chartColors.default.info,
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: chartConfig.chartColors.default.info,
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: this.randomChartData(9),
          },
          {
            fill: false,
            borderColor: chartConfig.chartColors.default.danger,
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: chartConfig.chartColors.default.danger,
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: chartConfig.chartColors.default.danger,
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: this.randomChartData(9),
          },
        ],
        labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09'],
      }
    },
  },
  head() {
    return {
      title: 'ภาวะกลืนลำบาก กลุ่มงานเวชกรรมฟื้นฟู โรงพยาบาลหาดใหญ่ ',
    }
  },
}
</script>
