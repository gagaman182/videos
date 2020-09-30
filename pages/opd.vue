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
          type="is-primary"
        >
          <b-autocomplete
            rounded
            v-model="name"
            :data="filteredDataArray"
            placeholder="HN..."
            icon="magnify"
            clearable
            @select="(option) => (selected = option)"
          >
            <template slot="empty">No results found</template>
          </b-autocomplete>
        </b-field>

        <b-field horizontal>
          <b-field grouped>
            <div class="control">
              <b-button
                native-type="submit"
                type="is-primary"
                @click="searchHN()"
              >
                ค้นหา
              </b-button>
            </div>
            <div class="control">
              <b-button type="is-primary is-outlined" @click="reset">
                รีเซ็ต
              </b-button>
            </div>
          </b-field>
        </b-field>
      </card-component>
      <card-component title="ประวัติ" icon="ballot-outline">
        <clients-table-sample
          :data-url="`${$router.options.base}data-sources/clients.json`"
        />
      </card-component>
    </section>
  </div>
</template>

<script>
import mapValues from 'lodash/mapValues'
import TitleBar from '@/components/TitleBar'
import CardComponent from '@/components/CardComponent'
import ClientsTableSample from '@/components/ClientsTableSample'

import HeroBar from '@/components/HeroBar'
export default {
  name: 'Opd',
  components: {
    HeroBar,
    ClientsTableSample,
    CardComponent,
    TitleBar,
  },
  data() {
    return {
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
      data: [
        'Angular',
        'Angular 2',
        'Aurelia',
        'Backbone',
        'Ember',
        'jQuery',
        'Meteor',
        'Node.js',
        'Polymer',
        'React',
        'RxJS',
        'Vue.js',
      ],
      name: '',
      selected: null,
    }
  },
  computed: {
    titleStack() {
      return ['ประวัติการรับบริการ']
    },
    filteredDataArray() {
      // กำหนด limit การค้นหา เท่ากับ 10
      var count = 0
      return this.data.filter((option) => {
        return (
          option.toString().toLowerCase().indexOf(this.name.toLowerCase()) >=
            0 && count++ < 10
        )
      })
    },
  },
  methods: {
    searchHN() {
      this.$buefy.snackbar.open({
        message: 'ok555',
        queue: false,
      })
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
      title: 'ประวัติรับบริการ กลุ่มงานเวชกรรมฟื้นฟู โรงพยาบาลหาดใหญ่',
    }
  },
}
</script>
